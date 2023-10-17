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
        $nomCat = ["filDentaire","brossage","bainBouche","nettLangue"];

            foreach($nomCat as $nom){
                $categorie = new Categorie(['nom' => $nom,
                                        'description' => $faker->text()]);

        $manager->persist($categorie);
            }
            
        $manager->flush();
    }
}
