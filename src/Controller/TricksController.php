<?php

namespace App\Controller;

use App\Entity\Trick;
use App\Entity\Comment;
use App\Form\CommentType;
use App\Repository\TrickRepository;
use App\Repository\CommentRepository;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
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
            'totalTricks' => count($trickRepo->findAll()),
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
    public function showTrick(Trick $trick, Request $request, ObjectManager $manager, CommentRepository $commentRepo, int $id)
    {
        $comment = new Comment();
        $form = $this->createForm(CommentType::class, $comment);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $comment->setTrick($trick);
            $user = $this->getUser();
            $comment->setPseudo($user->getPseudo());
            $comment->setUser($user);
            $manager->persist($comment);
            $manager->flush();
            return $this->redirectToRoute('trick_show', ['id' => $trick->getId()]);
        }

        return $this->render('tricks/trickShow.html.twig', [
            'trick' => $trick,
            'comments' => $commentRepo->findBy(['trick' => $id], ['dateAdded' => 'DESC'], 10, 0),
            'commentForm' => $form->createView(),
            'totalComments' => count($commentRepo->findBy(['trick' => $id])),
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
