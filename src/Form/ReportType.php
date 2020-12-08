<?php


namespace App\Form;


use App\Enum\ReportCategory;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

abstract class ReportType extends AbstractType
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
        ;
    }

    public function configureOptions(OptionsResolver $resolver){}
}