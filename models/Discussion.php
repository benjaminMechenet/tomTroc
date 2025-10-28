<?php

class Discussion extends AbstractEntity
{
    private int $user1 = "";
    private int $user2 = "";
    private int $lastMessage = "";

    /**
     * @param int $user1
     */
    public function setUser1(string $user1): void
    {
        $this->user1 = $user1;
    }

    /**
     * @return int
     */
    public function getUser1(): int
    {
        return $this->user1;
    }

    /**
     * @param int $user2
     */
    public function setUser2(string $user2): void
    {
        $this->user2 = $user2;
    }

    /**
     * @return int
     */
    public function getUser2(): int
    {
        return $this->user2;
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
}
