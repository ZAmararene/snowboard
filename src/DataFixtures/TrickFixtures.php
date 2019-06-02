<?php

namespace App\DataFixtures;

use App\Entity\Trick;
use App\DataFixtures\GroupesFixtures;
use Doctrine\Bundle\FixturesBundle\Fixture;
use App\DataFixtures\PicturesVideosFixtures;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class TrickFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $name1 = 'Backside Triple Cork 1440';
        $content1 = 'En langage snowboard, un cork est une rotation horizontale plus ou moins désaxée, selon
            un mouvement d\'épaules effectué juste au moment du saut. Le tout premier Triple Cork a été plaqué
            par Mark McMorris en 2011, lequel a récidivé lor s  des Winter X Games 2012... avant de se faire
            voler la vedette par Torst ein Horgmo, lors de ce même championnat. Le Norvégien réalisa son propre
            Back s ide  Triple Cork 1440 et obtint la note parfaite de 50/50.';
        $trick1 = $this->create($name1, $content1);
        $trick1->setUser($this->getReference('user4'));
        $trick1->setGroupe($this->getReference('groupe1'));
        // $trick1->addPicture($this->getReference('picture1'));
        $trick1->addVideo($this->getReference('video1'));
        $manager->persist($trick1);
        $this->addReference('trick1', $trick1);

        $name2 = 'Method Air';
        $content2 = 'Cette figure – qui consiste à attraper sa planche d\'une main et le tourner perpendiculairement au sol – est un classique  "old  school". Il  n\'empêche qu\'il est indémodable, avec de vrais ambassadeurs comme Jamie Lynn  ou la star Terje Haakonsen. En 2007, ce dernier a même battu le  record du monde du "air" le plus haut en s\'élevant  à 9,8  mètres au-dessus du kick (sommet d\'un mur d\'une rampe ou autre structure de saut).';
        $trick2 = $this->create($name2, $content2);
        $trick2->setUser($this->getReference('user1'));
        $trick2->setGroupe($this->getReference('groupe3'));
        $trick2->addPicture($this->getReference('picture1'));
        $trick2->addVideo($this->getReference('video2'));
        $manager->persist($trick2);
        $this->addReference('trick2', $trick2);

        $name3 = 'Double Backflip One Foot';
        $content3 = 'Comme on peut le deviner, les "one foot" sont des figures réalisées avec un pied décroché de la fixation. Pendant le saut, le snowboarder doit tendre la jambe du côté dudit pied. L\'esthète Scotty Vine – une sorte de Danny MacAskill du snowboard – en a réalisé un bel exemple avec son Double Backflip One Foot.';
        $trick3 = $this->create($name3, $content3);
        $trick3->setUser($this->getReference('user4'));
        $trick3->setGroupe($this->getReference('groupe2'));
        $trick3->addPicture($this->getReference('picture2'));
        $trick3->addVideo($this->getReference('video4'));
        $manager->persist($trick3);
        $this->addReference('trick3', $trick3);

        $name4 = 'Double Mc Twist 1260';
        $content4 = 'Le Mc Twist est un flip (rotation verticale) agrémenté d\'une vrille. Un saut très périlleux réservé aux profess ionnels. Le champion précoce S haun White s\'est illustré par un Double Mc Twist 1260 lors de sa session de Half-Pipe aux Jeux Olympiques de Vancouver en 2010. Nul  doute que c\'est cette figure qui lui a valu de  remporter la médaille d\'or.';
        $trick4 = $this->create($name4, $content4);
        $trick4->setUser($this->getReference('user3'));
        $trick4->setGroupe($this->getReference('groupe5'));
        $trick4->addPicture($this->getReference('picture3'));
        $trick4->addVideo($this->getReference('video4'));
        $manager->persist($trick4);
        $this->addReference('trick4', $trick4);

        $name5 = 'Double Backside Rodeo 1080';
        $content5 = 'À l\'instar du cork, le rodeo est une rotation désaxée, qui se reconnaît par son  aspect vrillé. Un d es plus beaux de l\'histoire est sans aucun doute le Double Backside Rodeo 1080 effectué pour la première fois en compétition par le jeune prodige Travis Rice, lors du Icer Air 2007. La pirouette est t ellement culte qu\'elle a fini dans un jeu vidéo où Travis Rice est l\'un des personnages.';
        $trick5 = $this->create($name5, $content5);
        $trick5->setUser($this->getReference('user2'));
        $trick5->setGroupe($this->getReference('groupe4'));
        $trick2->addPicture($this->getReference('picture1'));
        $trick5->addVideo($this->getReference('video5'));
        $manager->persist($trick5);
        $this->addReference('trick5', $trick5);



        $manager->flush();
    }

    public function create($name, $content)
    {
        $trick = new Trick();
        $trick->setName($name);
        $trick->setContent($content);
        $trick->setDateAdded(new \DateTime());
        $trick->setdateModification(new \DateTime());

        return $trick;
    }

    public function getDependencies()
    {
        return [
            PicturesVideosFixtures::class,
            UserFixtures::class,
            GroupesFixtures::class
        ];
    }
}
