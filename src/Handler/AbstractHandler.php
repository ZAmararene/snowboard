<?php

namespace App\Handler;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\Form\FormInterface;

abstract class AbstractHandler
{
    protected $form;
    protected $formFactory;
    protected $entityManager;
    protected $security;

    public function __construct(
        FormFactoryInterface $formFactory,
        EntityManagerInterface $entityManager,
        Security $security
    ) {
        $this->formFactory = $formFactory;
        $this->entityManager = $entityManager;
        $this->security = $security;
    }

    public function handle($data, Request $request, $extraData)
    {
        $this->form = $this->formFactory->create($this->getFormType(), $data)->handleRequest($request);

        if ($this->form->isSubmitted() && $this->form->isValid()) {
            $this->process($data, $extraData);
            return true;
        }
        return false;
    }

    public function getForm(): FormInterface
    {
        return $this->form;
    }

    abstract function getFormType();
    abstract function process($data, $extraData);
}
