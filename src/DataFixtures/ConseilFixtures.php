<?php

namespace App\DataFixtures;

use Faker;

use App\Entity\Conseil;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ConseilFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create();

        for($i = 0; $i < 10; $i++){
        $conseil = new Conseil(['imageCons' => 'image.png',
                                'titre' => $faker->text(),
                                'contenu' => $faker->text()]);
        
        $manager->persist($conseil);
        }
        
        $manager->flush();
    }
}
