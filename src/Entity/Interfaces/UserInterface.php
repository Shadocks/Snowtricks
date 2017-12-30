<?php

namespace App\Entity\Interfaces;


use App\Entity\Comment;
use App\Entity\Trick;
use App\Entity\Picture;

/**
 * Interface UserInterface
 * @package App\Entity\Interfaces
 */
interface UserInterface
{
    /**
     * @return int
     */
    public function getId(): ?int;

    /**
     * @return string
     */
    public function getFirstName(): string;

    /**
     * @param string $firstName
     */
    public function setFirstName(string $firstName);

    /**
     * @return string
     */
    public function getLastName(): string;

    /**
     * @param string $lastName
     */
    public function setLastName(string $lastName);

    /**
     * @return string
     */
    public function getPseudo(): string;

    /**
     * @param string $pseudo
     */
    public function setPseudo(string $pseudo);

    /**
     * @return Picture
     */
    public function getPicture(): Picture;

    /**
     * @param Picture $picture
     */
    public function setPicture(Picture $picture);

    /**
     * @return string
     */
    public function getMail(): string;

    /**
     * @param string $mail
     */
    public function setMail(string $mail);

    /**
     * @return string
     */
    public function getPassword(): string;

    /**
     * @param string $password
     */
    public function setPassword(string $password);

    /**
     * @return string
     */
    public function getPlainPassword(): string;

    /**
     * @param string $plainPassword
     */
    public function setPlainPassword(string $plainPassword);

    /**
     * @return array
     */
    public function getRoles(): array;

    /**
     * @param string $roles
     */
    public function setRoles(string $roles);

    /**
     * @return bool
     */
    public function getActive(): bool;

    /**
     * @param bool $active
     */
    public function setActive(bool$active);

    /**
     * @return bool
     */
    public function getValidated(): bool;

    /**
     * @param bool $validated
     */
    public function setValidated(bool $validated);

    /**
     * @return \DateTime
     */
    public function getValidationDate(): \DateTime;

    /**
     * @param \DateTime $validationDate
     */
    public function setValidationDate(\DateTime $validationDate);

    /**
     * @return \DateTime
     */
    public function getCreationDate(): \DateTime;

    /**
     * @param \DateTime $creationDate
     */
    public function setCreationDate(\DateTime $creationDate);

    /**
     * @return string
     */
    public function getValidationToken(): string;

    /**
     * @param string $validationToken
     */
    public function setValidationToken(string $validationToken);
    /**
     * @return string
     */
    public function getResetToken(): string;

    /**
     * @param string $resetToken
     */
    public function setResetToken(string $resetToken);

    /**
     * @return Trick
     */
    public function getTrick(): Trick;

    /**
     * @param Trick $trick
     */
    public function setTrick(Trick $trick);

    /**
     * @return Comment
     */
    public function getComment(): Comment;

    /**
     * @param Comment $comment
     */
    public function setComment(Comment $comment);
}
