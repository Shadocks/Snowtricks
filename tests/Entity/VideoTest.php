<?php

namespace tests\Entity;

use App\Entity\Video;
use App\Entity\Trick;
use PHPUnit\Framework\TestCase;

/**
 * Class VideoTest.
 */
class VideoTest extends TestCase
{
    private $video;

    private $trick;

    protected function setUp()
    {
        if (null == $this->video) {
            $this->video = new Video();
        }

        if (null == $this->trick) {
            $this->trick = $this->createMock(Trick::class);
            $this->trick->method('getId')
                ->willReturn(1);
        }
    }

    public function testInstantiation()
    {
        $this->video->setUrl('https://www.youtube.com/watch?v=x98O_j9DXMo');

        static::assertNull($this->video->getId());
        static::assertEquals('https://www.youtube.com/watch?v=x98O_j9DXMo', $this->video->getUrl());
    }

    public function testTrickRelation()
    {
        $this->video->setTrick($this->trick);

        static::assertInstanceOf(Trick::class, $this->video->getTrick());
        static::assertEquals(1, $this->video->getTrick()->getId());
    }
}