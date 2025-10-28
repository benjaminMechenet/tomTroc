<?php

class Message extends AbstractEntity
{
    private int $senderId;
    private ?DateTime $sendedAt = null;
    private string $content = "";

    /**
     * @param int $senderId
     */
    public function setSenderId(int $senderId): void
    {
        $this->senderId = $senderId;
    }

    /**
     * @return int
     */
    public function getSenderId(): int
    {
        return  $this->senderId;
    }

    /**
     * @param DateTime $sendedAt
     */
    public function setSendedAt(DateTime|string $sendedAt): void
    {
        if (is_string($sendedAt)) {
            $sendedAt = new DateTime($sendedAt);
        }

        $this->sendedAt = $sendedAt;
    }

    /**
     * @return DateTime
     */
    public function getSendedAt(): DateTime
    {
        return $this->sendedAt;
    }

    /**
     * @param string $content
     */
    public function setContent(string $content): void
    {
        $this->content = $content;
    }

    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }
}
