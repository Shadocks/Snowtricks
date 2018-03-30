<?php

namespace App\Entity\Interfaces;

use App\Entity\User;
use App\Entity\Video;
use App\Entity\Picture;
use App\Entity\Comment;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Interface TrickInterface.
 */
interface TrickInterface
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
     * @return string
     */
    public function getCategory(): ?string;

    /**
     * @param string $category
     */
    public function setCategory(string $category);

    /**
     * @return string
     */
    public function getDescription(): ?string;

    /**
     * @param string $description
     */
    public function setDescription(string $description);

    /**
     * @return \DateTime
     */
    public function getCreationDate(): \DateTime;

    /**
     * @param \DateTime $creationDate
     */
    public function setCreationDate(\DateTime $creationDate);

    /**
     * @return \Datetime
     */
    public function getModificationDate():? \DateTime;

    /**
     * @param \DateTime $modificationDate
     */
    public function setModificationDate(\DateTime $modificationDate);

    /**
     * @return \ArrayAccess
     */
    public function getPicture(): \ArrayAccess;

    /**
     * @param ArrayCollection $arrayCollection
     */
    public function setPicture(ArrayCollection $arrayCollection);

    /**
     * @param Picture $picture
     */
    public function addPicture(Picture $picture);

    /**
     * @param Picture $picture
     *
     * @return mixed
     */
    public function removePicture(Picture $picture);

    /**
     * @return \ArrayAccess
     */
    public function getVideo(): \ArrayAccess;

    /**
     * @param Video $video
     */
    public function addVideo(Video $video);

    /**
     * @param Video $video
     */
    public function removeVideo(Video $video);

    /**
     * @return User
     */
    public function getUser(): User;

    /**
     * @param User $user
     */
    public function setUser(User $user);

    /**
     * @return \ArrayAccess
     */
    public function getComment(): \ArrayAccess;

    /**
     * @param Comment $comment
     */
    public function setComment(Comment $comment);
}
