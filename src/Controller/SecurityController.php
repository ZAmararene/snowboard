<?php

namespace App\Controller;

use App\Entity\User;
use App\Mailer\MailerNotify;
use App\Form\RegistrationType;
use App\Service\PictureUploader;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{
    /**
     * @Route("/registartion", name="security_registration")
     */
    public function registration(Request $request, ObjectManager $manager, PictureUploader $pictureUploader, MailerNotify $mailerNotify)
    {
        $user = new User();

        $form = $this->createForm(RegistrationType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $imageName = $pictureUploader->upload($user->getAvatar());
            $user->setAvatar($imageName);

            $manager->persist($user);
            $manager->flush();

            // Envoyer un email de bienvenue à l'utilisateur
            $mailerNotify->mailer($user, 'Inscription au site snowboard', 'emails/register.html.twig', null);

            $this->addFlash('notice', 'Votre inscription à bien été enregistrée');

            return $this->redirectToRoute('security_login');
        }
        return $this->render('security/registration.html.twig', [
            'form' => $form->createView(),
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
