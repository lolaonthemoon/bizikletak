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
           $user = new User();
           $user->setFirstname('SuperWild');
           $user->setLastname('User');
           $user->setEmail('user@bizi.com');
           $user->setRoles(['ROLE_USER']);
           $user->setPassword($this->passwordEncoder->encodePassword(
               $user,
               'userpassword'
           ));
           $manager->persist($user);
 
         // Sauvegarde des nouveaux utilisateurs :
         $manager->flush();
    }
}
