<?php

class Book extends AbstractEntity
{
    private int $userId;
    private string $title = "";
    private string $author = "";
    private string $description = "";
    private string $imageUrl = "";
    private bool $available = true;
    private ?DateTime $createdAt = null;
    private string $userPseudo = "";

    /**
     * @param int $userId
     */
    public function setUserId(int $userId): void
    {
        $this->userId = $userId;
    }

    /**
     * @return int
     */
    public function getUserId(): int
    {
        return  $this->userId;
    }

    /**
     * @param string $userPseudo
     */
    public function setUserPseudo(string $userPseudo): void
    {
        $this->userPseudo = $userPseudo;
    }

    /**
     * @return string
     */
    public function getUserPseudo(): string
    {
        return $this->userPseudo;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $author
     */
    public function setAuthor(string $author): void
    {
        $this->author = $author;
    }

    /**
     * @return string
     */
    public function getAuthor(): string
    {
        return $this->author;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $imageUrl
     */
    public function setImageUrl(string $imageUrl): void
    {
        $this->imageUrl = $imageUrl;
    }

    /**
     * @return string
     */
    public function getImageUrl(): string
    {
        return $this->imageUrl;
    }

    /**
     * @param bool $available
     */
    public function setAvailable(bool $available): void
    {
        $this->available = $available;
    }

    /**
     * @return bool
     */
    public function getAvailable(): bool
    {
        return $this->available;
    }

    /**
     * @param DateTime $createdAt
     */
    public function setCreatedAt(DateTime|string $createdAt): void
    {
        if (is_string($createdAt)) {
            $createdAt = new DateTime($createdAt);
        }

        $this->createdAt = $createdAt;
    }

    /**
     * @return DateTime
     */
    public function getCreatedAt(): DateTime
    {
        return $this->createdAt;
    }
}
