<?php

namespace App\DataFixtures;

use App\Entity\Conseil;
use App\Entity\Habitude;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ConseilHabitudeFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        // 1. Obtenir les habitudes
        $repHabitudes = $manager->getRepository(Habitude::class);
        $arrayObjHabitudes = $repHabitudes->findAll();

        // 2. Obtenir les conseils
        $repConseils = $manager->getRepository(Conseil::class);
        $arrayObjConseils = $repConseils->findAll();

        // 3. Parcourir les habitudes. Pour chaque Habitude, rajouter (add) un Conseil aléatoire
        foreach ($arrayObjHabitudes as $habitude) {
            $randomIndex = array_rand($arrayObjConseils); // l'index d'un conseil, random
            $habitude->addConseil($arrayObjConseils[$randomIndex]); 
            $manager->persist($habitude);
        }
        $manager->flush();
        }

        // fixer les dépéndances de cette fixture
        public function getDependencies(): array
        {
        return [
            ConseilFixtures::class,
            HabitudeFixtures::class
        ];
    }
}
