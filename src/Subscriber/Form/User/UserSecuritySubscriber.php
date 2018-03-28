<?php

namespace App\Subscriber\Form\User;

use App\Events\User\RegistrationUserEvent;
use App\Events\User\ForgotPasswordUserEvent;
use App\Subscriber\Form\User\Interfaces\UserSecuritySubscriberInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Twig\Environment;

/**
 * Class UserSecuritySubscriber.
 */
class UserSecuritySubscriber implements EventSubscriberInterface, UserSecuritySubscriberInterface
{
    /**
     * @var \Swift_Mailer
     */
    private $swiftMailer;

    /**
     * @var Environment
     */
    private $twig;

    /**
     * @var string
     */
    private $emailAddressSend;

    /**
     * UserSecuritySubscriber constructor.
     *
     * @param \Swift_Mailer $swift_Mailer
     * @param Environment   $twig
     * @param string        $emailAddressSend
     */
    public function __construct(\Swift_Mailer $swift_Mailer, Environment $twig, string $emailAddressSend)
    {
        $this->swiftMailer = $swift_Mailer;
        $this->twig = $twig;
        $this->emailAddressSend = $emailAddressSend;
    }

    /**
     * @return array
     */
    public static function getSubscribedEvents()
    {
        return [
            RegistrationUserEvent::NAME => 'onRegistration',
            ForgotPasswordUserEvent::NAME => 'onForgotPassword',
        ];
    }

    /**
     * @param RegistrationUserEvent $userEvent
     */
    public function onRegistration(RegistrationUserEvent $userEvent)
    {
        $token = uniqid('_token_', true);
        $userEvent->getUser()->setValidationToken($token);

        $registrationMail = (new \Swift_Message())
            ->setFrom($this->emailAddressSend)
            ->setTo($userEvent->getUser()->getMail())
            ->setSubject('Confirmation de création de compte')
            ->setBody(
                $this->twig
                     ->render('email/registrationEmail.html.twig', ['user' => $userEvent->getUser()]),
                'text/html'
            );

        $this->swiftMailer
            ->send($registrationMail);
    }

    /**
     * @param ForgotPasswordUserEvent $userEvent
     */
    public function onForgotPassword(ForgotPasswordUserEvent $userEvent)
    {
        $token = uniqid('_token_', true);
        $userEvent->getUser()->setResetToken($token);

        $resetPassword = (new \Swift_Message())
            ->setFrom($this->emailAddressSend)
            ->setTo($userEvent->getUser()->getMail())
            ->setSubject('Mot de passe perdu')
            ->setBody(
                $this->twig
                    ->render('email/forgotPassword.html.twig', ['user' => $userEvent->getUser()]),
                'text/html'
            );

        $this->swiftMailer
             ->send($resetPassword);
    }
}
