<?php

namespace App\Action\Trick;

use App\Entity\Trick;
use App\Form\Type\TrickUpdateType;
use App\Handler\Interfaces\UpdateTrickTypeHandlerInterface;
use App\Action\Interfaces\Trick\UpdateTricksActionInterface;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Twig\Environment;

/**
 * Class UpdateTricksAction.
 */
class UpdateTricksAction implements UpdateTricksActionInterface
{
    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    /**
     * @var FormFactoryInterface
     */
    private $formFactory;

    /**
     * @var UpdateTrickTypeHandlerInterface
     */
    private $handler;

    /**
     * @var Environment
     */
    private $environment;

    /**
     * @var UrlGeneratorInterface
     */
    private $urlGenerator;

    /**
     * UpdateTricksAction constructor.
     *
     * @param EntityManagerInterface          $entityManager
     * @param FormFactoryInterface            $formFactory
     * @param UpdateTrickTypeHandlerInterface $handler
     * @param Environment                     $environment
     * @param UrlGeneratorInterface           $urlGenerator
     */
    public function __construct(
        EntityManagerInterface $entityManager,
        FormFactoryInterface $formFactory,
        UpdateTrickTypeHandlerInterface $handler,
        Environment $environment,
        UrlGeneratorInterface $urlGenerator
    ) {
        $this->entityManager = $entityManager;
        $this->formFactory = $formFactory;
        $this->handler = $handler;
        $this->environment = $environment;
        $this->urlGenerator = $urlGenerator;
    }

    /**
     * @Route(
     *     "/trick/update/{id}",
     *     name="trick_update",
     *     methods={"POST", "GET"},
     *     requirements={"id"="\d+"}
     * )
     *
     * @param string  $id
     * @param Request $request
     *
     * @return RedirectResponse|Response
     */
    public function __invoke(string $id, Request $request)
    {
        $trick = $this->entityManager->getRepository(Trick::class)
                                     ->findOneByIdJoinToPicturesVideos($id);

        $form = $this->formFactory->create(TrickUpdateType::class, $trick)
                                  ->handleRequest($request);

        if ($this->handler->handleUpdate($form, $trick)) {
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
                'updateTrick.html.twig',
                [
                    'trick' => $trick,
                    'form' => $form->createView(),
                ]
            )
        );
    }
}
