<?php

namespace App\Handler;


use App\Entity\Interfaces\UserInterface;
use App\Events\User\RegistrationUserEvent;
use App\Service\PictureUpload;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

/**
 * Class UserTypeHandler
 * @package App\Handler
 */
class UserTypeHandler
{
    /**
     * @var EntityManagerInterface
     */
    private $entityManagerInterface;

    /**
     * @var UserPasswordEncoderInterface
     */
    private $passwordEncoder;

    /**
     * @var PictureUpload
     */
    private $pictureUpload;

    /**
     * @var
     */
    private $urlStorePath;

    /**
     * UserTypeHandler constructor.
     * @param EntityManagerInterface $entityManagerInterface
     * @param UserPasswordEncoderInterface $passwordEncoder
     * @param PictureUpload $pictureUpload
     * @param $urlStorePath
     */
    public function __construct(
        EntityManagerInterface $entityManagerInterface,
        UserPasswordEncoderInterface $passwordEncoder,
        PictureUpload $pictureUpload,
        $urlStorePath
    ) {
        $this->entityManagerInterface = $entityManagerInterface;
        $this->passwordEncoder = $passwordEncoder;
        $this->pictureUpload = $pictureUpload;
        $this->urlStorePath = $urlStorePath;
    }

    /**
     * @param FormInterface $form
     * @param UserInterface $user
     * @return bool
     */
    public function handle(FormInterface $form, UserInterface $user)
    {
        if ($form->isSubmitted() && $form->isValid()) {

            $password = $this->passwordEncoder->encodePassword($user, $user->getPlainPassword());
            $user->setPassword($password);

            $picture = $form['picture']->getData();

            if ($picture !== null) {
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
