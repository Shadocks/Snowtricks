<?php

namespace App\Events\Trick;


use App\Entity\Trick;
use Symfony\Component\EventDispatcher\Event;

/**
 * Class DeleteTrickEvent
 * @package App\Events\Trick
 */
class DeleteTrickEvent extends Event
{
    const NAME = 'delete.trick';

    /**
     * @var Trick
     */
    private $trick;

    /**
     * DeleteTrickEvent constructor.
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
