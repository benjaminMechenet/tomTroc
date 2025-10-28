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

    public function create(string $pseudo, string $email, string $password): void
    {
        $stmt = $this->pdo->prepare('INSERT INTO users (pseudo, email, password) VALUES (?, ?, ?)');
        $stmt->execute([$pseudo, $email, $password]);
    }
}
