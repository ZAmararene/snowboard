<?php

namespace App\Controller;

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
     * @Route("/page-{page}", name="tricksPage")
     */
    public function page(TrickRepository $trickRepo, int $page)
    {
        return $this->render('tricks/page.html.twig', [
            'tricks' => $trickRepo->findBy([], null, 12, ($page - 1) * 12),
        ]);
    }
}
