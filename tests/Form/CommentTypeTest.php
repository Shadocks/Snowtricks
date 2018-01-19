<?php

namespace tests\Form;


use App\Entity\Comment;
use App\Form\CommentType;
use Symfony\Component\Form\Test\TypeTestCase;

/**
 * Class CommentTypeTest
 * @package tests\Form
 */
class CommentTypeTest extends TypeTestCase
{
    public function testDataPass()
    {
        $comment = new Comment();
        $comment->setContent('Hello world');

        $form = $this->factory->create(CommentType::class, $comment);

        static::assertTrue($form->isSynchronized());
        static::assertEquals($comment, $form->getData());
    }
}
