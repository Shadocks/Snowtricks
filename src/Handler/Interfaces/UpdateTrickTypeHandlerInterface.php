<?php

namespace App\Handler\Interfaces;

use App\Entity\Interfaces\TrickInterface;
use Symfony\Component\Form\FormInterface;

/**
 * Interface UpdateTrickTypeHandlerInterface.
 */
interface UpdateTrickTypeHandlerInterface
{
    /**
     * @param FormInterface  $form
     * @param TrickInterface $trick
     *
     * @return mixed
     */
    public function handleUpdate(FormInterface $form, TrickInterface $trick);
}
