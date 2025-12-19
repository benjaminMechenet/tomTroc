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
    public function findById(int $id): Book | null
    {
        $stmt = $this->pdo->prepare('SELECT * FROM books WHERE id = ?');
        $stmt->execute([$id]);

        $data = $stmt->fetch();

        if (!$data) {
            return null;
        }

        return new Book($data);
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

    /**
     * @return Book
     */
    public function findByIdAndUser($id, $userId)
    {
        $stmt = $this->pdo->prepare('SELECT * FROM books WHERE id = ? AND user_id = ?');
        $stmt->execute([$id, $userId]);
        $data = $stmt->fetch();

        if ($data === false) {
            return null;
        }

        return new Book($data);
    }

    public function update($title, $author, $description, $available, $id, $relativePath): void
    {
        $sql = 'UPDATE books SET title = ?, author = ?, description = ?, image_url = ?, available = ? WHERE id = ?';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$title, $author, $description, $relativePath, $available, $id]);
    }

    public function create($title, $author, $description, $id, $relativePath): void
    {
        $sql = 'INSERT INTO books (title, author, description, image_url, user_id) VALUES (?, ?, ?, ?, ?)';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$title, $author, $description, $relativePath, $id]);
    }

    public function updateImage(string $path, $id): void
    {
        $sql = 'UPDATE books SET image_url = ? WHERE id = ?';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$path, $id]);
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

    public function updateAvailability($id, $state): bool
    {
        $stmt = $this->pdo->prepare("UPDATE books SET available = ? WHERE id = ?");
        return $stmt->execute([$state, $id]);
    }
}
