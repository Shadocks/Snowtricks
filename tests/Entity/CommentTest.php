<?php

namespace tests\Entity;


use App\Entity\Comment;
use App\Entity\Trick;
use App\Entity\User;
use PHPUnit\Framework\TestCase;

/**
 * Class CommentTest
 * @package tests\Entity
 */
class CommentTest extends TestCase
{
    private $comment;

    private $trick;

    private $user;

    private $date;

    public function setUp()
    {
        if ($this->comment == null) {
            $this->comment = new Comment();
        }

        if ($this->trick == null) {
            $this->trick = $this->createMock(Trick::class);
            $this->trick->method('getId')
                ->willReturn(0);
        }

        if ($this->user == null) {
            $this->user = $this->createMock(User::class);
            $this->user->method('getId')
                ->willReturn(1);
        }

        if ($this->date == null) {
            $this->date = new \DateTime();
        }
    }

    public function testInstantiation()
    {
        $this->comment->setContent('Hello world !');
        $this->comment->setCreationDate($this->date);

        static::assertNull($this->comment->getId());
        static::assertEquals('Hello world !', $this->comment->getContent());
        static::assertInstanceOf(\DateTime::class, $this->comment->getCreationDate());
    }

    public function testTrickRelation()
    {
        $this->comment->setTrick($this->trick);

        static::assertInstanceOf(Trick::class, $this->comment->getTrick());
        static::assertEquals(0, $this->comment->getTrick()->getId());
    }

    public function testUseRelation()
    {
        $this->comment->setUser($this->user);

        static::assertInstanceOf(User::class, $this->comment->getUser());
        static::assertEquals(1, $this->comment->getUser()->getId());
    }
}
