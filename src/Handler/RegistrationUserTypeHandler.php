<?php

namespace App\Handler;

use App\Entity\Interfaces\UserInterface;
use App\Events\User\RegistrationUserEvent;
use App\Service\Interfaces\PictureUploadInterface;
use App\Handler\Interfaces\RegistrationUserTypeHandlerInterface;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

/**
 * Class UserTypeHandler.
 */
class RegistrationUserTypeHandler implements RegistrationUserTypeHandlerInterface
{
    /**
     * @var EntityManagerInterface
     */
    private $entityManagerInterface;

    /**
     * @var EventDispatcherInterface
     */
    private $eventDispatcher;

    /**
     * @var UserPasswordEncoderInterface
     */
    private $passwordEncoder;

    /**
     * @var PictureUploadInterface
     */
    private $pictureUpload;

    /**
     * @var string
     */
    private $urlStorePath;

    /**
     * UserTypeHandler constructor.
     *
     * @param EntityManagerInterface       $entityManagerInterface
     * @param EventDispatcherInterface     $eventDispatcher
     * @param UserPasswordEncoderInterface $passwordEncoder
     * @param PictureUploadInterface       $pictureUpload
     * @param string                       $urlStorePath
     */
    public function __construct(
        EntityManagerInterface $entityManagerInterface,
        EventDispatcherInterface $eventDispatcher,
        UserPasswordEncoderInterface $passwordEncoder,
        PictureUploadInterface $pictureUpload,
        string $urlStorePath
    ) {
        $this->entityManagerInterface = $entityManagerInterface;
        $this->eventDispatcher = $eventDispatcher;
        $this->passwordEncoder = $passwordEncoder;
        $this->pictureUpload = $pictureUpload;
        $this->urlStorePath = $urlStorePath;
    }

    /**
     * @param FormInterface $form
     * @param UserInterface $user
     *
     * @return bool
     */
    public function handleRegistration(FormInterface $form, UserInterface $user)
    {
        if ($form->isSubmitted() && $form->isValid()) {
            $event = new RegistrationUserEvent($user);
            $this->eventDispatcher->dispatch(RegistrationUserEvent::NAME, $event);

            $password = $this->passwordEncoder->encodePassword($user, $user->getPlainPassword());
            $user->setPassword($password);

            $picture = $form['picture']->getData();

            if (null !== $picture) {
                $file = $picture->getFile();
                $user->setPicture($picture);
                $fileName = $this->pictureUpload->upload($file);
                $picture->setName($fileName);
                $picture->setUrl($this->urlStorePath.'/'.$fileName);
            }

            $user->setRoles('ROLE_USER');
            $user->setActive(false);
            $user->setValidated(false);

            $this->entityManagerInterface->persist($user);
            $this->entityManagerInterface->flush();

            return true;
        }

        return false;
    }
}
