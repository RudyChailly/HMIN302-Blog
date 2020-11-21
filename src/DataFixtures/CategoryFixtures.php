<?php


namespace App\DataFixtures;


use App\Entity\Article;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Category;

class CategoryFixtures extends \Doctrine\Bundle\FixturesBundle\Fixture
{

    /**
     * @inheritDoc
     */
    public function load(ObjectManager $manager)
    {

        for ($i = 0; $i < 5; $i++) {
            $category = new Category("Catégorie ".$i);
            $manager->persist($category);
        }
        $manager->flush();
    }
}