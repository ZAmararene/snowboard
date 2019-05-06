<?php

namespace App\EventSubscriber;

use App\Entity\User;
use Doctrine\ORM\Events;
use Doctrine\Common\Persistence\Event\LifecycleEventArgs;
use Doctrine\Common\EventSubscriber;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class HashPasswordSubscriber implements EventSubscriber
{
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function getSubscribedEvents()
    {
        return [
            Events::prePersist,
            Events::preUpdate
        ];
    }

    public function prePersist(LifecycleEventArgs $args)
    {
        $entity = $args->getEntity();

        if (!$entity instanceof User) {
            return;
        }

        $this->encodePassword($entity);
    }

    public function preUpdate(LifecycleEventArgs $args)
    {
        $entity = $args->getEntity();
        if (!$entity instanceof User) {
            return;
        }

        $this->encodePassword($entity);
    }

    /**
     *
     * @param User $entity
     * @return void
     */
    private function encodePassword(User $user)
    {
        $plainPassword = $user->getPlainPassword();

        if (!empty($plainPassword)) {
            $encoded = $this->passwordEncoder->encodePassword($user, $plainPassword);
            $user->setPassword($encoded);
            $user->eraseCredentials();
        }
    }
}
