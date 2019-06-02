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
        $user1 = $this->create('Punzo', 'Corinne', 'corinne', 'corinne@gmail.com');
        $manager->persist($user1);
        $this->addReference('user1', $user1);

        $user2 = $this->create('Leblanc', 'Benjamin', 'benjamin', 'benjamin@gmail.com');
        $manager->persist($user2);
        $this->addReference('user2', $user2);

        $user3 = $this->create('Eudes', 'Liam', 'liam', 'liam@gmail.com');
        $manager->persist($user3);
        $this->addReference('user3', $user3);

        $user4 = $this->create('Eudes', 'Lycia', 'lycia', 'lycia@gmail.com');
        $manager->persist($user4);
        $this->addReference('user4', $user4);

        $manager->flush();
    }

    public function create($lastName, $firstName, $pseudo, $email)
    {
        $user = new User();

        $user->setLastName($lastName);
        $user->setFirstName($firstName);
        $user->setPseudo($pseudo);
        $user->setEmail($email);
        $user->setAvatar('public/images/avatar-fixture.png');
        $password = $this->encoder->encodePassword($user, $pseudo . '12345');
        $user->setPassword($password);
        $user->setDateConnection(new \DateTime());

        return $user;
    }
}
