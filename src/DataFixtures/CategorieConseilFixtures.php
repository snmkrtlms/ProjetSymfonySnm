<?php

namespace App\DataFixtures;

use Faker;

use App\Entity\Conseil;
use App\Entity\Categorie;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class CategorieConseilFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {

        $rep = $manager->getRepository(Categorie::class);
        $categories = $rep->findAll();

        $rep = $manager->getRepository(Conseil::class);
        $conseils = $rep->findAll();


        foreach ($conseils as $conseil) {
            $categorie = $categories[array_rand($categories)]; 
            $conseil->setCategorie($categorie); 
        }
        $manager->flush();
        

    }

    public function getDependencies()
    {
        return (
            [ConseilFixtures::class,
            CategorieFixtures::class]
        );
    }
}
