<?php

namespace App\Action\User;

use App\Entity\User;
use App\Form\RegistrationUserType;
use App\Action\Interfaces\User\RegistrationActionInterface;
use App\Handler\Interfaces\RegistrationUserTypeHandlerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Twig\Environment;

/**
 * Class RegistrationAction.
 */
class RegistrationAction implements RegistrationActionInterface
{
    /**
     * @var RegistrationUserTypeHandlerInterface
     */
    private $handler;

    /**
     * @var FormFactoryInterface
     */
    private $formFactory;

    /**
     * @var Environment
     */
    private $environment;

    /**
     * @var UrlGeneratorInterface
     */
    private $urlGenerator;

    /**
     * RegistrationAction constructor.
     *
     * @param FormFactoryInterface        $formFactory
     * @param RegistrationUserTypeHandlerInterface $handler
     * @param Environment                 $environment
     * @param UrlGeneratorInterface       $urlGenerator
     */
    public function __construct(
        FormFactoryInterface $formFactory,
        RegistrationUserTypeHandlerInterface $handler,
        Environment $environment,
        UrlGeneratorInterface $urlGenerator
    ) {
        $this->handler = $handler;
        $this->formFactory = $formFactory;
        $this->environment = $environment;
        $this->urlGenerator = $urlGenerator;
    }

    /**
     * @Route(
     *     "/registration",
     *     name="registration",
     *     methods={"POST", "GET"}
     * )
     *
     * @param Request $request
     *
     * @return RedirectResponse|Response
     */
    public function __invoke(Request $request)
    {
        $user = new User();

        $form = $this->formFactory->create(RegistrationUserType::class, $user)
                                  ->handleRequest($request);

        if ($this->handler->handleRegistration($form, $user)) {
            return new RedirectResponse(
                $this->urlGenerator->generate('home')
            );
        }

        return new Response(
            $this->environment->render(
                'registration.html.twig',
                [
                    'form' => $form->createView(),
                ]
            )
        );
    }
}
