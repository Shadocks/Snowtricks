<?php

namespace App\Subscriber\Form\User;


use App\Entity\Picture;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;

/**
 * Class AddDefaultPictureListener
 * @package App\Form\EventListener\User
 */
class UserPictureSubscriber implements EventSubscriberInterface
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
     * @param Picture $picture
     * @param $pictureUserDefault
     */
    public function __construct(Picture $picture, $pictureUserDefault)
    {
        $this->picture = $picture;
        $this->pictureUserDefault = $pictureUserDefault;
    }

    /**
     * @return array
     */
    public static function getSubscribedEvents()
    {
        return [
            FormEvents::PRE_SET_DATA => 'onPreSetData'
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
