<?php

namespace App\Entity\Interfaces;


use App\Entity\Trick;
use App\Entity\User;

/**
 * Interface PictureInterface
 * @package App\Entity\Interfaces
 */
interface PictureInterface
{
    /**
     * @return int
     */
    public function getId(): ?int;

    /**
     * @return string
     */
    public function getName(): string;

    /**
     * @param string $name
     */
    public function setName(string $name);

    /**
     * @return string
     */
    public function getFile(): string;

    /**
     * @param string $file
     */
    public function setFile(string $file);

    /**
     * @return User object
     */
    public function getUser(): User;

    /**
     * @param User $user
     */
    public function setUser(User $user);

    /**
     * @return Trick
     */
    public function getTrick(): Trick;

    /**
     * @param Trick $trick
     */
    public function setTrick(Trick $trick);

}
