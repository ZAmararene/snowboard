<?php

namespace App\DataFixtures;

use App\Entity\GroupTrick;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class GroupesFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $descript1 = 'Tout d\'abord, il faut savoir  qu\'il y a deux positions sur sa planche: regular ou goofy. Un rider regular aura son pied gauche devant et un rider goofy aura son pied droit devant. Après un certain moment, les planchistes sont capables de descendre dans les deux positions. Un rider regular qui descend en position goofy, dira  qu\'il descend « s witch ». Généralement, une manœuvre sera considéré comme plus difficile quand elle est   effectué « switch ».';
        $this->create($manager, 'La manière de rider',  $descript1, 1);

        $descript2 = 'Un grab consiste à attraper la planche avec la main pendant le saut. Le verbe anglais to grab signifie «attraper»Il existe plusieurs types de grabs selon la position de la saisie et la main choisie pour l\'effectuer, avec des difficultés variables';
        $this->create($manager, 'Les grabs', $descript2, 2);

        $descript3 = 'On désigne par le mot « rotation » uniquement des rotations horizontales ; les rotations verticales sont des flips. Le principe est d\'effectuer une rotation horizontale pendant le saut, puis d\'attérir en position switch ou normal. La nomenclature se base sur le nombre de degrés de rotation effectués.';
        $this->create($manager, 'Les rotations', $descript3, 3);

        $descript4 = 'Un flip est une rotation verticale. On distingue les front flips, rotations en avant, et les back flips, rotations en arrière. Il est possible de faire plusieurs flips à la suite, et d\'ajouter un grab à la rot ation. Les flips agré mentés d\'une vrille existent aussi (Mac Twist, Hakon Flip, ...), mais de manière beaucoup plus rare, et se confondent souvent avec certaines rotations horizontales désaxées. Néanmoins, en dépit de la difficulté technique relative d\'une telle figure, le danger de retomber sur la tête ou la nuque est réel et conduit certaines stations de ski à interdire d e telles figures dans ses snowparks.';
        $this->create($manager, 'Les flips', $descript4, 4);

        $descript5 = 'Une rotation désaxée est une rotation initialement horizontale mais lancée avec un mouvement des épaules particulier qui désaxe la rotation. Il existe différents types de rotations désaxées (corkscrew ou cork, rodeo, misty etc.) en fonction de la manière dont est lancé le buste. Certaines de ces rotations, bien qu\'initialement horizontales, font passer la tête  en bas. Bien que certaines de ces rotations soient plus faciles à faire sur un certain nombre de tours (ou de demi-tours) que d\'autres, il est  en théo rie possible de d\'attérir n\'importe quel le rotation désaxée avec n\'importe quel nombre de tours, en jouant sur la quantité de désaxage afin de se r etrouver à la position ver ticale au moment voulu. Il est également possible d\'agrémenter une rotation désaxée par un grab.';
        $this->create($manager, 'Les rotations désaxées', $descript5, 5);

        $descript6 = 'Un slide consiste à glisser sur une barre de slide. Le slide se fait soit avec la planche dans l\'axe de la barre, soit perpendiculaire, soit plus ou moins désaxé. On peut slider avec la planche centrée par rappor t  à la barre(celle-ci se sit u e approximativement au-dessous des pieds du rideur), mais aussi  en nose slide, c\'est-à-dire l\'avant de la p lanche sur la barre, ou en tail slide, l\'arrière de la planche sur la barre.';
        $this->create($manager, 'Les slides', $descript6, 6);

        $descript7 = 'Figures réalisée avec un pied décroché de la fixation, afin de tendre la jambe correspondante pour mettre en évidence le fait que le pied n\'est pas fixé. Ce type de figure est extrêmement dangereuse pour les ligaments du genou en cas de  m auvaise réception.';
        $this->create($manager, 'Les one foot tricks', $descript7, 7);

        $descript8 = 'Le terme old school désigne un style de freestyle caractérisée par en ensemble de figure et une manière de réaliser des figures passée de mode, qui fait penser au freestyle des années 1980 - début 1990 (par opposition à new school)';
        $this->create($manager, 'Old school', $descript8, 8);
    }

    public function create($manager, $name, $description, $order)
    {
        $groupe = new GroupTrick();
        $groupe->setName($name);
        $groupe->setDescription($description);
        $manager->persist($groupe);
        $this->addReference('groupe' . $order, $groupe);
        $manager->flush();
    }
}
