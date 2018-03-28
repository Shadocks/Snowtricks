<?php

namespace App\Handler\Interfaces;

use App\Entity\Interfaces\UserInterface;
use App\Entity\Interfaces\TrickInterface;
use Symfony\Component\Form\FormInterface;

interface AddTrickTypeHandlerInterface
{
    /**
     * @param FormInterface  $form
     * @param TrickInterface $trick
     * @param UserInterface  $user
     *
     * @return mixed
     */
    public function handleAdd(FormInterface $form, TrickInterface $trick, UserInterface $user);
}
