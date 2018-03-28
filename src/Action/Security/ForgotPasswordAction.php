<?php

namespace App\Action\Security;

use App\Entity\User;
use App\Form\Type\ForgotPasswordUserType;
use App\Events\User\ForgotPasswordUserEvent;
use App\Action\Interfaces\Security\ForgotPasswordActionInterface;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Twig\Environment;

/**
 * Class ForgotPasswordAction.
 */
class ForgotPasswordAction implements ForgotPasswordActionInterface
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
     * @var EventDispatcherInterface
     */
    private $eventDispatcher;

    /**
     * @var Environment
     */
    private $environment;

    /**
     * ForgotPasswordAction constructor.
     *
     * @param EntityManagerInterface   $entityManager
     * @param FormFactoryInterface     $formFactory
     * @param EventDispatcherInterface $eventDispatcher
     * @param Environment              $environment
     */
    public function __construct(
        EntityManagerInterface $entityManager,
        FormFactoryInterface $formFactory,
        EventDispatcherInterface $eventDispatcher,
        Environment $environment
    ) {
        $this->entityManager = $entityManager;
        $this->formFactory = $formFactory;
        $this->eventDispatcher = $eventDispatcher;
        $this->environment = $environment;
    }

    /**
     *  @Route(
     *     "/forgot/password",
     *     name="forgot_password",
     *     methods={"POST", "GET"}
     * )
     *
     * @param Request          $request
     * @param SessionInterface $session
     *
     * @return Response
     */
    public function __invoke(Request $request, SessionInterface $session)
    {
        $form = $this->formFactory->create(ForgotPasswordUserType::class)
                                  ->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entity = $this->entityManager->getRepository(User::class)
                                          ->findUserByUserName($form->getData()['username']);

            if (!$entity) {
                $session->getFlashBag()
                        ->add(
                            'failure',
                            'Désolé, '.$form->getData()['username'].' n\'est pas reconnu comme nom d\'utilisateur.'
                        );
            }

            $event = new ForgotPasswordUserEvent($entity);
            $this->eventDispatcher->dispatch(ForgotPasswordUserEvent::NAME, $event);

            $this->entityManager->persist($entity);
            $this->entityManager->flush();

            $session->getFlashBag()
                    ->add(
                        'success',
                        'Un email viens de vous être envoyé.'
                    );
        }

        return new Response(
            $this->environment->render(
                'forgotPassword.html.twig',
                [
                    'form' => $form->createView(),
                ]
            )
        );
    }
}
