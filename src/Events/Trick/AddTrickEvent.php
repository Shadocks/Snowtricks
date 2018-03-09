<?php

namespace App\Events\Trick;


use App\Entity\Trick;
use Symfony\Component\EventDispatcher\Event;

/**
 * Class AddTrickEvent
 * @package App\Events\Trick
 */
class AddTrickEvent extends Event
{
    const NAME = 'add.trick';

    /**
     * @var Trick
     */
    private $trick;

    /**
     * AddTrickEvent constructor.
     * @param Trick $trick
     */
    public function __construct(Trick $trick)
    {
        $this->trick = $trick;
    }

    /**
     * @return Trick
     */
    public function getTrick(): Trick
    {
        return $this->trick;
    }
}
