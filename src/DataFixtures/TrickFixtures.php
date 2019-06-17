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
        $content1 = 'En langage snowboard, un cork est une rotation horizontale plus ou moins désaxée, selon un mouvement d\'épaules effectué juste au moment du saut. Le tout premier Triple Cork a été plaqué par Mark McMorris en 2011, lequel a récidivé lor s  des Winter X Games 2012... avant de se faire voler la vedette par Torst ein Horgmo, lors de ce même championnat. Le Norvégien réalisa son propre Back s ide  Triple Cork 1440 et obtint la note parfaite de 50/50.';
        $trick1 = $this->create($manager, $name1, $content1, 'user4', 'groupe1', 'picture1', 'video1');
        $this->addReference('trick1', $trick1);

        $name2 = 'Method Air';
        $content2 = 'Cette figure consiste à attraper sa planche d\'une main et le tourner perpendiculairement au sol – est un classique  "old  school". Il  n\'empêche qu\'il est indémodable, avec de vrais ambassadeurs comme Jamie Lynn  ou la star Terje Haakonsen. En 2007, ce dernier a même battu le  record du monde du "air" le plus haut en s\'élevant  à 9,8  mètres au-dessus du kick (sommet d\'un mur d\'une rampe ou autre structure de saut).';
        $trick2 = $this->create($manager, $name2, $content2, 'user1', 'groupe3', 'picture4', 'video2');
        $this->addReference('trick2', $trick2);

        $name3 = 'Double Backflip One Foot';
        $content3 = 'Comme on peut le deviner, les "one foot" sont des figures réalisées avec un pied décroché de la fixation. Pendant le saut, le snowboarder doit tendre la jambe du côté dudit pied. L\'esthète Scotty Vine – une sorte de Danny MacAskill du snowboard – en a réalisé un bel exemple avec son Double Backflip One Foot.';
        $trick3 = $this->create($manager, $name3, $content3, 'user4', 'groupe2', 'picture2', 'video3');
        $this->addReference('trick3', $trick3);

        $name4 = 'Double Mc Twist 1260';
        $content4 = 'Le Mc Twist est un flip (rotation verticale) agrémenté d\'une vrille. Un saut très périlleux réservé aux profess ionnels. Le champion précoce S haun White s\'est illustré par un Double Mc Twist 1260 lors de sa session de Half-Pipe aux Jeux Olympiques de Vancouver en 2010. Nul  doute que c\'est cette figure qui lui a valu de  remporter la médaille d\'or.';
        $trick4 = $this->create($manager, $name4, $content4, 'user3', 'groupe5', 'picture3', 'video4');
        $this->addReference('trick4', $trick4);

        $name5 = 'Double Backside Rodeo 1080';
        $content5 = 'À l\'instar du cork, le rodeo est une rotation désaxée, qui se reconnaît par son  aspect vrillé. Un d es plus beaux de l\'histoire est sans aucun doute le Double Backside Rodeo 1080 effectué pour la première fois en compétition par le jeune prodige Travis Rice, lors du Icer Air 2007. La pirouette est t ellement culte qu\'elle a fini dans un jeu vidéo où Travis Rice est l\'un des personnages.';
        $trick5 = $this->create($manager, $name5, $content5, 'user2', 'groupe8', 'picture5', 'video5');
        $this->addReference('trick5', $trick5);

        $name6 = 'BS 540 Seatbelt';
        $content6 = 'Hitsch aurait tout aussi bien pu faire de la danse classique mais il s’est décidé pour la neige. Peut-être tout simplement parce qu’en Engadine, les montagnes sont plus séduisantes que les gymnases. Quoi qu’il en soit, quiconque arrive à attraper aussi tranquillement l’arrière de la planche avec la main avant pendant un BS 5 dans un half-pipe sans s’ouvrir les lèvres sur le coping devrait occuper une chaire à Cambridge sur les prodiges de la coordination.';
        $trick6 = $this->create($manager, $name6, $content6, 'user2', 'groupe6', 'picture6', 'video6');
        $this->addReference('trick6', $trick6);

        $name7 = 'FS 900';
        $content7 = 'Quand le style est vraiment original, on le reconnaît même dans les tricks banals. Vous en voulez l’exemple parfait? Travis Parker. Il fait un FS 900 (aujourd’hui aussi banal que l’était l’indy il y a 20 ans) depuis la carre front, tient le nose et pendant un instant le monde s’immobilise. Que Travis soit original est de toute manière indiscutable. Qui d’autre annule du jour au lendemain les contrats avec tous ses sponsors pour devenir cuisinier de sushis?';
        $trick7 = $this->create($manager, $name7, $content7, 'user1', 'groupe7', 'picture7', 'video7');
        $this->addReference('trick7', $trick7);

        $name8 = 'One Foot Tricks';
        $content8 = 'Bode Merril est la preuve vivante que la réincarnation n’est pas un conte de fée. Dans sa vie antérieure de flamant rose, il avait déjà l’habitude d’affronter le quotidien sur une patte. Quelque 200 ans plus tard, il a eu la chance d’être un homme doté d’un snowboard, ce qui a fini par donner à son être l’élan nécessaire. Il aime bien s’avaler quelques one foot double backflips au p’tit déj.';
        $trick8 = $this->create($manager, $name8, $content8, 'user4', 'groupe8', 'picture8', 'video8');
        $this->addReference('trick8', $trick8);

        $name9 = 'FS 720 Japan';
        $content9 = 'Si, dans le monde du snowboard, il y avait aujourd’hui encore quelque chose de comparable au rock’n’roll, Ben Ferguson en serait le Jim Morrison, haut la main. Son riding est radical, sans compromis et beau à voir. Bien entendu, rien ne se fait à moins de 200 km/h, pas même les FS 7 Japan dans le pipe.';
        $trick9 = $this->create($manager, $name9, $content9, 'user1', 'groupe3', 'picture9', 'video9');
        $this->addReference('trick9', $trick9);

        $name10 = 'Skate Skills';
        $content10 = 'Scott «MacGyver» Stevens n’aurait en fait pas besoin de forfait de remontée. Scott n’aurait même pas besoin d’aller à la montagne. Scott a juste à sortir de chez lui, respirer un bon coup et démarrer. Après trois jours de tournage, son rôle serait plus long et plus créatif que pour ceux qui ont dû passer 20 heures en avion, 10 heures en voiture, 5 heures en Ski-Doo et 2 heures en hélicoptère pour leur séquence.';
        $trick10 = $this->create($manager, $name10, $content10, 'user3', 'groupe5', 'picture10', 'video10');
        $this->addReference('trick10', $trick10);

        $name11 = 'Switch Method';
        $content11 = 'Danny Davis est comme ces meilleurs potes qui peuvent faire tous les tricks avec juste un tout petit plus de classe que toi. Aussi difficiles ou aussi faciles soient-ils. Si un nombre incalculable de blessures ne l’avait pas cloué au lit, il aurait mis sens dessus dessous le monde de la compétition en pipe. Heureusement qu’il y a la vidéo. Et puis on peut quand même se faire une compétition de temps en temps. Et alors on peut y mettre un peu de switch method pour faire tomber les juges à la renverse.';
        $trick11 = $this->create($manager, $name11, $content11, 'user4', 'groupe1', 'picture11', 'video11');
        $this->addReference('trick11', $trick11);

        $name12 = 'Going bigger';
        $content12 = 'Soyons francs, tous les tricks de Travis pourraient être des signatures. Son genre «I go bigger» se voit probablement dès le matin aux toilettes. Trois fois par dessus la tête ou simply straight, il semble que Travis puisse à peu près tout essayer plus haut, plus loin, plus extrême, plus beau et en premier la plupart du temps.';
        $trick12 = $this->create($manager, $name12, $content12, 'user5', 'groupe3', 'picture12', 'video12');
        $this->addReference('trick12', $trick12);

        $name13 = 'McTwist';
        $content13 = 'Terje se sent mieux dans les transitions que Trump dans sa tour. Pas étonnant, il a détenu pendant longtemps le record du highest air. En mars 2007 à Oslo, il s’est catapulté à un bon 9,8 mètres sur un quarterpipe. Pendant le saut, l’altitude l’a surpris lui-même, c’est pourquoi il a rapidement transformé la méthode prévue en un BS 360. Pourquoi se priver quand on peut. Les McTwists dans un half-pipe par contre c’est plutôt comme une fête d’anniversaire. On a besoin d’un peu d’alley-oop et de chicken wings pour trouver le frisson.';
        $trick13 = $this->create($manager, $name13, $content13, 'user3', 'groupe8', 'picture13', 'video13');
        $this->addReference('trick13', $trick13);

        $name14 = 'Buttered Tricks';
        $content14 = 'Que faire quand passer les kickers devient monotone? Facile, on rend l’approche plus difficile. C’est du moins ce que s’est dit Jussi quand il a filmé son rôle pour Afterbang (Robot Food; 2002). Concrètement, ça veut dire faire du buttering à gogo. Pour Jussi, ce n’est pas vraiment un problème même avant un switch backside 900.';
        $trick14 = $this->create($manager, $name14, $content14, 'user1', 'groupe3', 'picture14', 'video14');
        $this->addReference('trick14', $trick14);

        $name15 = 'Lobster Flip';
        $content15 = 'Nommer son trick typique d’après sa propre marque de snowboard est plutôt osé. Les mômes regardent la vidéo, se disent «ouaouh», essaient d’imiter l’acrobatie et avant ça vont s’acheter la planche qu’il faut. D’apparence innocent comme un agneau, Halldor est en fait le businessman le plus dur à cuire d’Islande. Tout cela sans le vouloir évidemment.';
        $trick15 = $this->create($manager, $name15, $content15, 'user4', 'groupe5', 'picture15', 'video15');
        $this->addReference('trick15', $trick15);

        $name16 = ' Nuckle Tricks';
        $content16 = 'Marcus est né juste avant le millénaire et atteint sa majorité cette année. Quel toupet quand on pense à tous les tricks que ce gamin a déjà sous la ceinture. Qu’est-ce que vont dire ses petits enfants en 2075 quand il leur racontera qu’il a appris à faire ses premier 1080 en atterrissant des kickers? Et qu’est-ce qu’il pourra bien leur raconter sur les 2022? Backside Octa Cork to FS Edgeslide au-dessus de télécabine to Triple FS Rodeo Truck Driver out?';
        $trick16 = $this->create($manager, $name16, $content16, 'user2', 'groupe4', 'picture16', 'video16');
        $this->addReference('trick16', $trick16);

        $manager->flush();
    }

    public function create(ObjectManager $manager, $name, $content, $user, $groupe, $picture, $video)
    {
        $trick = new Trick();
        $trick->setName($name);
        $trick->setContent($content);
        $trick->setDateAdded(new \DateTime());
        $trick->setUser($this->getReference($user));
        $trick->setGroupe($this->getReference($groupe));
        $trick->addPicture($this->getReference($picture));
        $trick->addVideo($this->getReference($video));

        for ($i = 1; $i <= mt_rand(1, 3); $i++) {
            $trick->addComment($this->getReference('CommentUser' . $i));
        }

        $manager->persist($trick);

        return $trick;
    }

    public function getDependencies()
    {
        return [
            PicturesVideosFixtures::class,
            UserFixtures::class,
            GroupesFixtures::class,
            CommentFixtures::class
        ];
    }
}
