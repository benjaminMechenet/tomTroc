<?php

class Discussion extends AbstractEntity
{
    private int $user_1;
    private int $user_2;
    private int $lastMessage;
    private ?Message $message = null;
    private ?User $otherUser = null;

    /**
     * @param int $user_1
     */
    public function setUser1(string $user_1): void
    {
        $this->user_1 = $user_1;
    }

    /**
     * @return int
     */
    public function getUser1(): int
    {
        return $this->user_1;
    }

    /**
     * @param int $user_2
     */
    public function setUser2(string $user_2): void
    {
        $this->user_2 = $user_2;
    }

    /**
     * @return int
     */
    public function getUser2(): int
    {
        return $this->user_2;
    }

    /**
     * @param int $lastMessage
     */
    public function setLastMessage(string $lastMessage): void
    {
        $this->lastMessage = $lastMessage;
    }

    /**
     * @return int
     */
    public function getLastMessage(): int
    {
        return $this->lastMessage;
    }

    /**
     * @param Message $message
     */
    public function setMessage(Message $message): void
    {
        $this->message = $message;
    }

    /**
     * @return Message
     */
    public function getMessage(): ?Message
    {
        return $this->message;
    }

    /**
     * @param User $otherUser
     */
    public function setOtherUser(User $otherUser): void
    {
        $this->otherUser = $otherUser;
    }

    /**
     * @return User
     */
    public function getOtherUser(): ?User
    {
        return $this->otherUser;
    }
}
