<?php

namespace App\Controller;

use App\Entity\Trick;
use App\Form\AddTrickType;
use App\Repository\TrickRepository;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ManageTrickController extends AbstractController
{
    /**
     * @Route("/manage/trick", name="add_trick")
     */
    public function addTrick(Request $request, ObjectManager $manager, TrickRepository $repo)
    {
        $trick = new Trick();

        $form = $this->createForm(AddTrickType::class, $trick);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $trick->setUser($this->getUser());
            $name = $repo->findByName($form['name']->getData());

            if ($name) {
                $this->addFlash('notice', 'La figure exite déjà, Veuillez en choisir une autre');
                return $this->redirectToRoute('add_trick');
            }

            $manager->persist($trick);
            $manager->flush();

            return $this->redirectToRoute('tricks');
        }

        return $this->render('manage_trick/addTrick.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/manage/update/{id}", name="update_trick")
     */
    public function updateTrick(Request $request, ObjectManager $manager, Trick $trick)
    {
        $form = $this->createForm(AddTrickType::class, $trick);
        $form->handleRequest($request);

        // $pictures = $repo->find($trick->getId())->getPictures();
        // dd($trick->getPictures()[0]);

        if ($form->isSubmitted() && $form->isValid()) {
            $trick->setDateModification(new \DateTime());
            $uploadedFiles = $form['pictures']->getData();
            $destination = $this->getParameter('kernel.project_dir') . '/public/uploads/pictures';

            // $data = $form->getData();
            // dd($uploadedFiles);
            // if ($trick->getPictures() === null) {
            //     foreach ($trick->getPictures() as $picture) {
            //         dd($picture);
            //         $picture->setName(null);
            //     }
            // }
            $manager->flush();

            return $this->redirectToRoute('tricks');
        }

        return $this->render('manage_trick/addTrick.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
