<?php

namespace App\Entity;

use App\Entity\Interfaces\TrickInterface;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class Trick.
 */
class Trick implements TrickInterface
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
     * @var string
     */
    private $category;

    /**
     * @var string
     */
    private $description;

    /**
     * @var /Datetime
     */
    private $creationDate;

    /**
     * @var /Datetime
     */
    private $modificationDate;

    /**
     * @var ArrayCollection
     */
    private $picture;

    /**
     * @var ArrayCollection
     */
    private $video;

    /**
     * @var User
     */
    private $user;

    /**
     * @var ArrayCollection
     */
    private $comment;

    /**
     * Trick constructor.
     */
    public function __construct()
    {
        $this->creationDate = new \DateTime();
        $this->picture = new ArrayCollection();
        $this->video = new ArrayCollection();
        $this->comment = new ArrayCollection();
    }

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
     * @return string
     */
    public function getCategory(): ?string
    {
        return $this->category;
    }

    /**
     * @param string $category
     */
    public function setCategory(string $category)
    {
        $this->category = $category;
    }

    /**
     * @return string
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description)
    {
        $this->description = $description;
    }

    /**
     * @return \Datetime
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
     * @return \Datetime
     */
    public function getModificationDate(): \DateTime
    {
        return $this->modificationDate;
    }

    /**
     * @param \DateTime $modificationDate
     */
    public function setModificationDate(\DateTime $modificationDate)
    {
        $this->modificationDate = $modificationDate;
    }

    /**
     * @return \ArrayAccess
     */
    public function getPicture(): \ArrayAccess
    {
        return $this->picture;
    }

    /**
     * @param ArrayCollection $picture
     */
    public function setPicture(ArrayCollection $picture)
    {
        $this->picture = $picture;
    }

    /**
     * @param Picture $picture
     */
    public function addPicture(Picture $picture)
    {
        if ($this->picture->contains($picture)) {
            return;
        }

        $this->picture[] = $picture;
        $picture->setTrick($this);
    }

    public function removePicture(Picture $picture)
    {
        $this->picture->removeElement($picture);
        $picture->setTrick(null);
    }

    /**
     * @return \ArrayAccess
     */
    public function getVideo(): \ArrayAccess
    {
        return $this->video;
    }

    /**
     * @param Video $video
     */
    public function addVideo(Video $video)
    {
        if ($this->video->contains($video)) {
            return;
        }

        $this->video[] = $video;
        $video->setTrick($this);
    }

    public function removeVideo(Video $video)
    {
        $this->video->removeElement($video);
        $video->setTrick(null);
    }

    /**
     * @return User
     */
    public function getUser(): User
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
     * @return \ArrayAccess
     */
    public function getComment(): \ArrayAccess
    {
        return $this->comment;
    }

    /**
     * @param Comment $comment
     */
    public function setComment(Comment $comment)
    {
        $this->comment[] = $comment;
    }
}
