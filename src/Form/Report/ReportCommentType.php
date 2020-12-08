<?php

namespace App\Form\Report;

use App\Entity\Comment;
use App\Entity\ReportComment;
use App\Enum\ReportCategory;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ReportCommentType extends ReportType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('category', ChoiceType::class, [
                'choices' => ReportCategory::getCategories(),
                'choice_label' => function($category) {
                    return $category;
                }
            ])
            ->add('description')
            ->add('target', EntityType::class,[
                'class' => Comment::class,
                'query_builder' => function (EntityRepository $commentRepository) {
                    return $commentRepository->createQueryBuilder('comment');
                },
                'choice_label' => function($comment) {
                    return $comment->getId();
                }
            ])
        ;
    }
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => ReportComment::class,
        ]);
    }
}
