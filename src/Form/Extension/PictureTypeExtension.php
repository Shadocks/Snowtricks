<?php

namespace App\Form\Extension;

use Symfony\Component\Form\FormView;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\AbstractTypeExtension;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\PropertyAccess\PropertyAccess;

/**
 * Class PictureTypeExtension.
 */
class PictureTypeExtension extends AbstractTypeExtension
{
    /**
     * @return string
     */
    public function getExtendedType()
    {
        return FileType::class;
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefined(
            [
            'image_property_url',
            'image_property_id',
            'image_property_trick',
            ]
        );
    }

    /**
     * @param FormView      $view
     * @param FormInterface $form
     * @param array         $options
     */
    public function buildView(FormView $view, FormInterface $form, array $options)
    {
        if (isset($options['image_property_url'])) {
            $parentData = $form->getParent()->getData();

            $imageUrl = null;
            if (null !== $parentData) {
                $accessor = PropertyAccess::createPropertyAccessor();
                $imageUrl = $accessor->getValue($parentData, $options['image_property_url']);
            }
        }

        $view->vars['image_url'] = $imageUrl;

        if (isset($options['image_property_id'])) {
            $parentData = $form->getParent()->getData();

            $imageId = null;
            if (null !== $parentData) {
                $accessor = PropertyAccess::createPropertyAccessor();
                $imageId = $accessor->getValue($parentData, $options['image_property_id']);
            }
        }

        $view->vars['image_id'] = $imageId;
    }
}
