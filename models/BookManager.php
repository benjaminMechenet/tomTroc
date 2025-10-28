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
}
