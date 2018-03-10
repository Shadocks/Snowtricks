<?php

namespace tests\Events\Trick;


use App\Entity\Trick;
use App\Events\Trick\AddTrickEvent;
use PHPUnit\Framework\TestCase;

/**
 * Class AddTrickEventTest
 */
class AddTrickEventTest extends TestCase
{
    private $trick;

    public function setUp()
    {
        if ($this->trick === null) {
            $this->trick = $this->createMock(Trick::class);
        }
    }

    public function testGetTrick()
    {
        $addTrickEvent = new AddTrickEvent($this->trick);

        static::assertInstanceOf(Trick::class, $addTrickEvent->getTrick());
    }
}
