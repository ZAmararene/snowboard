<?php

namespace App\DataFixtures;

use App\Entity\Comment;
use App\DataFixtures\UserFixtures;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class CommentFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $comment1 = $this->leaveAComment($manager, 'linda', 'user1');
        $this->addReference('CommentUser1', $comment1);

        $comment2 = $this->leaveAComment($manager, 'benjamin', 'user2');
        $this->addReference('CommentUser2', $comment2);

        $comment3 = $this->leaveAComment($manager, 'liam', 'user3');
        $this->addReference('CommentUser3', $comment3);

        $comment4 = $this->leaveAComment($manager, 'lycia', 'user4');
        $this->addReference('CommentUser4', $comment4);

        $comment5 = $this->leaveAComment($manager, 'david', 'user5');
        $this->addReference('CommentUser5', $comment5);



        $manager->flush();
    }

    public function leaveAComment($manager, $pseudo, $user)
    {
        $comment = new Comment();
        $comment->setContent('Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. ');
        $comment->setPseudo($pseudo);
        $comment->setDateAdded(new \DateTime());
        $comment->setUser($this->getReference($user));
        $manager->persist($comment);
        return $comment;
    }

    public function getDependencies()
    {
        return [
            UserFixtures::class
        ];
    }
}
