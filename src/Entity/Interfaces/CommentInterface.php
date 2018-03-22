<?php

namespace App\Entity\Interfaces;

use App\Entity\User;
use App\Entity\Trick;

/**
 * Interface CommentInterface.
 */
interface CommentInterface
{
    /**
     * @return int
     */
    public function getId(): ?int;

    /**
     * @return string
     */
    public function getContent(): ?string;

    /**
     * @param string $content
     */
    public function setContent(string $content);

    /**
     * @return \DateTime
     */
    public function getCreationDate(): \DateTime;

    /**
     * @param \DateTime $creationDate
     */
    public function setCreationDate(\DateTime $creationDate);

    /**
     * @return Trick
     */
    public function getTrick(): Trick;

    /**
     * @param Trick $trick
     */
    public function setTrick(Trick $trick);

    /**
     * @return User
     */
    public function getUser(): User;

    /**
     * @param User $user
     */
    public function setUser(User $user);
}
