<?php

namespace App\DataFixtures;

use App\Entity\Article;
use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;


class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // CATEGORY
        $categories = [];
        for ($i = 0; $i < 5; $i++) {
            $category = new Category("Catégorie ".$i);
            array_push($categories, $category);
            $manager->persist($category);
        }

        // ARTICLE
       /* for ($i = 0; $i < 20; $i++) {
            $article = new Article();
            $article->setTitle('article '.$i);
            $article->setUrlAlias('url-alias-'.$i);
            $article->setContent('Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
            Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, 
            when an unknown printer took a galley of type and scrambled it to make a type specimen book. 
            It has survived not only five centuries, but also the leap into electronic typesetting, 
            remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets 
            containing Lorem Ipsum passages, and more recently with desktop publishing 
            software like Aldus PageMaker including versions of Lorem Ipsum.');
            $article->setPublished(new \DateTime('NOW'));
            $article->setCategory($categories[$i%5]);
            $manager->persist($article);
        }*/

        $manager->flush();
    }
}
