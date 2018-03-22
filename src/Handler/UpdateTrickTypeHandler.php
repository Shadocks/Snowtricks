<?php

namespace App\Handler;

use App\Entity\Interfaces\TrickInterface;
use App\Service\Interfaces\PictureUploadInterface;
use App\Handler\Interfaces\UpdateTrickTypeHandlerInterface;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\FormInterface;

/**
 * Class UpdateTrickTypeHandler.
 */
class UpdateTrickTypeHandler implements UpdateTrickTypeHandlerInterface
{
    /**
     * @var EntityManagerInterface
     */
    private $entityManagerInterface;

    /**
     * @var PictureUploadInterface
     */
    private $pictureUpload;

    /**
     * @var string
     */
    private $urlStorePath;

    /**
     * UpdateTrickTypeHandler constructor.
     *
     * @param EntityManagerInterface $entityManager
     * @param PictureUploadInterface $pictureUpload
     * @param string                 $urlStorePath
     */
    public function __construct(
        EntityManagerInterface $entityManager,
        PictureUploadInterface $pictureUpload,
        string $urlStorePath
    ) {
        $this->entityManagerInterface = $entityManager;
        $this->pictureUpload = $pictureUpload;
        $this->urlStorePath = $urlStorePath;
    }

    /**
     * @param FormInterface  $form
     * @param TrickInterface $trick
     *
     * @return bool
     */
    public function handleUpdate(FormInterface $form, TrickInterface $trick)
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
