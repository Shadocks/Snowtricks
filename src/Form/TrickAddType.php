<?php

namespace App\Form;

use App\Entity\Trick;
use App\Subscriber\Form\Trick\TrickAddTypeSubscriber;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class TrickType.
 */
class TrickAddType extends AbstractType
{
    /**
     * @var TrickAddTypeSubscriber
     */
    private $trickAddTypeSubscriber;

    /**
     * TrickAddType constructor.
     *
     * @param TrickAddTypeSubscriber $trickAddTypeSubscriber
     */
    public function __construct(TrickAddTypeSubscriber $trickAddTypeSubscriber)
    {
        $this->trickAddTypeSubscriber = $trickAddTypeSubscriber;
    }

    /**
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class)
            ->add('category', TextType::class)
            ->add('description', TextareaType::class)
            ->add('picture', CollectionType::class, [
                'entry_type' => PictureType::class,
                'allow_add' => true,
                'allow_delete' => true,
                'by_reference' => false,
            ])
            ->add('video', CollectionType::class, [
                'entry_type' => VideoType::class,
                'allow_add' => true,
                'allow_delete' => true,
                'by_reference' => false,
            ])
            ->addEventSubscriber($this->trickAddTypeSubscriber)
        ;
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configurationOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Trick::class,
        ]);
    }
}
