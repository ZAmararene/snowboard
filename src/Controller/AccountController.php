<?php

namespace App\Controller;

use App\Mailer\MailerNotify;
use App\Repository\UserRepository;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Csrf\TokenGenerator\TokenGeneratorInterface;

class AccountController extends AbstractController
{
    /**
     * @Route("/forgotPassword", name="forgot_password")
     */
    public function forgotPassword(Request $request, UserRepository $repo, TokenGeneratorInterface $tokenGenerator, ObjectManager $manager, MailerNotify $mailerNotify)
    {
        if ($request->isMethod('post')) {
            $email = $request->get('email');
            $user = $repo->findOneByEmail($email);

            if ($user) {
                $token = $tokenGenerator->generateToken();
                $user->setResetPassword($token);
                $manager->flush();

                $url = $this->generateUrl('reset_password', ['token' => $token], UrlGeneratorInterface::ABSOLUTE_URL);

                // Envoyer un email  à l'utilisateur pour réinitialiser son mot de passe
                $mailerNotify->mailer($user, 'Réinitialisation du mot de passe', 'emails/forgot.html.twig', $url);


                return $this->redirectToRoute('tricks');
            } else {
                $this->addFlash('notice', 'Votre email n\'existe pas.');
            }
        }
        return $this->render('account/forgotPassword.html.twig');
    }

    /**
     * @Route("/resetPassword/{token}", name="reset_password")
     */
    public function resetPassword(Request $request, UserRepository $repo, ObjectManager $manager, string $token)
    {
        if ($request->isMethod('post')) {

            $resetPassword = $request->get('password');

            $user = $repo->findOneByResetPassword($token);

            if ($user === null) {
                return $this->redirectToRoute('tricks');
            }
            $user->setResetPassword(null);
            $user->setPlainPassword($resetPassword);
            $user->setPassword($resetPassword);
            $manager->flush();
            return $this->redirectToRoute('tricks');
        }
        return $this->render('account/resetPassword.html.twig');
    }
}
