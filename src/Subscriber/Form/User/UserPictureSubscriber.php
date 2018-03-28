<?php

namespace App\Subscriber\Form\User;

use App\Entity\Picture;
use App\Subscriber\Form\User\Interfaces\UserPictureSubscriberInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
 * Class AddDefaultPictureListener.
 */
class UserPictureSubscriber implements EventSubscriberInterface, UserPictureSubscriberInterface
{
    /**
     * @var Picture
     */
    private $picture;

    /**
     * @var string
     */
    private $pictureUserDefault;

    /**
     * UserPictureSubscriber constructor.
     *
     * @param Picture $picture
     * @param string  $pictureUserDefault
     */
    public function __construct(
        Picture $picture,
        string $pictureUserDefault
    ) {
        $this->picture = $picture;
        $this->pictureUserDefault = $pictureUserDefault;
    }

    /**
     * @return array
     */
    public static function getSubscribedEvents()
    {
        return [
            FormEvents::PRE_SET_DATA => 'onPreSetData',
        ];
    }

    /**
     * @param FormEvent $event
     */
    public function onPreSetData(FormEvent $event)
    {
        $user = $event->getData();

        if (null === $user->getPicture()) {
            $this->picture->setUrl($this->pictureUserDefault);
            $user->setPicture($this->picture);
        }
    }
}
