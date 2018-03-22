<?php

namespace App\Action\Trick;

use App\Entity\Picture;
use App\Action\Interfaces\Trick\DeletePictureActionInterface;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

/**
 * Class DeletePictureAction.
 */
class DeletePictureAction implements DeletePictureActionInterface
{
    /**
     * @var UrlGeneratorInterface
     */
    private $urlGenerator;

    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    /**
     * DeletePictureAction constructor.
     *
     * @param UrlGeneratorInterface  $urlGenerator
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(
        UrlGeneratorInterface $urlGenerator,
        EntityManagerInterface $entityManager
    ) {
        $this->urlGenerator = $urlGenerator;
        $this->entityManager = $entityManager;
    }

    /**
     * @Route(
     *     "/picture/delete/{id_picture}",
     *     name="picture_delete",
     *     methods={"GET"},
     *     requirements={"id_picture"="\d+"}
     * )
     *
     * @param string $id_picture
     *
     * @return RedirectResponse
     */
    public function __invoke(String $id_picture)
    {
        $picture = $this->entityManager->getRepository(Picture::class)
                                       ->findOnePictureBy($id_picture);

        $this->entityManager->remove($picture);
        $this->entityManager->flush();

        unlink('./../public/'.$picture->getUrl());

        return new RedirectResponse(
            $this->urlGenerator->generate(
                'trick_update',
                [
                    'id' => $picture->getTrick()->getId(),
                ]
            )
        );
    }
}
