<?php

namespace App\Action\Trick;

use App\Entity\Trick;
use App\Form\Type\TrickAddType;
use App\Handler\Interfaces\AddTrickTypeHandlerInterface;
use App\Action\Interfaces\Trick\AddTricksActionInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Twig\Environment;

/**
 * Class AddTricksAction.
 */
class AddTricksAction implements AddTricksActionInterface
{
    /**
     * @var FormFactoryInterface
     */
    private $formFactory;

    /**
     * @var AddTrickTypeHandlerInterface
     */
    private $handler;

    /**
     * @var Environment
     */
    private $environment;

    /**
     * @var TokenStorageInterface
     */
    private $tokenStorage;

    /**
     * @var UrlGeneratorInterface
     */
    private $urlGenerator;

    /**
     * AddTricksAction constructor.
     *
     * @param FormFactoryInterface         $formFactory
     * @param AddTrickTypeHandlerInterface $handler
     * @param Environment                  $environment
     * @param TokenStorageInterface        $tokenStorage
     * @param UrlGeneratorInterface        $urlGenerator
     */
    public function __construct(
        FormFactoryInterface $formFactory,
        AddTrickTypeHandlerInterface $handler,
        Environment $environment,
        TokenStorageInterface $tokenStorage,
        UrlGeneratorInterface $urlGenerator
    ) {
        $this->formFactory = $formFactory;
        $this->handler = $handler;
        $this->environment = $environment;
        $this->tokenStorage = $tokenStorage;
        $this->urlGenerator = $urlGenerator;
    }

    /**
     * @Route(
     *     "trick/add",
     *     name="trick_add",
     *     methods={"POST", "GET"}
     * )
     *
     * @param Request          $request
     * @param SessionInterface $session
     *
     * @return RedirectResponse|Response
     */
    public function __invoke(Request $request, SessionInterface $session)
    {
        $trick = new Trick();

        $form = $this->formFactory->create(TrickAddType::class, $trick)
                                  ->handleRequest($request);

        $user = $this->tokenStorage->getToken()->getUser();

        if ($this->handler->handleAdd($form, $trick, $user)) {
            $session->getFlashBag()
                    ->add(
                        'success',
                        'Le trick a bien été ajouter.'
                    );

            return new RedirectResponse(
                $this->urlGenerator->generate('home')
            );
        }

        return new Response(
            $this->environment->render(
                'addTrick.html.twig',
                [
                    'form' => $form->createView(),
                ]
            )
        );
    }
}
