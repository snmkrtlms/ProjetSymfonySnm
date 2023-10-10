<?php

namespace App\DataFixtures;

use Faker;

use App\Entity\Categorie;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CategorieFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create();

        for($i = 0; $i < 10; $i++){
        $categorie = new Categorie(['nom' => "cat" . $i,
                                'description' => $faker->text()]);
        
        $manager->persist($categorie);
        }
        
        $manager->flush();
    }
}
