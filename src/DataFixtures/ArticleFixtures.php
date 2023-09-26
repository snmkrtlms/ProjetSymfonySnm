<?php

namespace App\DataFixtures;

use Faker;

use App\Entity\Article;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ArticleFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create();

        for($i = 0; $i < 10; $i++){
        $article = new Article(['imageArt' => 'image.png',
                                'titre' => $faker->text(),
                                'contenu' => $faker->text()]);
        
        $manager->persist($article);
        }
        
        $manager->flush();
    }
}
