<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CategoryFixtures extends Fixture
{
    const CATEGORIES = [
        "Vélo de ville",
        "Vélo tout chemin",
        "Vélo tout terrain",
        "Vélo de Course",
    ];

    public function load(ObjectManager $manager)
    {
        $i = 0;
        foreach (self::CATEGORIES as $value) {
            $category = new Category();
            $category->setName($value);
            $manager->persist($category);

            $this->addReference('category_' . $i, $category);
            $i++;
        }
        $manager->flush();
    }
}
