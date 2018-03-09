<?php

namespace App\Subscriber\Form\Trick;


use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\HttpFoundation\File\File;

/**
 * Class TrickUpdatePictureSubscriber
 * @package App\Subscriber\Form\Trick
 */
class TrickUpdateFieldPictureSubscriber implements EventSubscriberInterface
{
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
     * @param FormEvent $formEvent
     */
    public function onPreSubmit(FormEvent $formEvent)
    {
        $trick = $formEvent->getData();
        $form = $formEvent->getForm();

        if ($form['picture']->getData()) {

            foreach ($form['picture']->getData() as $picture) {

                if ($picture->getFile() === null && $picture->getUrl() !== null) {
                    $file ['file'] = new File('./../public' . $picture->getUrl());
                    $pictures [] = $file;
                }
            }

            if (!isset($pictures)) {
                return;
            }

            if (isset($pictures) && array_key_exists('picture', $trick)) {
                $pictureGather = array_merge($trick['picture'], $pictures);
                foreach ($pictureGather as $key) {
                    if ($key['file'] === null) {
                        unset($key);
                    } elseif ($key['file'] !== null) {
                        $pictureRest [] = $key;
                        $trick['picture'] = $pictureRest;
                    }
                }
                $formEvent->setData($trick);
            }

            if (isset($pictures) && !array_key_exists('picture', $trick)) {
                $trick['picture'] = $pictures;
                $formEvent->setData($trick);
            }
        }
    }
}
