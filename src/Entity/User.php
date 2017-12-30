<?php

namespace App\Entity;


use App\Entity\Interfaces\UserInterface;

/**
 * Class User
 * @package App\Entity
 */
class User implements UserInterface
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $firstName;

    /**
     * @var string
     */
    private $lastName;

    /**
     * @var string
     */
    private $pseudo;

    /**
     * @var Picture
     */
    private $picture;

    /**
     * @var string
     */
    private $mail;

    /**
     * @var string
     */
    private $password;

    /**
     * @var string
     */
    private $plainPassword;

    /**
     * @var array
     */
    private $roles;

    /**
     * @var bool
     */
    private $active;

    /**
     * @var bool
     */
    private $validated;

    /**
     * @var \DateTime
     */
    private $validationDate;

    /**
     * @var \DateTime
     */
    private $creationDate;

    /**
     * @var string
     */
    private $validationToken;

    /**
     * @var string
     */
    private $resetToken;

    /**
     * @var Trick
     */
    private $trick;

    /**
     * @var Comment
     */
    private $comment;

    /**
     * @return int
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     */
    public function setFirstName(string $firstName)
    {
        $this->firstName = $firstName;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     */
    public function setLastName(string $lastName)
    {
        $this->lastName = $lastName;
    }

    /**
     * @return string
     */
    public function getPseudo(): string
    {
        return $this->pseudo;
    }

    /**
     * @param string $pseudo
     */
    public function setPseudo(string $pseudo)
    {
        $this->pseudo = $pseudo;
    }

    /**
     * @return Picture
     */
    public function getPicture(): Picture
    {
        return $this->picture;
    }

    /**
     * @param Picture $picture
     */
    public function setPicture(Picture $picture)
    {
        $this->picture = $picture;
    }

    /**
     * @return string
     */
    public function getMail(): string
    {
        return $this->mail;
    }

    /**
     * @param string $mail
     */
    public function setMail(string $mail)
    {
        $this->mail = $mail;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password)
    {
        $this->password = $password;
    }

    /**
     * @return string
     */
    public function getPlainPassword(): string
    {
        return $this->plainPassword;
    }

    /**
     * @param string $plainPassword
     */
    public function setPlainPassword(string $plainPassword)
    {
        $this->plainPassword = $plainPassword;
    }

    /**
     * @return array
     */
    public function getRoles(): array
    {
        return $this->roles;
    }

    /**
     * @param string $roles
     */
    public function setRoles(string $roles)
    {
        $this->roles[] = $roles;
    }

    /**
     * @return bool
     */
    public function getActive(): bool
    {
        return $this->active;
    }

    /**
     * @param bool $active
     */
    public function setActive(bool $active)
    {
        $this->active = $active;
    }

    /**
     * @return bool
     */
    public function getValidated(): bool
    {
        return $this->validated;
    }

    /**
     * @param bool $validated
     */
    public function setValidated(bool $validated)
    {
        $this->validated = $validated;
    }

    /**
     * @return \DateTime
     */
    public function getValidationDate(): \DateTime
    {
        return $this->validationDate;
    }

    /**
     * @param \DateTime $validationDate
     */
    public function setValidationDate(\DateTime $validationDate)
    {
        $this->validationDate = $validationDate;
    }

    /**
     * @return \DateTime
     */
    public function getCreationDate(): \DateTime
    {
        return $this->creationDate;
    }

    /**
     * @param \DateTime $creationDate
     */
    public function setCreationDate(\DateTime $creationDate)
    {
        $this->creationDate = $creationDate;
    }

    /**
     * @return string
     */
    public function getValidationToken(): string
    {
        return $this->validationToken;
    }

    /**
     * @param string $validationToken
     */
    public function setValidationToken(string $validationToken)
    {
        $this->validationToken = $validationToken;
    }

    /**
     * @return string
     */
    public function getResetToken(): string
    {
        return $this->resetToken;
    }

    /**
     * @param string $resetToken
     */
    public function setResetToken(string $resetToken)
    {
        $this->resetToken = $resetToken;
    }

    /**
     * @return Trick
     */
    public function getTrick(): Trick
    {
        return $this->trick;
    }

    /**
     * @param Trick $trick
     */
    public function setTrick(Trick $trick)
    {
        $this->trick = $trick;
    }

    /**
     * @return Comment
     */
    public function getComment(): Comment
    {
        return $this->comment;
    }

    /**
     * @param Comment $comment
     */
    public function setComment(Comment $comment)
    {
        $this->comment = $comment;
    }
}
