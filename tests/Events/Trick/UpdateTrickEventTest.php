<?php

namespace tests\Events\Trick;


use App\Entity\Trick;
use App\Events\Trick\UpdateTrickEvent;
use PHPUnit\Framework\TestCase;

/**
 * Class UpdateTrickEventTest
 * @package tests\Events
 */
class UpdateTrickEventTest extends TestCase
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
        $updateTrickEvent = new UpdateTrickEvent($this->trick);

        static::assertInstanceOf(Trick::class, $updateTrickEvent->getTrick());
    }
}
