<?php

class UserManager extends AbstractEntityManager
{
    private PDO $pdo;
    public function __construct()
    {
        parent::__construct();
        $this->pdo = $this->db->getPDO();
    }

    /**
     * @return User
     */
    public function getUserById(int $id): ?User
    {
        $stmt = $this->pdo->prepare('SELECT * FROM users WHERE id = ?');
        $stmt->execute([$id]);
        $user = new User($stmt->fetch());

        return $user;
    }

    /**
     * @return User
     */
    public function findByEmail(string $email): ?User
    {
        $stmt = $this->pdo->prepare('SELECT * FROM users WHERE email = ?');
        $stmt->execute([$email]);
        $data = $stmt->fetch();

        return $data ? new User($data) : null;
    }

    /**
     * @return User
     */
    public function findById(int $id): ?User
    {
        $stmt = $this->pdo->prepare('SELECT * FROM users WHERE id = ?');
        $stmt->execute([$id]);
        $data = $stmt->fetch();

        return $data ? new User($data) : null;
    }

    public function create(string $pseudo, string $email, string $password): void
    {
        $stmt = $this->pdo->prepare('INSERT INTO users (pseudo, email, password) VALUES (?, ?, ?)');
        $stmt->execute([$pseudo, $email, $password]);
    }

    public function update(string $pseudo, string $email, string $password, $id): void
    {
        $fields = [];
        $values = [];

        if (!empty($pseudo)) {
            $fields[] = 'pseudo = ?';
            $values[] = $pseudo;
        }

        if (!empty($email)) {
            $fields[] = 'email = ?';
            $values[] = $email;
        }

        if (!empty($password)) {
            $fields[] = 'password = ?';
            $values[] = $password;
        }

        $values[] = $id;
        $sql = 'UPDATE users SET ' . implode(', ', $fields) . ' WHERE id = ?';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($values);
    }

    public function updateImage(string $path, $id): void
    {
        $sql = 'UPDATE users SET profile_picture = ? WHERE id = ?';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$path, $id]);
    }
}
