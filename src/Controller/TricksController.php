<?php

namespace App\Controller;

use App\Repository\TrickRepository;
use App\Repository\PictureRepository;
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
            'tricks' => $trickRepo->findAll(),
        ]);
    }
}
