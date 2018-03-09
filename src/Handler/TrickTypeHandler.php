<?php

namespace App\Handler;


use App\Entity\Interfaces\TrickInterface;
use App\Entity\Trick;
use App\Service\PictureUpload;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\Form\FormInterface;

/**
 * Class TrickTypeHandler
 * @package App\Handler
 */
class TrickTypeHandler
{
    /**
     * @var EntityManagerInterface
     */
    private $entityManagerInterface;

    /**
     * @var EventDispatcherInterface
     */
    private $eventDispatcher;

    /**
     * @var PictureUpload
     */
    private $pictureUpload;

    /**
     * @var
     */
    private $urlStorePath;

    /**
     * TrickTypeHandler constructor.
     * @param EntityManagerInterface $entityManager
     * @param EventDispatcherInterface $eventDispatcher
     * @param PictureUpload $pictureUpload
     * @param $urlStorePath
     */
    public function __construct(
        EntityManagerInterface $entityManager,
        EventDispatcherInterface $eventDispatcher,
        PictureUpload $pictureUpload,
        $urlStorePath
    ) {
        $this->entityManagerInterface = $entityManager;
        $this->eventDispatcher = $eventDispatcher;
        $this->pictureUpload = $pictureUpload;
        $this->urlStorePath = $urlStorePath;
    }

    /**
     * @param FormInterface $form
     * @param TrickInterface $trick
     * @return bool
     */
    public function handle(FormInterface $form, TrickInterface $trick)
    {
        if ($form->isSubmitted() && $form->isValid()) {

                foreach ($form['picture']->getData() as $picture) {

                    $fileName = $this->pictureUpload->upload($picture->getFile());

                    $picture->setName($fileName);
                    $picture->setUrl($this->urlStorePath.'/'.$fileName);
                }

            $this->entityManagerInterface->persist($trick);
            $this->entityManagerInterface->flush();

            return true;
        }

        return false;
    }

    /**
     * @param FormInterface $form
     * @param Trick $trick
     * @return bool
     */
    public function handleUpdate(FormInterface $form, Trick $trick)
    {
        if ($form->isSubmitted() && $form->isValid()) {

            foreach ($form['picture']->getData() as $picture) {

                $fileName = $this->pictureUpload->upload($picture->getFile());

                $picture->setName($fileName);
                $picture->setUrl($this->urlStorePath.'/'.$fileName);
            }

            $trick->setModificationDate(new \DateTime());

            $this->entityManagerInterface->flush();

            return true;
        }

        return false;
    }
}
