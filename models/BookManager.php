<?php

class BookManager extends AbstractEntityManager
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
    public function getAllBooks(): array
    {
        $sql = "SELECT * FROM books";
        $result = $this->pdo->query($sql);
        $books = [];

        while ($book = $result->fetch()) {
            $books[] = new Book($book);
        }
        return $books;
    }

    /**
     * @return array
     */
    public function getLatestBooks(): array
    {
        $sql = "SELECT * FROM books ORDER BY `created_at` DESC LIMIT 4";
        $result = $this->pdo->query($sql);
        $books = [];

        while ($book = $result->fetch()) {
            $books[] = new Book($book);
        }
        return $books;
    }

    /**
     * @return Book
     */
    public function findById(int $id): Book
    {
        $stmt = $this->pdo->prepare('SELECT * FROM books WHERE id = ?');
        $stmt->execute([$id]);
        $book = new Book($stmt->fetch());

        return $book;
    }

    /**
     * @return array
     */
    public function findByUser(User $user): array
    {
        $stmt = $this->pdo->prepare('SELECT * FROM books WHERE user_id = ?');
        $stmt->execute([$user->getId()]);

        $books = [];

        while ($book = $stmt->fetch()) {
            $books[] = new Book($book);
        }

        return $books;
    }

    public function delete($id): bool
    {
        $check = $this->pdo->prepare('SELECT id FROM books WHERE id = ?');
        $check->execute([$id]);

        if (!$check->fetch()) {
            return false;
        }

        $stmt = $this->pdo->prepare('DELETE FROM books WHERE id = ?');
        return $stmt->execute([$id]);
    }

    public function updataAvailability($id, $state): bool
    {
        $stmt = $this->pdo->prepare("UPDATE books SET available = ? WHERE id = ?");
        return $stmt->execute([$state, $id]);
    }
}
