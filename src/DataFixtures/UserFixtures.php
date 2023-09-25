<?php

namespace App\DataFixtures;

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
        $user = new User (['email' => 'test@gmail.com',
                            'roles' => []]);

        //fixer un password sans hasher
        $passwordSansHash = "password";

        //obtenir le password hashé
        $passwordHash = $this->passwordHasher->hashPassword($user,$passwordSansHash);

        //incruster dans l'entité password hashé
        $user->setPassword($passwordHash);

        $manager->persist($user);

        $manager->flush();
    }
}
