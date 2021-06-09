<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
{
      $this->passwordEncoder = $passwordEncoder;
   }

    public function load(ObjectManager $manager)
    {
         // Création d’un utilisateur de type “administrateur”
         $admin = new User();
         $admin->setFirstname('SuperWild');
         $admin->setLastname('Admin');
         $admin->setEmail('admin@bizi.com');
         $admin->setRoles(['ROLE_ADMIN']);
         $admin->setPassword($this->passwordEncoder->encodePassword(
             $admin,
             'adminpassword'
         ));
         $manager->persist($admin);

           // Création d’un utilisateur de type "user"
           $user1 = new User();
           $user1->setFirstname('Marcel');
           $user1->setLastname('User');
           $user1->setEmail('user1@bizi.com');
           $user1->setRoles(['ROLE_USER']);
           $user1->setPassword($this->passwordEncoder->encodePassword(
               $user1,
               'user1password'
           ));
           $manager->persist($user1);

             // Création d’un utilisateur de type "user"
             $user2 = new User();
             $user2->setFirstname('Marcel');
             $user2->setLastname('User');
             $user2->setEmail('user2@bizi.com');
             $user2->setRoles(['ROLE_USER']);
             $user2->setPassword($this->passwordEncoder->encodePassword(
                 $user2,
                 'user2password'
             ));
             $manager->persist($user2);
 
         // Sauvegarde des nouveaux utilisateurs :
         $manager->flush();
    }
}
