<?php

namespace App\Controller;

use App\Entity\Trick;
use App\Entity\Comment;
use App\Handler\CommentHandler;
use App\Repository\TrickRepository;
use App\Repository\CommentRepository;
use Symfony\Component\HttpFoundation\Request;
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
            'tricks' => $trickRepo->findBy([], ['dateAdded' => 'DESC'], 12, 0),
            'totalTricks' => $trickRepo->count([]),
        ]);
    }

    /**
     * @Route("/page-{page}", name="tricks_page")
     */
    public function page(TrickRepository $trickRepo, int $page)
    {
        return $this->render('tricks/page.html.twig', [
            'tricks' => $trickRepo->findBy([], ['dateAdded' => 'DESC'], 12, ($page - 1) * 12),

        ]);
    }

    /**
     * @Route("/trick/{id}", name="trick_show")
     */
    public function showTrick(Trick $trick, Request $request, CommentRepository $commentRepo, CommentHandler $commentHandler)
    {
        $comment = new Comment();

        if ($commentHandler->handle($comment, $request, $trick)) {
            return $this->redirectToRoute('trick_show', ['id' => $trick->getId()]);
        }

        return $this->render('tricks/trickShow.html.twig', [
            'trick' => $trick,
            'comments' => $commentRepo->findBy(['trick' => $trick->getId()], ['dateAdded' => 'DESC'], 10, 0),
            'commentForm' => $commentHandler->getForm()->createView(),
            'totalComments' => count($commentRepo->findBy(['trick' => $trick->getId()])),
        ]);
    }

    /**
     * @Route("/comment/page-{page}/{trickId}", name="comment_page")
     */
    public function commentPage(CommentRepository $commentRepo, int $trickId, int $page)
    {
        return $this->render('tricks/commentPage.html.twig', [
            'comments' => $commentRepo->findBy(['trick' => $trickId], ['id' => 'DESC'], 10, ($page - 1) * 10),

        ]);
    }
}
