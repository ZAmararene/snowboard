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
        return [Events::USER_REGISTERED => 'onUserRegistrated'];
    }

    public function onUserRegistrated(GenericEvent $event)
    {
        /** @var User $user */
        $user = $event->getSubject();

        $body = $this->renderTemplate($user);

        $message = (new \Swift_Message('Inscription au site snowboard'))
            ->setFrom($this->sender)
            ->setTo($user->getEmail())
            ->setBody($body, 'text/html');
        $this->email->send($message);
    }

    public function renderTemplate(User $user)
    {
        return $this->twig->render(
            'emails/register.html.twig',
            [
                'lastName' => $user->getLastName(),
                'firstName' => $user->getFirstName()
            ]
        );
    }
}
