<?php

namespace App\Controller;


use App\Entity\Comment;
use App\Entity\Trick;
use App\Form\CommentType;
use App\Form\TrickAddType;
use App\Form\TrickUpdateType;
use App\Handler\CommentTypeHandler;
use App\Handler\TrickTypeHandler;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class TrickController
 * @package App\Controller
 */
class TrickController extends Controller
{
    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function tricks()
    {

        $tricks = $this->getDoctrine()->getManager()->getRepository(Trick::class)->findAllTrick();

        return $this->render('home.html.twig', ['tricks' => $tricks]);
    }

    /**
     * @param $id
     * @param Request $request
     * @param CommentTypeHandler $handler
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function detailTrick($id, Request $request, CommentTypeHandler $handler)
    {
        $trick = $this->getDoctrine()->getManager()->getRepository(Trick::class)->findOneByIdJoinToCommentsPicturesVideos($id);

        $comment = new Comment();
        $comment->setTrick($trick);
        $form = $this->createForm(CommentType::class, $comment)
                     ->handleRequest($request);

        if ($handler->handle($form, $comment)) {
            return $this->redirectToRoute('trick_detail', ['id' => $trick->getId()]);
        }

        return $this->render('detailTrick.html.twig', [
            'trick' => $trick,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @param Request $request
     * @param TrickTypeHandler $handler
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function addTrick(Request $request, TrickTypeHandler $handler)
    {
        $trick = new Trick();
        $form = $this->createForm(TrickAddType::class, $trick)
                     ->handleRequest($request);

        if ($handler->handle($form, $trick)) {
            $this->addFlash('success', 'Le trick a bien été ajouter.');

            return $this->redirectToRoute('home');
        }

        return $this->render('addTrick.html.twig', ['form' => $form->createView()]);
    }

    /**
     * @param $id
     * @param Request $request
     * @param TrickTypeHandler $handler
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function updateTrick($id, Request $request, TrickTypeHandler $handler)
    {
        $trick = $this->getDoctrine()->getManager()->getRepository(Trick::class)->findOneByIdJoinToPicturesVideos($id);

        $form = $this->createForm(TrickUpdateType::class, $trick)
                     ->handleRequest($request);

        if ($handler->handleUpdate($form, $trick)) {
            $this->addFlash('success', 'Le trick a bien été modifié.');

            return $this->redirectToRoute('trick_detail', ['id' => $trick->getId()]);
        }

        return $this->render('updateTrick.html.twig', [
            'trick' => $trick,
            'form' => $form->createView(),
        ]);
    }

    public function deleteTrick($id)
    {
        $em = $this->getDoctrine()->getManager();
        $trick = $em->getRepository(Trick::class)->findOneTrickBy($id);
        $pictures = $trick->getPicture();

        foreach ($pictures as $picture) {
            unlink('./../public/'.$picture->getUrl());
        }

        $em->remove($trick);
        $em->flush();

        $this->addFlash('success', 'Le trick a bien été supprimé');

        return $this->redirectToRoute('home');
    }
}
