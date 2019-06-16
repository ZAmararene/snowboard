<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {
        $user1 = $this->create('Amara', 'Linda', 'linda', 'linda@gmail.com');
        $user1->setAvatar('avatar-fixture1.jpg');
        $manager->persist($user1);
        $this->addReference('user1', $user1);

        $user2 = $this->create('Leblanc', 'Benjamin', 'benjamin', 'benjamin@gmail.com');
        $user2->setAvatar('avatar-fixture2.png');
        $manager->persist($user2);
        $this->addReference('user2', $user2);

        $user3 = $this->create('Eudes', 'Liam', 'liam', 'liam@gmail.com');
        $user3->setAvatar('avatar-fixture3.jpg');
        $manager->persist($user3);
        $this->addReference('user3', $user3);

        $user4 = $this->create('Eudes', 'Lycia', 'lycia', 'lycia@gmail.com');
        $user4->setAvatar('avatar-fixture4.jpg');
        $manager->persist($user4);
        $this->addReference('user4', $user4);

        $user5 = $this->create('Leblanc', 'david', 'david', 'david@gmail.com');
        $user5->setAvatar('avatar-fixture5.png');
        $manager->persist($user5);
        $this->addReference('user5', $user5);

        $manager->flush();
    }

    public function create($lastName, $firstName, $pseudo, $email)
    {
        $user = new User();

        $user->setLastName($lastName);
        $user->setFirstName($firstName);
        $user->setPseudo($pseudo);
        $user->setEmail($email);
        $password = $this->encoder->encodePassword($user, $pseudo . '12345');
        $user->setPassword($password);
        $user->setDateConnection(new \DateTime());

        return $user;
    }
}
