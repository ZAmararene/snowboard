<?php

namespace App\Controller;

use App\Entity\Trick;
use App\Form\AddTrickType;
use App\Service\PictureUploader;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ManageTrickController extends AbstractController
{
    /**
     * @Route("/manage/trick", name="add_trick")
     */
    public function addTrick(Request $request, ObjectManager $manager, PictureUploader $pictureUploader)
    {
        $trick = new Trick();

        $form = $this->createForm(AddTrickType::class, $trick);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $trick->setUser($this->getUser());
            $manager->persist($trick);
            $manager->flush();
            return $this->redirectToRoute('tricks');
        }

        return $this->render('manage_trick/addTrick.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
