<?php

namespace App\Handler;

use App\Entity\Interfaces\CommentInterface;
use App\Handler\Interfaces\CommentTypeHandlerInterface;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\FormInterface;

/**
 * Class CommentTypeHandler.
 */
class CommentTypeHandler implements CommentTypeHandlerInterface
{
    /**
     * @var EntityManagerInterface
     */
    private $entityManagerInterface;

    public function __construct(
        EntityManagerInterface $entityManager
    ) {
        $this->entityManagerInterface = $entityManager;
    }

    /**
     * @param FormInterface    $form
     * @param CommentInterface $comment
     *
     * @return bool
     */
    public function handleAdd(FormInterface $form, CommentInterface $comment)
    {
        if ($form->isSubmitted() && $form->isValid()) {
            $this->entityManagerInterface->persist($comment);
            $this->entityManagerInterface->flush();

            return true;
        }

        return false;
    }
}
