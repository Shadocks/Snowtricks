<?php

namespace App\Subscriber\Form\Trick;

use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use App\Subscriber\Form\Trick\Interfaces\TrickAddTypeSubscriberInterface;

/**
 * Class TrickUpdatePictureSubscriber.
 */
class TrickUpdateTypeSubscriber implements EventSubscriberInterface, TrickAddTypeSubscriberInterface
{
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
     * @param FormEvent $formEvent
     */
    public function onPreSubmit(FormEvent $formEvent)
    {
        $trick = $formEvent->getData();
        $form = $formEvent->getForm();

        if ($form['picture']->getData()) {
            foreach ($form['picture']->getData() as $picture) {
                if (null === $picture->getFile() && null !== $picture->getUrl()) {
                    $file['file'] = new File('./../public'.$picture->getUrl());
                    $pictures[] = $file;
                }
            }

            if (!isset($pictures)) {
                return;
            }

            if (isset($pictures) && array_key_exists('picture', $trick)) {
                $pictureMerge = array_merge($trick['picture'], $pictures);
                foreach ($pictureMerge as $key) {
                    if (null === $key['file']) {
                        unset($key);
                    } elseif (null !== $key['file']) {
                        $pictureRest[] = $key;
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
