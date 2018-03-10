<?php

namespace App\Controller;


use App\Entity\User;
use App\Form\ForgotPasswordUserType;
use App\Form\RegistrationUserType;
use App\Form\ResetPasswordUserType;
use App\Handler\UserTypeHandler;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

/**
 * Class SecurityController
 * @package App\Controller
 */
class SecurityController extends Controller
{
    /**
     * @param Request $request
     * @param UserTypeHandler $handler
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function registration(Request $request, UserTypeHandler $handler)
    {
        $user = new User();
        $form = $this->createForm(RegistrationUserType::class, $user)
                     ->handleRequest($request);

        if ($handler->handle($form, $user)) {
            return $this->redirectToRoute('home');
        }

        return $this->render('registration.html.twig', ['form' => $form->createView()]);
    }

    /**
     * @param Request $request
     * @param AuthenticationUtils $authenticationUtils
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function login(Request $request, AuthenticationUtils $authenticationUtils)
    {
        $error = $authenticationUtils->getLastAuthenticationError();
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('login.html.twig', [
            'last_username' => $lastUsername,
            'error' => $error
        ]);
    }

    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function forgotPassword(Request $request)
    {
        $user = new User();
        $form = $this->createForm(ForgotPasswordUserType::class, $user)
            ->handleRequest($request);

        return $this->render('forgotPassword.html.twig', ['form' => $form->createView()]);
    }

    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function resetPassword(Request $request)
    {
        $user = new User();
        $form = $this->createForm(ResetPasswordUserType::class, $user)
                     ->handleRequest($request);

        return $this->render('resetPassword.html.twig', ['form' => $form->createView()]);
    }
}
