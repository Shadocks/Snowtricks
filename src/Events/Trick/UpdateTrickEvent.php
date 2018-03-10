<?php

namespace App\Events\Trick;


use App\Entity\Interfaces\TrickInterface;
use App\Entity\Trick;
use Symfony\Component\EventDispatcher\Event;

/**
 * Class UpdateTrickEvent
 * @package App\Events\Trick
 */
class UpdateTrickEvent extends Event
{
    const NAME = 'update.trick';

    /**
     * @var TrickInterface
     */
    private $trick;

    /**
     * UpdateTrickEvent constructor.
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
