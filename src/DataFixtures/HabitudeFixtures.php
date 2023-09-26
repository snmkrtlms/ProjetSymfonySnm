<?php

namespace App\DataFixtures;

use App\Entity\Habitude;
use Faker;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class HabitudeFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create();

        for($i = 0; $i < 10; $i++){
        $habitude = new Habitude(['dateBrossage' => $faker->dateTimeBetween('-1week','1 week'),
                                    'nbBrossage' => rand(0,5),
                                    'nettLangue' => $faker->boolean(),
                                    'filDentaire' => $faker->boolean(),
                                    'bainBouche' => $faker->boolean()]);
        
        $manager->persist($habitude);
        }

        $manager->flush();
    }
}
