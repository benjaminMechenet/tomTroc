<?php

class User extends AbstractEntity
{
    private string $email = "";
    private string $password = "";
    private string $pseudo = "";
    private ?DateTime $createdAt = null;

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $pseudo
     */
    public function setPseudo(string $pseudo): void
    {
        $this->pseudo = $pseudo;
    }

    /**
     * @return string
     */
    public function getPseudo(): string
    {
        return $this->pseudo;
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
