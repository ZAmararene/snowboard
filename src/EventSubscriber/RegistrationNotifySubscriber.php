<?php

namespace App\EventSubscriber;

use App\Entity\User;
use App\Service\Events;
use Symfony\Component\EventDispatcher\GenericEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class RegistrationNotifySubscriber implements EventSubscriberInterface
{
    private $email;
    private $sender;
    private $twig;

    public function __construct(\Swift_Mailer $email, $sender, \Twig_Environment $twig)
    {
        $this->email = $email;
        $this->sender = $sender;
        $this->twig = $twig;
    }

    public static function getSubscribedEvents()
    {
        return [
            Events::USER_REGISTERED => 'onUserRegistrated',
            Events::FORGOT_PASSWORD => 'onForgotPassword'
        ];
    }

    public function onUserRegistrated(GenericEvent $event)
    {
        /** @var User $user */
        $user = $event->getSubject();

        $body = $this->renderRegistration($user);

        $message = (new \Swift_Message('Inscription au site snowboard'))
            ->setFrom($this->sender)
            ->setTo($user->getEmail())
            ->setBody($body, 'text/html');
        $this->email->send($message);
    }

    public function onForgotPassword(GenericEvent $event)
    {
        /** @var User $user */
        $user = $event->getSubject();
        $url = $event['url'];
        $body = $this->renderForgotPassword($user, $url);

        $message = (new \Swift_Message('Réinitialisation du mot de passe'))
            ->setFrom($this->sender)
            ->setTo($user->getEmail())
            ->setBody($body, 'text/html');
        $this->email->send($message);
    }

    public function renderRegistration(User $user)
    {
        return $this->twig->render(
            'emails/register.html.twig',
            [
                'lastName' => $user->getLastName(),
                'firstName' => $user->getFirstName()
            ]
        );
    }

    public function renderForgotPassword(User $user, $url)
    {
        return $this->twig->render(
            'emails/forgot.html.twig',
            [
                'lastName' => $user->getLastName(),
                'firstName' => $user->getFirstName(),
                'url' => $url
            ]
        );
    }
}
