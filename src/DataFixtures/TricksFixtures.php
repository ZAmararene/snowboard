<?php

namespace App\DataFixtures;

use App\Entity\User;
use App\Entity\Trick;
use App\Entity\Video;
use App\Entity\Comment;
use App\Entity\Picture;
use App\Entity\GroupTrick;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class TricksFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = \Faker\Factory::create('fr_FR');

        //Créer trois groupes de figures
        for ($i = 1; $i <= 3; $i++) {

            $groupe = new GroupTrick();

            $groupe->setName($faker->sentence());
            $groupe->setDescription($faker->paragraph());;

            $manager->persist($groupe);

            $user = new User();

            $user->setLastName($faker->lastName());
            $user->setFirstName($faker->firstName());
            $user->setPseudo($faker->lastName());
            $user->setEmail($faker->email());
            $user->setPassword($faker->sentence());
            $user->setResetPassword($faker->sentence());
            $user->setRole("user");
            $user->setDateConnection($faker->dateTimeBetween('-8 months'));

            $manager->persist($user);

            // Pour chaque groupe on va créer entre 4 et 6 figures (tricks)
            for ($j = 1; $j <= mt_rand(4, 20); $j++) {
                $trick = new Trick();
                $content = implode(' ', $faker->paragraphs(8));
                $trick->setGroupe($groupe);
                $trick->setUser($user);
                $trick->setName($faker->sentence());
                $trick->setContent($content);
                $trick->setDateAdded($faker->dateTimeBetween('-6 months'));
                $trick->setdateModification(new \DateTime());

                $manager->persist($trick);

                for ($k = 1; $k < mt_rand(4, 25); ++$k) {
                    $comment = new Comment();

                    // le trick à été mis entre la date de création et maintenant
                    $now = new \DateTime();
                    $interval = $now->diff($trick->getDateAdded()); // difference entre le 2 dates maintenant et date création du trick
                    $days = $interval->days; // donne le nombre de jours
                    $minimum = '-' . $days . 'days'; // pour l'adapter a Faker

                    $content = $content = implode(' ', $faker->paragraphs(5));
                    $comment->setPseudo($faker->lastName());
                    $comment->setContent($content);
                    $comment->setAvatar($faker->imageUrl(50, 50, 'sports'));
                    $comment->setDateAdded($faker->dateTimeBetween($minimum));
                    $comment->setTrick($trick); // Le commentaire appartient à cette figure

                    $manager->persist($comment);

                    $picture = new Picture();

                    $picture->setName($faker->sentence());
                    $picture->setImageSize(mt_rand(10000, 20000));
                    $picture->setImageType($faker->imageUrl(350, 200));
                    $picture->setTrick($trick);

                    $manager->persist($picture);

                    $video = new Video();

                    $video->setName($faker->sentence());
                    $video->setVideoSize(mt_rand(10000, 20000));
                    $video->setVideoType('avi');
                    $video->setVideoLink($faker->imageUrl(350, 200));
                    $video->setTrick($trick);

                    $manager->persist($video);
                }
            }
        }

        $manager->flush();
    }
}
