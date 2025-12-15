<?php

class DiscussionManager extends AbstractEntityManager
{
    private PDO $pdo;
    public function __construct()
    {
        parent::__construct();
        $this->pdo = $this->db->getPDO();
    }

    /**
     * @return array
     */
    public function findByUser(User $user): array
    {
        $sql = '
            SELECT d.*,
               
            m.id AS last_message_id,
                m.content AS last_message_content,
                m.sended_at AS last_message_date,
                m.sender_id AS last_message_sender_id,

                u.id AS other_user_id,
                u.pseudo AS other_user_pseudo,
                u.profile_picture AS other_user_profile_picture

            FROM discussions d
            LEFT JOIN message m ON m.id = (
                SELECT id
                FROM message
                WHERE id = d.last_message
                ORDER BY sended_at DESC
                LIMIT 1
            )

            LEFT JOIN users u ON u.id = 
            CASE 
            WHEN d.user_1 = ? THEN d.user_2
            ELSE d.user_1
            END

            WHERE d.user_1 = ? OR d.user_2 = ?
        ';

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$user->getId(), $user->getId(), $user->getId()]);

        $discussions = [];

        while ($row = $stmt->fetch()) {
            $discussion = new Discussion($row);

            if ($row['last_message_id']) {
                $discussion->setMessage(new Message([
                    'id' => $row['last_message_id'],
                    'content' => $row['last_message_content'],
                    'sended_at' => $row['last_message_date'],
                    'sender_id' => $row['last_message_sender_id'],
                ]));

                $discussion->setOtherUser(new User([
                    'id' => $row['other_user_id'],
                    'pseudo' => $row['other_user_pseudo'],
                    'profile_picture' => $row['other_user_profile_picture'],
                ]));
            }

            $discussions[] = $discussion;
        }

        return $discussions;
    }

    /**
     * @return ?Discussion
     */
    public function findByUsers($id1, $id2): ?Discussion
    {
        $sql = 'SELECT id
                FROM discussions
                WHERE 
                (user_1 = ? AND user_2 = ?)
                OR 
                (user_2 = ? AND user_1 = ?)';

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id1, $id2, $id1, $id2]);
        $data = $stmt->fetch();

        if (!$data) {
            return null;
        }

        $discussion = new Discussion($data);
        return $discussion;
    }

    /**
     * @return int
     */
    public function create($id1, $id2): int
    {
        $sql = 'INSERT INTO discussions (user_1, user_2) VALUES (?, ?)';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id1, $id2]);
        $id = $this->pdo->lastInsertId();
        return $id;
    }

    public function updateLast($discussion, $message): void
    {
        $sql = 'UPDATE discussions SET last_message = ? WHERE id = ?';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$message, $discussion]);
    }
}
