<?php

namespace App\Controller;

use App\Entity\Trick;
use App\Entity\Picture;
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
        // $picture = new Picture();

        $form = $this->createForm(AddTrickType::class, $trick);
        $form->handleRequest($request);
        dump($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // $picture = $pictureUploader->upload($trick->getPicture());
            // $trick->setPicture($picture);
            $manager->persist($trick);
            $manager->flush();
        }

        return $this->render('manage_trick/addTrick.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
