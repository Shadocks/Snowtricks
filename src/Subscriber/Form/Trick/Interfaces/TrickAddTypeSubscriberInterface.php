<?php

namespace App\Subscriber\Form\Trick\Interfaces;

use Symfony\Component\Form\FormEvent;

/**
 * Interface TrickAddTypeSubscriberInterface.
 */
interface TrickAddTypeSubscriberInterface
{
    /**
     * @param FormEvent $event
     */
    public function onPreSubmit(FormEvent $event);
}
