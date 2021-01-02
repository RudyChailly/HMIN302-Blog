<?php


namespace App\DataFixtures;


use App\Entity\Category;
use Doctrine\Persistence\ObjectManager;

class CategoryFixture extends \Doctrine\Bundle\FixturesBundle\Fixture
{

    public function load(ObjectManager $manager)
    {
        $categories = ["Jeux Vidéo", "Cinéma", "Littérature", "High Tech", "Musique"];
        foreach ($categories as $category) {
            $manager->persist(new Category($category));
        }

        $manager->flush();
    }
}