<?php

namespace App\Controller;

use App\Entity\Trick;
use App\Handler\AddTrickHandler;
use App\Service\PictureUploader;
use App\Handler\UpdateTrickHandler;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ManageTrickController extends AbstractController
{
    /**
     * @Route("/manage/trick", name="add_trick")
     */
    public function addTrick(Request $request, AddTrickHandler $addTrickHandler)
    {
        $trick = new Trick();

        if ($addTrickHandler->handle($trick, $request, null)) {
            $this->addFlash('notice', 'Le trick à bien été ajouté');
            return $this->redirectToRoute('tricks');
        }

        return $this->render('manage_trick/addTrick.html.twig', [
            'form' => $addTrickHandler->getForm()->createView(),
            'task' => 'addTrick'
        ]);
    }

    /**
     * @Route("/manage/update/{id}", name="update_trick")
     */
    public function updateTrick(Request $request, Trick $trick, UpdateTrickHandler $updateTrickHandler, PictureUploader $pictureUploader)
    {
        if ($updateTrickHandler->handle($trick, $request, $pictureUploader)) {
            $this->addFlash('notice', 'Le trick à bien été modifié');
            return $this->redirectToRoute('tricks');
        }

        return $this->render('manage_trick/addTrick.html.twig', [
            'form' => $updateTrickHandler->getForm()->createView(),
            'trick' => $trick,
            'task' => 'editTrick'
        ]);
    }

    /**
     * @Route("/manage/delete/{id}", name="delete_trick")
     */
    public function deleteTrick(ObjectManager $manager, Trick $trick)
    {
        $manager->remove($trick);
        $manager->flush();

        $this->addFlash('notice', 'Le trick à bien été supprimé');

        return $this->redirectToRoute('tricks');
    }
}
