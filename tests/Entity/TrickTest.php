<?php

namespace tests\Entity;

use App\Entity\Comment;
use App\Entity\Picture;
use App\Entity\Trick;
use App\Entity\User;
use App\Entity\Video;
use Doctrine\Common\Collections\ArrayCollection;
use PHPUnit\Framework\TestCase;

/**
 * Class TrickTest.
 */
class TrickTest extends TestCase
{
    private $trick;

    private $picture;

    private $video;

    private $comment;

    private $user;

    private $date;

    private $arrayCollection;

    protected function setUp()
    {
        if (null === $this->trick) {
            $this->trick = new Trick();
        }

        if (null === $this->picture) {
            $this->picture = $this->createMock(Picture::class);
            $this->picture->method('getId')
                ->willReturn(0);
        }

        if (null === $this->video) {
            $this->video = $this->createMock(Video::class);
            $this->video->method('getId')
                ->willReturn(1);
        }

        if (null === $this->comment) {
            $this->comment = $this->createMock(Comment::class);
            $this->comment->method('getId')
                ->willReturn(2);
        }

        if (null === $this->user) {
            $this->user = $this->createMock(User::class);
            $this->user->method('getId')
                ->willReturn(3);
        }

        if (null === $this->date) {
            $this->date = new \DateTime();
        }

        if (null === $this->arrayCollection) {
            $this->arrayCollection = $this->createMock(ArrayCollection::class);
        }
    }

    public function testInstantiation()
    {
        $this->trick->setName('Fakie');
        $this->trick->setCategory('Flat');
        $this->trick->setDescription('Marche arrière (être un regular et surfer en goofy et inversement)');
        $this->trick->setCreationDate($this->date);
        $this->trick->setModificationDate($this->date);

        static::assertNull($this->trick->getId());
        static::assertEquals('Fakie', $this->trick->getName());
        static::assertEquals('Flat', $this->trick->getCategory());
        static::assertEquals('Marche arrière (être un regular et surfer en goofy et inversement)', $this->trick->getDescription());
        static::assertInstanceOf(\DateTime::class, $this->trick->getCreationDate());
        static::assertInstanceOf(\DateTime::class, $this->trick->getModificationDate());
    }

    public function testPictureRelation()
    {
        $this->trick->setPicture($this->arrayCollection);

        static::assertInstanceOf(ArrayCollection::class, $this->trick->getPicture());
    }

    public function testVideoRelation()
    {
        $this->trick->addVideo($this->video);

        static::assertInstanceOf(\ArrayAccess::class, $this->trick->getVideo());
        static::assertEquals(1, $this->trick->getVideo()->get(0)->getId());
    }

    public function testCommentRelation()
    {
        $this->trick->setComment($this->comment);

        static::assertInstanceOf(\ArrayAccess::class, $this->trick->getComment());
        static::assertEquals(2, $this->trick->getComment()->get(0)->getId());
    }

    public function testUserRelation()
    {
        $this->trick->setUser($this->user);

        static::assertInstanceOf(User::class, $this->trick->getUser());
        static::assertEquals(3, $this->trick->getUser()->getId());
    }
}
