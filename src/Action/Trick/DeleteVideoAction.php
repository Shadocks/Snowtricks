<?php

namespace App\Action\Trick;

use App\Entity\Video;
use App\Action\Interfaces\Trick\DeleteVideoActionInterface;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

/**
 * Class DeleteVideoAction.
 */
class DeleteVideoAction implements DeleteVideoActionInterface
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
     * DeleteVideoAction constructor.
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
     *     "/video/delete/{id_video}/trick/{id_trick}",
     *     name="video_delete",
     *     methods={"GET"},
     *     requirements={"id_video"="\d+", "id_trick"="\d+"}
     * )
     *
     * @param string $id_video
     * @param string $id_trick
     *
     * @return RedirectResponse
     */
    public function __invoke(String $id_video, String $id_trick)
    {
        $video = $this->entityManager->getRepository(Video::class)
                                     ->findOneVideoBy($id_video);

        $this->entityManager->remove($video);
        $this->entityManager->flush();

        return new RedirectResponse(
            $this->urlGenerator->generate(
                'trick_update',
                [
                    'id' => $id_trick,
                ]
            )
        );
    }
}
