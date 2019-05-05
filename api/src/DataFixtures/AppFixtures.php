<?php

namespace App\DataFixtures;

use App\Entity\Articles;
use App\Entity\Project;
use App\Entity\Users;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;
use Symfony\Component\Security\Core\Encoder\PasswordEncoderInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{    private $passwordEncoder;
    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {
        $faker = Factory::create();
        $user = new Users();
        $user->setEmail("localhost@localhost.fr")
            ->setPassword($this->passwordEncoder->encodePassword($user, "admin"));
        $manager->persist($user);

        $project = new Project();
        $project->setName($faker->firstName);
        $manager->persist($project);
        for ($i = 0; $i < mt_rand(50, 70); $i++) {
            $article = new Articles();
            $article->setTitle(implode(" ", $faker->sentences))
                ->setAuthor($faker->name)
                ->setDescription(implode(' ', $faker->paragraphs))
                ->setThumbnail($faker->imageUrl())
                ->setRevue($faker->company)
                ->setDate($faker->dateTime($max = 'now', $timezone = null))
                ->setlanguage($faker->country)
                ->setType($faker->word)
                ->setProject($project)
                ->setLink($faker->url);
            $manager->persist($article);

            $manager->flush();
        }
    }
}
