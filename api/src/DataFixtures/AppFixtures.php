<?php

namespace App\DataFixtures;

use App\Entity\Articles;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create();
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
                ->setLink($faker->url);
            $manager->persist($article);

            $manager->flush();
        }
    }
}
