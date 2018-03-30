<?php

namespace App\Action\Security;

use App\Entity\User;
use App\Form\Type\ResetPasswordUserType;
use App\Action\Interfaces\Security\ResetPasswordActionInterface;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Twig\Environment;

/**
 * Class ResetPasswordAction.
 */
class ResetPasswordAction implements ResetPasswordActionInterface
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
     * @var UserPasswordEncoderInterface
     */
    private $passwordEncoder;

    /**
     * @var UrlGeneratorInterface
     */
    private $urlGenerator;

    /**
     * @var Environment
     */
    private $environment;

    /**
     * ResetPasswordAction constructor.
     *
     * @param EntityManagerInterface       $entityManager
     * @param FormFactoryInterface         $formFactory
     * @param UserPasswordEncoderInterface $passwordEncoder
     * @param UrlGeneratorInterface        $urlGenerator
     * @param Environment                  $environment
     */
    public function __construct(
        EntityManagerInterface $entityManager,
        FormFactoryInterface $formFactory,
        UserPasswordEncoderInterface $passwordEncoder,
        UrlGeneratorInterface $urlGenerator,
        Environment $environment
    ) {
        $this->entityManager = $entityManager;
        $this->formFactory = $formFactory;
        $this->passwordEncoder = $passwordEncoder;
        $this->urlGenerator = $urlGenerator;
        $this->environment = $environment;
    }

    /**
     * @Route(
     *     "/reset/password/{token}",
     *     name="reset_password",
     *     methods={"POST", "GET"},
     *     requirements={"token"=".+"}
     * )
     *
     * @param Request          $request
     * @param string           $token
     * @param SessionInterface $session
     *
     * @return RedirectResponse|Response
     */
    public function __invoke(Request $request, String $token, SessionInterface $session)
    {
        $user = $this->entityManager->getRepository(User::class)
                                    ->findUserByResetToken($token);

        if (!$user) {
            return new RedirectResponse(
                $this->urlGenerator->generate('home')
            );
        }

        $form = $this->formFactory->create(ResetPasswordUserType::class)
                                  ->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $password = $this->passwordEncoder->encodePassword($form->getData(), $form['plainPassword']->getData());
            $user->setPassword($password);

            $this->entityManager->persist($user);
            $this->entityManager->flush();

            $session->getFlashBag()
                    ->add(
                        'success',
                        'Mot de passe modifé'
                    );

            return new RedirectResponse(
                $this->urlGenerator->generate('home')
            );
        }

        return new Response(
            $this->environment->render(
                'resetPassword.html.twig',
                [
                    'form' => $form->createView()
                ]
            )
        );
    }
}
