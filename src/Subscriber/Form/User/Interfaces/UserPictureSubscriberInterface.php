<?php

namespace App\Subscriber\Form\User\Interfaces;

use Symfony\Component\Form\FormEvent;

/**
 * Interface UserPictureSubscriberInterface.
 */
interface UserPictureSubscriberInterface
{
    /**
     * @param FormEvent $event
     */
    public function onPreSetData(FormEvent $event);
}
