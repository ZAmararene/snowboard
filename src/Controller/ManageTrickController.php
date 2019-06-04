<?php

namespace App\Controller;

use App\Entity\Trick;
use App\Service\AddTrickHandler;
use App\Service\DeleteTrickHandler;
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

        if ($addTrickHandler->handle($trick, $request)) {
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
    public function updateTrick(Request $request, Trick $trick, DeleteTrickHandler $deleteTrickHandler)
    {
        if ($deleteTrickHandler->handle($trick, $request)) {
            return $this->redirectToRoute('tricks');
        }

        return $this->render('manage_trick/addTrick.html.twig', [
            'form' => $deleteTrickHandler->getForm()->createView(),
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
        return $this->redirectToRoute('tricks');
    }
}
