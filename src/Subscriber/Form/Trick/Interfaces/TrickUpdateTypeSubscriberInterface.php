<?php

namespace App\Subscriber\Form\Trick\Interfaces;

use Symfony\Component\Form\FormEvent;

/**
 * Interface TrickUpdateTypeSubscriberInterface.
 */
interface TrickUpdateTypeSubscriberInterface
{
    /**
     * @param FormEvent $formEvent
     *
     * @return mixed
     */
    public function onPreSubmit(FormEvent $formEvent);
}
