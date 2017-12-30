<?php

namespace App\Entity\Interfaces;


use App\Entity\Picture;
use App\Entity\Video;
use App\Entity\Comment;
use App\Entity\User;

/**
 * Interface TrickInterface
 * @package App\Entity\Interfaces
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
    public function getName(): string;

    /**
     * @param string $name
     */
    public function setName(string $name);

    /**
     * @return string
     */
    public function getCategory(): string;

    /**
     * @param string $category
     */
    public function setCategory(string $category);

    /**
     * @return string
     */
    public function getDescription(): string;

    /**
     * @param string $description
     */
    public function setDescription(string $description);

    /**
     * @return \Datetime
     */
    public function getCreationDate(): \DateTime;

    /**
     * @param \DateTime $creationDate
     */
    public function setCreationDate(\DateTime $creationDate);

    /**
     * @return \Datetime
     */
    public function getModificationDate(): \DateTime;

    /**
     * @param \DateTime $modificationDate
     */
    public function setModificationDate(\DateTime $modificationDate);

    /**
     * @return Picture
     */
    public function getPicture(): Picture;

    /**
     * @param Picture $picture
     */
    public function setPicture(Picture $picture);

    /**
     * @return Video
     */
    public function getVideo(): Video;

    /**
     * @param Video $video
     */
    public function setVideo(Video $video);

    /**
     * @return User
     */
    public function getUser(): User;

    /**
     * @param User $user
     */
    public function setUser(User $user);

    /**
     * @return Comment
     */
    public function getComment(): Comment;

    /**
     * @param Comment $comment
     */
    public function setComment(Comment $comment);
}
