<?php

namespace App\DataFixtures;

use App\Entity\Gender;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class GenderFixtures extends Fixture
{
    const GENDER = [
        "Adulte Homme",
        "Adulte Femme",
        "Adulte Femme",
        "Enfant Garçon",
        "Enfant Fille",
        "Enfant Mixte",
    ];

    public function load(ObjectManager $manager)
    {
        $i = 0;
        foreach (self::GENDER as $value) {
            $gender = new Gender();
            $gender ->setName($value);
            $manager ->persist($gender);

            $this ->addReference('gender_'.$i, $gender);
            $i++;
            }
        $manager->flush();
    }
}
