<?php

namespace tests\Entity;


use App\Entity\Comment;
use App\Entity\Picture;
use App\Entity\Trick;
use App\Entity\User;
use PHPUnit\Framework\Constraint\IsType;
use PHPUnit\Framework\TestCase;

/**
 * Class UserTest
 * @package tests\Entity
 */
class UserTest extends TestCase
{
    private $user;

    private $picture;

    private $trick;

    private $comment;

    private $date;

    protected function setUp()
    {
        if ($this->user == null) {
            $this->user = new User();
        }

        if ($this->picture == null) {
            $this->picture = $this->createMock(Picture::class);
            $this->picture->method('getId')
                ->willReturn(0);
        }

        if ($this->trick == null) {
            $this->trick = $this->createMock(Trick::class);
            $this->trick->method('getId')
                ->willReturn(1);
        }

        if ($this->comment == null) {
            $this->comment = $this->createMock(Comment::class);
            $this->comment->method('getId')
                ->willReturn(2);
        }

        if ($this->date == null) {
            $this->date = new \DateTime();
        }
    }

    public function testInstantiation()
    {
        $this->user->setFirstName('Tony');
        $this->user->setLastName('Stark');
        $this->user->setUserName('MK1');
        $this->user->setMail('tony.stark@gmail.com');
        $this->user->setPassword('veronica');
        $this->user->setPlainPassword('veronica');
        $this->user->setRoles('ROLE_USER');
        $this->user->setActive(true);
        $this->user->setValidated(true);
        $this->user->setValidationDate($this->date);
        $this->user->setCreationDate($this->date);
        $this->user->setValidationToken('2a4194da1a9d84da9d8d2a7d29addaad4da2');
        $this->user->setResetToken('9a1da=9d9ad9d41adx91d361d4167aad6ad4d');

        static::assertNull($this->user->getId());
        static::assertEquals('Tony', $this->user->getFirstName());
        static::assertEquals('Stark', $this->user->getLastName());
        static::assertEquals('MK1', $this->user->getUserName());
        static::assertEquals('tony.stark@gmail.com', $this->user->getMail());
        static::assertEquals('veronica', $this->user->getPassword());
        static::assertEquals('veronica', $this->user->getPlainPassword());
        static::assertInternalType(IsType::TYPE_ARRAY, $this->user->getRoles());
        static::assertContains('ROLE_USER', $this->user->getRoles());
        static::assertInternalType(IsType::TYPE_BOOL, $this->user->getActive());
        static::assertTrue($this->user->getActive());
        static::assertInternalType(IsType::TYPE_BOOL, $this->user->getValidated());
        static::assertTrue($this->user->getValidated());
        static::assertInstanceOf(\DateTime::class, $this->user->getValidationDate());
        static::assertInstanceOf(\DateTime::class, $this->user->getCreationDate());
        static::assertEquals('2a4194da1a9d84da9d8d2a7d29addaad4da2', $this->user->getValidationToken());
        static::assertEquals('9a1da=9d9ad9d41adx91d361d4167aad6ad4d', $this->user->getResetToken());
    }

    public function testPictureRelation()
    {
        $this->user->setPicture($this->picture);

        static::assertInstanceOf(Picture::class, $this->user->getPicture());
        static::assertEquals(0, $this->user->getPicture()->getId());
    }

    public function testTrickRelation()
    {
        $this->user->setTrick($this->trick);

        static::assertInstanceOf(Trick::class, $this->user->getTrick());
        static::assertEquals(1, $this->user->getTrick()->getId());
    }

    public function testCommentRelation()
    {
        $this->user->setComment($this->comment);

        static::assertInstanceOf(Comment::class, $this->user->getComment());
        static::assertEquals(2, $this->user->getComment()->getId());
    }
}
