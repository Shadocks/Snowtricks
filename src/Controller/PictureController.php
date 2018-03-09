<?php

namespace App\Controller;


use App\Entity\Picture;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

/**
 * Class PictureController
 * @package App\Controller
 */
class PictureController extends Controller
{
    /**
     * @var UrlGeneratorInterface
     */
    private $urlGenerator;

    /**
     * PictureController constructor.
     * @param UrlGeneratorInterface $urlGenerator
     */
    public function __construct(UrlGeneratorInterface $urlGenerator)
    {
        $this->urlGenerator = $urlGenerator;
    }

    /**
     * @param $id_picture
     * @param $id_trick
     * @return RedirectResponse
     */
    public function deletePicture($id_picture, $id_trick)
    {
        $em = $this->getDoctrine()->getManager();
        $picture = $em->getRepository(Picture::class)->findOnePictureBy($id_picture);
        $em->remove($picture);
        $em->flush();

        unlink('./../public/'.$picture->getUrl());

        return new RedirectResponse($this->urlGenerator->generate('trick_update', ['id' => $id_trick]));
    }
}
