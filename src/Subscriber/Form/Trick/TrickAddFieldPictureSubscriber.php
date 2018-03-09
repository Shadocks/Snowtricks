<?php

namespace App\Subscriber\Form\Trick;


use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\HttpFoundation\File\File;

/**
 * Class TrickAddFieldPictureSubscriber
 * @package App\Subscriber\Form\Trick
 */
class TrickAddFieldPictureSubscriber implements EventSubscriberInterface
{
    /**
     * @var String
     */
    private $pictureTrickDefault;


    /**
     * TrickAddFieldPictureSubscriber constructor.
     * @param $pictureTrickDefault
     */
    public function __construct($pictureTrickDefault)
    {
        $this->pictureTrickDefault = $pictureTrickDefault;
    }

    /**
     * @return array
     */
    public static function getSubscribedEvents()
    {
        return [
            FormEvents::PRE_SUBMIT => 'onPreSubmit'
        ];
    }

    /**
     * @param FormEvent $event
     */
    public function onPreSubmit(FormEvent $event)
    {
        $trick = $event->getData();

        if (!array_key_exists('picture', $trick)) {
            $file['file'] = new File($this->pictureTrickDefault);
            $picture [] = $file;
            $trick['picture'] = $picture;
            $event->setData($trick);
        }
    }
}
