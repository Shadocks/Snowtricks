<?php

namespace App\Action\Trick;

use App\Entity\Trick;
use App\Action\Interfaces\Trick\DeleteTricksActionInterface;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

/**
 * Class DeleteTrickAction.
 */
class DeleteTrickAction implements DeleteTricksActionInterface
{
    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    /**
     * @var UrlGeneratorInterface
     */
    private $urlGenerator;

    /**
     * DeleteTrickAction constructor.
     *
     * @param EntityManagerInterface $entityManager
     * @param UrlGeneratorInterface  $urlGenerator
     */
    public function __construct(
        EntityManagerInterface $entityManager,
        UrlGeneratorInterface $urlGenerator
    ) {
        $this->entityManager = $entityManager;
        $this->urlGenerator = $urlGenerator;
    }

    /**
     * @Route(
     *     "/trick/delete/{id}",
     *     name="trick_delete",
     *     methods={"GET"},
     *     requirements={"id"="\d+"}
     * )
     *
     * @param string           $id
     * @param SessionInterface $session
     *
     * @return RedirectResponse
     */
    public function __invoke(String $id, SessionInterface $session)
    {
        $trick = $this->entityManager->getRepository(Trick::class)
                                     ->findOneTrickBy($id);

        $pictures = $trick->getPicture();

        foreach ($pictures as $picture) {
            unlink('./../public/'.$picture->getUrl());
        }

        $this->entityManager->remove($trick);
        $this->entityManager->flush();

        $session->getFlashBag()
                ->add(
                    'success',
                    'Le trick a bien été supprimé'
                );

        return new RedirectResponse(
            $this->urlGenerator->generate('home')
        );
    }
}
