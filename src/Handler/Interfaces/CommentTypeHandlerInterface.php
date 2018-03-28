<?php

namespace App\Handler\Interfaces;

use App\Entity\Interfaces\CommentInterface;
use Symfony\Component\Form\FormInterface;

/**
 * Interface CommentTypeHandlerInterface.
 */
interface CommentTypeHandlerInterface
{
    /**
     * @param FormInterface    $form
     * @param CommentInterface $comment
     *
     * @return mixed
     */
    public function handleAdd(FormInterface $form, CommentInterface $comment);
}
