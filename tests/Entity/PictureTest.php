<?php

namespace tests\Entity;


use PHPUnit\Framework\TestCase;
use App\Entity\Picture;
use App\Entity\User;
use App\Entity\Trick;

/**
 * Class PictureTest
 * @package tests\Entity
 */
class PictureTest extends TestCase
{
    private $picture;

    private $user;

    private $trick;

    public function setUp()
    {
        if ($this->picture == null) {
            $this->picture = new Picture();
        }

        if ($this->user == null) {
            $this->user = $this->createMock(User::class);
            $this->user->method('getId')
                ->willReturn(1);
        }

        if ($this->trick == null) {
            $this->trick = $this->createMock(Trick::class);
            $this->trick->method('getId')
                ->willReturn(2);
        }
    }

    public function testInstantiation()
    {
        $this->picture->setName('image');
        $this->picture->setFile('mountain.jpg');

        static::assertNull($this->picture->getId());
        static::assertEquals('image', $this->picture->getName());
        static::assertEquals('mountain.jpg', $this->picture->getFile());
    }

    public function testUserRelation()
    {
        $this->picture->setUser($this->user);

        static::assertInstanceOf(User::class, $this->picture->getUser());
        static::assertEquals(1, $this->picture->getUser()->getId());
    }

    public function testTrickRelation()
    {
        $this->picture->setTrick($this->trick);

        static::assertInstanceOf(Trick::class, $this->picture->getTrick());
        static::assertEquals(2, $this->picture->getTrick()->getId());
    }
}
