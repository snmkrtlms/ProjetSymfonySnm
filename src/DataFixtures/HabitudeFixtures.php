<?php

namespace App\DataFixtures;

use Faker;

use App\Entity\User;
use App\Entity\Habitude;

use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class HabitudeFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {   
        $faker = Faker\Factory::create();

        $repUsers = $manager->getRepository(User::class);
        $arrayUsers = $repUsers->findAll();
        
        for($i = 0; $i < 10; $i++){
            $habitude = new Habitude(['dateBrossage' => $faker->dateTimeBetween('-1week','1 week'),
                                    'nbBrossage' => rand(0,5),
                                    'nettLangue' => $faker->boolean(),
                                    'filDentaire' => $faker->boolean(),
                                    'bainBouche' => $faker->boolean()]);
            
            //fixer le User (1seul) à l'habitude
            $randomUser = $arrayUsers[array_rand($arrayUsers)];
            $habitude->setUser($randomUser);
            // dd($habitude);
            $manager->persist($habitude);
        }
    $manager->flush();
    }

    // fixer les dépéndances de cette fixture
    public function getDependencies(): array
    {
    return [
        UserFixtures::class,
    ];
    }
}