<?php

namespace App\Form;

use App\Entity\User;
use App\Subscriber\Form\User\UserPictureSubscriber;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class RegistrationUserType.
 */
class RegistrationUserType extends AbstractType
{
    /**
     * @var UserPictureSubscriber
     */
    private $userPictureSubscriber;

    /**
     * RegistrationUserType constructor.
     *
     * @param UserPictureSubscriber $userPictureSubscriber
     */
    public function __construct(
        UserPictureSubscriber $userPictureSubscriber
    ) {
        $this->userPictureSubscriber = $userPictureSubscriber;
    }

    /**
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username', TextType::class)
            ->add('mail', EmailType::class)
            ->add('plainPassword', PasswordType::class)
            ->add('picture', PictureType::class, ['mapped' => false, 'required' => false])
            ->addEventSubscriber($this->userPictureSubscriber)
        ;
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
