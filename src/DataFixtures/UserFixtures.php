<?php

namespace App\DataFixtures;

use Faker;

use App\Entity\User;

use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{
    private $passwordHasher;

    public function __construct(UserPasswordHasherInterface $passwordHasher){
        $this->passwordHasher = $passwordHasher;
    }

    
    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create();

        for($i = 0; $i < 10; $i++){
            $user = new User (['nom' => $faker->lastName,
                            'prenom' =>$faker->firstName,
                            'email' => 'user' . $i .'@gmail.com',
                            'dateNaissance' => $faker->dateTimeBetween('-70 years','-16 years'),
                            'roles' => []]);

            //fixer un password sans hasher
            $passwordSansHash = "password";

            //obtenir le password hashé
            $passwordHash = $this->passwordHasher->hashPassword($user,$passwordSansHash);

            //incruster dans l'entité password hashé
            $user->setPassword($passwordHash);

            $manager->persist($user);
        }
        $manager->flush();
    }
}
