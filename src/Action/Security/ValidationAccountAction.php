<?php

namespace App\Action\Security;

use App\Entity\User;
use App\Action\Interfaces\Security\ValidationAccountActionInterface;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

/**
 * Class ValidationAccountAction.
 */
class ValidationAccountAction implements ValidationAccountActionInterface
{
    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    /**
     * @var UrlGeneratorInterface
     */
    private $urlGenerator;

    /**
     * ValidationAccountAction constructor.
     *
     * @param EntityManagerInterface $entityManager
     * @param UrlGeneratorInterface  $urlGenerator
     */
    public function __construct(
        EntityManagerInterface $entityManager,
        UrlGeneratorInterface $urlGenerator
    ) {
        $this->entityManager = $entityManager;
        $this->urlGenerator = $urlGenerator;
    }

    /**
     * @Route(
     *     "/validation/{token}",
     *     name="validation",
     *     methods={"GET"},
     *     requirements={"token"=".+"}
     * )
     *
     * @param string           $token
     * @param SessionInterface $session
     *
     * @return RedirectResponse
     */
    public function __invoke(String $token, SessionInterface $session)
    {
        $user = $this->entityManager->getRepository(User::class)
                                    ->findUserByToken($token);

        if (!$user) {
            $session->getFlashBag()
                    ->add(
                        'failure',
                        'Le lien utilisé n\'a pas permit de vous identifier.'
                    );

            return new RedirectResponse(
                $this->urlGenerator->generate('home')
            );
        }

        $user->setValidationDate(new \DateTime());
        $user->setValidated(true);
        $user->setActive(true);

        $this->entityManager->persist($user);
        $this->entityManager->flush();

        $session->getFlashBag()
                ->add(
                    'success',
                    'Bienvenue '.$user->getUsername().', votre compte a été validé.'
                );

        return new RedirectResponse(
            $this->urlGenerator->generate('home')
        );
    }
}
