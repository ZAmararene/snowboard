<?php

namespace App\Controller;

use App\Entity\User;
use App\Mailer\MailerNotify;
use App\Service\PictureUploader;
use App\Service\RegistrationHandler;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{
    /**
     * @Route("/registartion", name="security_registration")
     */
    public function registration(Request $request, RegistrationHandler $registrationHandler, PictureUploader $pictureUploader, MailerNotify $mailerNotify)
    {
        $user = new User();

        if ($registrationHandler->handle($user, $request, $pictureUploader)) {

            // Envoyer un email de bienvenue à l'utilisateur
            $mailerNotify->mailer($user, 'Inscription au site snowboard', 'emails/register.html.twig', null);

            $this->addFlash('notice', 'Votre inscription à bien été enregistrée');

            return $this->redirectToRoute('security_login');
        }
        return $this->render('security/registration.html.twig', [
            'form' => $registrationHandler->getForm()->createView(),
        ]);
    }

    /**
     * @Route("/connection", name="security_login")
     *
     * @return void
     */
    public function login(AuthenticationUtils $authenticationUtils)
    {
        return $this->render('security/login.html.twig', [
            'last_username' => $authenticationUtils->getLastUsername(),
            'error' => $authenticationUtils->getLastAuthenticationError()
        ]);
    }

    /**
     * @Route("/logout", name="security_logout")
     */
    public function logout()
    { }
}
