<?php

namespace App\Action\User;

use App\Action\Interfaces\User\LoginActionInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Twig\Environment;

/**
 * Class LoginAction.
 */
class LoginAction implements LoginActionInterface
{
    /**
     * @var Environment
     */
    private $environment;

    /**
     * LoginAction constructor.
     *
     * @param Environment $environment
     */
    public function __construct(Environment $environment)
    {
        $this->environment = $environment;
    }

    /**
     * @Route(
     *     "/login",
     *     name="login",
     *     methods={"POST", "GET"}
     * )
     *
     * @param AuthenticationUtils $authenticationUtils
     *
     * @return Response
     */
    public function __invoke(AuthenticationUtils $authenticationUtils)
    {
        $error = $authenticationUtils->getLastAuthenticationError();
        $lastUsername = $authenticationUtils->getLastUsername();

        return new Response(
            $this->environment->render(
                'login.html.twig',
                [
                    'last_username' => $lastUsername,
                    'error' => $error,
                ]
            )
        );
    }
}
