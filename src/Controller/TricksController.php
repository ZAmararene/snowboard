<?php

namespace App\Controller;

use App\Entity\Trick;
use App\Repository\TrickRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class TricksController extends AbstractController
{
    /**
     * @Route("/", name="tricks")
     */
    public function index(TrickRepository $trickRepo)
    {
        return $this->render('tricks/index.html.twig', [
            'tricks' => $trickRepo->findBy([], null, 12, 0),
            'totalTricks' => count($trickRepo->findAll()),
        ]);
    }

    /**
     * @Route("/page-{page}", name="tricks_page")
     */
    public function page(TrickRepository $trickRepo, int $page)
    {
        return $this->render('tricks/page.html.twig', [
            'tricks' => $trickRepo->findBy([], ['id' => 'ASC'], 12, ($page - 1) * 12),
        ]);
    }

    /**
     * @Route("/trick/{id}", name="trick_show")
     */
    public function show(TrickRepository $repoTrick, int $id, Trick $trick)
    {
        return $this->render('tricks/trickShow.html.twig', [
            'trick' => $trick,
        ]);
    }
}
