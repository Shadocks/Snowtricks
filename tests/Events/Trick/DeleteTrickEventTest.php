<?php

namespace tests\Events\Trick;


use App\Entity\Trick;
use App\Events\Trick\DeleteTrickEvent;
use PHPUnit\Framework\TestCase;

/**
 * Class DeleteTrickEvent
 * @package tests\Events
 */
class DeleteTrickEventTest extends TestCase
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
        $deleteTrickEvent = new DeleteTrickEvent($this->trick);

        static::assertInstanceOf(Trick::class, $deleteTrickEvent->getTrick());
    }
}
