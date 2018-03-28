<?php

namespace App\Entity\Interfaces;

use App\Entity\User;
use App\Entity\Trick;
use Symfony\Component\HttpFoundation\File\File;

/**
 * Interface PictureInterface.
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
    public function getName(): ?string;

    /**
     * @param string $name
     */
    public function setName(string $name);

    /**
     * @return null|string
     */
    public function getUrl(): ?string;

    /**
     * @param string $url
     */
    public function setUrl(string $url);

    /**
     * @return mixed
     */
    public function getFile();

    /**
     * @param File $file
     */
    public function setFile(File $file);

    /**
     * @return User object
     */
    public function getUser(): ?User;

    /**
     * @param User $user
     */
    public function setUser(User $user);

    /**
     * @return Trick
     */
    public function getTrick(): ?Trick;

    /**
     * @param Trick $trick
     */
    public function setTrick(Trick $trick = null);
}
