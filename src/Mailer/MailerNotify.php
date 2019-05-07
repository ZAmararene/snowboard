<?php

namespace App\Mailer;

use App\Entity\User;

class MailerNotify
{
    const SENDER = 'zina.amararene@gmail.com';
    private $email;
    private $twig;

    public function __construct(\Swift_Mailer $email, \Twig_Environment $twig)
    {
        $this->email = $email;
        $this->twig = $twig;
    }

    public function mailer(User $user, $subject, $twig, $url)
    {
        $body = $this->render($user, $twig, $url);

        $message = (new \Swift_Message($subject))
            ->setFrom($this::SENDER)
            ->setTo($user->getEmail())
            ->setBody($body, 'text/html');
        $this->email->send($message);
    }

    public function render(User $user, $twig, $url)
    {
        return $this->twig->render(
            $twig,
            [
                'lastName' => $user->getLastName(),
                'firstName' => $user->getFirstName(),
                'url' => $url
            ]
        );
    }
}
