<?php

namespace App\Controller;


use App\Entity\Video;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

/**
 * Class VideoController
 * @package App\Controller
 */
class VideoController extends Controller
{
    /**
     * @var UrlGeneratorInterface
     */
    private $urlGenerator;

    /**
     * VideoController constructor.
     * @param UrlGeneratorInterface $urlGenerator
     */
    public function __construct(UrlGeneratorInterface $urlGenerator)
    {
        $this->urlGenerator = $urlGenerator;
    }

    /**
     * @param $id_video
     * @param $id_trick
     * @return RedirectResponse
     */
    public function deleteVideo($id_video, $id_trick)
    {
        $em = $this->getDoctrine()->getManager();
        $video = $em->getRepository(Video::class)->findOneVideoBy($id_video);
        $em->remove($video);
        $em->flush();

        return new RedirectResponse($this->urlGenerator->generate('trick_update', ['id' => $id_trick]));
    }
}
