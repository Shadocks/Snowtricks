<?php

namespace App\Form\Extension;

use Symfony\Component\Form\FormView;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\AbstractTypeExtension;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\PropertyAccess\PropertyAccess;

/**
 * Class VideoTypeExtension.
 */
class VideoTypeExtension extends AbstractTypeExtension
{
    /**
     * @return string
     */
    public function getExtendedType()
    {
        return UrlType::class;
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefined(
            [
                'video_property_id',
                'video_property_trick',
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
        if (isset($options['video_property_id'])) {
            $parentData = $form->getParent()->getData();

            $videoId = null;
            if (null !== $parentData) {
                $accessor = PropertyAccess::createPropertyAccessor();
                $videoId = $accessor->getValue($parentData, $options['video_property_id']);
            }
        }

        $view->vars['video_id'] = $videoId;

        if (isset($options['video_property_trick'])) {
            $parentData = $form->getParent()->getData();

            $videoTrickId = null;
            if (null !== $parentData) {
                $accessor = PropertyAccess::createPropertyAccessor();
                $videoTrickId = $accessor->getValue($parentData, $options['video_property_trick']);
            }
        }

        $view->vars['video_trick'] = $videoTrickId;
    }
}
