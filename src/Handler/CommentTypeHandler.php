<?php

namespace App\Handler;


use App\Entity\Interfaces\CommentInterface;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\FormInterface;

class CommentTypeHandler
{
    /**
     * @var EntityManagerInterface
     */
    private $entityManagerInterface;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManagerInterface = $entityManager;
    }

    public function handle(FormInterface $form, CommentInterface $comment)
    {
        if ($form->isSubmitted() && $form->isValid()) {
            $this->entityManagerInterface->persist($comment);
            $this->entityManagerInterface->flush();

            return true;
        }

        return false;
    }
}
