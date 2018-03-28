<?php

namespace App\Subscriber\Form\Trick;


use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use App\Subscriber\Form\Trick\Interfaces\TrickAddTypeSubscriberInterface;

/**
 * Class TrickAddFieldPictureSubscriber.
 */
class TrickAddTypeSubscriber implements EventSubscriberInterface, TrickAddTypeSubscriberInterface
{
    /**
     * @var String
     */
    private $pictureTrickDefault;

    /**
     * TrickAddFieldPictureSubscriber constructor.
     *
     * @param string $pictureTrickDefault
     */
    public function __construct(string $pictureTrickDefault)
    {
        $this->pictureTrickDefault = $pictureTrickDefault;
    }

    /**
     * @return array
     */
    public static function getSubscribedEvents()
    {
        return [
            FormEvents::PRE_SUBMIT => 'onPreSubmit',
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
            $picture[] = $file;
            $trick['picture'] = $picture;
            $event->setData($trick);
        }
    }
}
