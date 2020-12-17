<?php

namespace App\Form;

use App\Entity\Article;
use App\Entity\Category;
use App\Entity\Repository\CategoryRepository;
use Doctrine\ORM\EntityRepository;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ArticleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class, [
                'label'=>'Titre'
            ])
            ->add('content', CKEditorType::class, [
                'label'=>'Contenu'
            ])
            ->add('category', EntityType::class, [
                'label'=>'Catégorie',
                'class' => Category::class,
                'query_builder' => function (EntityRepository $categoryRepository) {
                    return $categoryRepository->createQueryBuilder('category')->orderBy('category.name', 'ASC');
                },
                'choice_label' => function($category) {
                    return $category->getName();
                }
            ])
            ->add('thumbnail', FileType::class, [
                'label' => 'Miniature',
                'mapped' => false,
                'attr' => ['placeholder' => "Aucun fichier sélectionné"],
                'required' => false
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Article::class,
        ]);
    }
}
