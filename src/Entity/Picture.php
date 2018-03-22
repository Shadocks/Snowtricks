<?php

namespace App\Entity;

use App\Entity\Interfaces\PictureInterface;
use Symfony\Component\HttpFoundation\File\File;

/**
 * Class Picture.
 */
class Picture implements PictureInterface
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var
     */
    private $url;

    /**
     * @var
     */
    private $file;

    /**
     * @var User
     */
    private $user;

    /**
     * @var Trick
     */
    private $trick;

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
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name)
    {
        $this->name = $name;
    }

    /**
     * @return null|string
     */
    public function getUrl(): ?string
    {
        return $this->url;
    }

    /**
     * @param string $url
     */
    public function setUrl(string $url)
    {
        $this->url = $url;
    }

    /**
     * @return mixed
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * @param File $file
     */
    public function setFile(File $file)
    {
        $this->file = $file;
    }

    /**
     * @return User
     */
    public function getUser(): ?User
    {
        return $this->user;
    }

    /**
     * @param User $user
     */
    public function setUser(User $user)
    {
        $this->user = $user;
    }

    /**
     * @return Trick
     */
    public function getTrick(): ?Trick
    {
        return $this->trick;
    }

    /**
     * @param Trick $trick
     */
    public function setTrick(Trick $trick = null)
    {
        $this->trick = $trick;
    }
}
