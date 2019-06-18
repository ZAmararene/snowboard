<?php
namespace App\Tests\Service;

use App\Entity\Trick;
use App\Handler\AddTrickHandler;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Tests\TestCase;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Security;

class AddTrickHandlerTest extends TestCase
{
    public function testHandleIsTrue()
    {
        $form = $this->createMock(FormInterface::class);
        $form->method("handleRequest")->willReturnSelf();
        $form->method("isSubmitted")->willReturn(true);
        $form->method("isValid")->willReturn(true);
        $formFactory = $this->createMock(FormFactoryInterface::class);
        $formFactory->method("create")->willReturn($form);
        $entityManager = $this->createMock(EntityManagerInterface::class);
        $security = $this->createMock(Security::class);
        $addTrickHandler = new AddTrickHandler(
            $formFactory,
            $entityManager,
            $security
        );
        $this->assertTrue($addTrickHandler->handle(new Trick(), Request::create("/"), null));
        $this->assertInstanceOf(FormInterface::class, $addTrickHandler->getForm());
    }
    public function testHandleIsFalse()
    {
        $form = $this->createMock(FormInterface::class);
        $form->method("handleRequest")->willReturnSelf();
        $form->method("isSubmitted")->willReturn(false);
        $form->method("isValid")->willReturn(false);
        $formFactory = $this->createMock(FormFactoryInterface::class);
        $formFactory->method("create")->willReturn($form);
        $entityManager = $this->createMock(EntityManagerInterface::class);
        $security = $this->createMock(Security::class);
        $addTrickHandler = new AddTrickHandler(
            $formFactory,
            $entityManager,
            $security
        );
        $this->assertFalse($addTrickHandler->handle(new Trick(), Request::create("/"), null));
    }
}
