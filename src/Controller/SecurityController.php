<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegistrationType;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class SecurityController extends AbstractController
{
    /**
     * @Route("/registartion", name="security_registration")
     */
    public function registration(Request $request, ObjectManager $manager, \Swift_Mailer $mailer)
    {
        $user = new User();

        $form = $this->createForm(RegistrationType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $image = $user->getAvatar();
            if ($image !== null) {
                $imageName = md5(uniqid()) . '.' . $image->guessExtension();
                $image->move(
                    $this->getParameter('upload_directory'),
                    $imageName
                );
                $user->setAvatar($imageName);
            } else {
                $imageName = 'avatar.png';
                $user->setAvatar($imageName);
            }

            $manager->persist($user);
            $manager->flush();

            // Envoyer un email de bienvenue à l'utilisateur
            $message = (new \Swift_Message('Inscription au site snowboard'))
                ->setFrom('zina.amararene@gmail.com')
                ->setTo($user->getEmail())
                ->setBody(
                    $this->renderView(
                        'emails/register.html.twig',
                        [
                            'lastName' => $user->getLastName(),
                            'firstName' => $user->getFirstName()
                        ]
                    ),
                    'text/html'
                );
            $mailer->send($message);

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
    public function login()
    {
        return $this->render('security/login.html.twig');
    }

    /**
     * @Route("/logout", name="security_logout")
     */
    public function logout()
    { }
}
