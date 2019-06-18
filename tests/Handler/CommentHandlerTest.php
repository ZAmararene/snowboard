<?php

namespace App\Tests;

use App\Entity\Comment;
use App\Handler\CommentHandler;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Form\FormFactoryInterface;

class CommentHandlerTest
{
    public function testProcess()
    {
        $form = $this->createMock(FormInterface::class);
        $form->method('handleRequest')->willReturnSelf();
        $form->method('isSubmitted')->willReturn(true);
        $form->method('isValid')->willReturn(true);

        $formFactory = $this->createMock(FormFactoryInterface::class);
        $formFactory->method('create')->willReturn($form);

        $entityManager = $this->createMock(EntityManagerInterface::class);

        $security = $this->cretaeMock(Security::class);

        $commentHandler = new CommentHandler($formFactory, $entityManager, $security);

        $this->assertTrue($commentHandler->handle(new Comment(), Request::create('/'), null));
        $this->assertInstanceOf(FormInterface::class, $commentHandler->getForm());
    }
}
