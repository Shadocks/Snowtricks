<?php

namespace App\Action\Trick;

use App\Entity\Trick;
use App\Entity\Comment;
use App\Entity\User;
use App\Form\Type\CommentType;
use App\Handler\Interfaces\CommentTypeHandlerInterface;
use App\Action\Interfaces\Trick\DetailsTricksActionInterface;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Twig\Environment;

/**
 * Class DetailsTricksAction.
 */
class DetailsTricksAction implements DetailsTricksActionInterface
{
    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    /**
     * @var CommentTypeHandlerInterface
     */
    private $handler;

    /**
     * @var FormFactoryInterface
     */
    private $formFactory;

    /**
     * @var TokenStorageInterface
     */
    private $tokenStorage;

    /**
     * @var Environment
     */
    private $environment;

    /**
     * @var UrlGeneratorInterface
     */
    private $urlGenerator;

    /**
     * DetailsTricksAction constructor.
     *
     * @param EntityManagerInterface      $entityManager
     * @param CommentTypeHandlerInterface $handler
     * @param FormFactoryInterface        $formFactory
     * @param TokenStorageInterface       $tokenStorage
     * @param Environment                 $environment
     * @param UrlGeneratorInterface       $urlGenerator
     */
    public function __construct(
        EntityManagerInterface $entityManager,
        CommentTypeHandlerInterface $handler,
        FormFactoryInterface $formFactory,
        TokenStorageInterface $tokenStorage,
        Environment $environment,
        UrlGeneratorInterface $urlGenerator
    ) {
        $this->entityManager = $entityManager;
        $this->handler = $handler;
        $this->formFactory = $formFactory;
        $this->tokenStorage = $tokenStorage;
        $this->environment = $environment;
        $this->urlGenerator = $urlGenerator;
    }

    /**
     * @Route(
     *     "/trick/detail/{id}",
     *     name="trick_detail",
     *     methods={"POST", "GET"},
     *     requirements={"id"="\d+"}
     * )
     *
     * @param string $id
     * @param Request $request
     *
     * @return RedirectResponse|Response
     */
    public function __invoke(string $id, Request $request)
    {
        $user = $this->tokenStorage->getToken()->getUser();

        $trick = $this->entityManager->getRepository(Trick::class)
                                     ->findOneByIdJoinToCommentsPicturesVideos($id);

        $comment = new Comment();
        $comment->setTrick($trick);

        if ($user instanceof User) {
            $comment->setUser($user);
        }

        $form = $this->formFactory->create(CommentType::class, $comment)
                                  ->handleRequest($request);

        if ($this->handler->handleAdd($form, $comment)) {
            return new RedirectResponse(
                $this->urlGenerator->generate(
                    'trick_detail',
                    [
                        'id' => $trick->getId(),
                    ]
                )
            );
        }

        return new Response(
            $this->environment->render(
                'detailTrick.html.twig',
                [
                    'trick' => $trick,
                    'form' => $form->createView(),
                ]
            )
        );
    }
}
