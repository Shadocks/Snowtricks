<?php

namespace App\Handler;

use App\Service\PictureUpload;
use App\Entity\Interfaces\UserInterface;
use App\Entity\Interfaces\TrickInterface;
use App\Service\Interfaces\PictureUploadInterface;
use App\Handler\Interfaces\AddTrickTypeHandlerInterface;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\FormInterface;

/**
 * Class TrickTypeHandler.
 */
class AddTrickTypeHandler implements AddTrickTypeHandlerInterface
{
    /**
     * @var EntityManagerInterface
     */
    private $entityManagerInterface;

    /**
     * @var PictureUpload|PictureUploadInterface
     */
    private $pictureUpload;

    /**
     * @var string
     */
    private $urlStorePath;

    /**
     * AddTrickTypeHandler constructor.
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
     * @param UserInterface  $user
     *
     * @return bool
     */
    public function handleAdd(FormInterface $form, TrickInterface $trick, UserInterface $user)
    {
        if ($form->isSubmitted() && $form->isValid()) {
            foreach ($form['picture']->getData() as $picture) {
                $fileName = $this->pictureUpload->upload($picture->getFile());

                $picture->setName($fileName);
                $picture->setUrl($this->urlStorePath.'/'.$fileName);
            }

            $trick->setUser($user);

            $this->entityManagerInterface->persist($trick);
            $this->entityManagerInterface->flush();

            return true;
        }

        return false;
    }
}
