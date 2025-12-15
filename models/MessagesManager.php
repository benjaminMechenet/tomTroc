<?php

class MessagesManager extends AbstractEntityManager
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
    public function findByUsers($id1, $id2): array
    {
        $sql = ' SELECT m.*
            FROM message m
            WHERE m.discussion = (
                SELECT id
                FROM discussions
                WHERE 
                    (user_1 = ? AND user_2 = ?)
                    OR 
                    (user_1 = ? AND user_2 = ?)
                LIMIT 1
            )
            ORDER BY m.sended_at ASC';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id1, $id2, $id2, $id1]);

        $messages = [];

        while ($row = $stmt->fetch()) {
            $messages[] = new Message($row);
        }

        return $messages;
    }

    /**
     * @return int
     */
    public function create($discussion, $senderId, $content): int
    {
        $sql = 'INSERT INTO message (sender_id, content, discussion) VALUES (?, ?, ?)';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$senderId, $content, $discussion]);
        $id = $this->pdo->lastInsertId();
        return $id;
    }
}
