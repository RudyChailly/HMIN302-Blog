<?php

namespace App\Form\User;

use App\Entity\User;
use phpDocumentor\Reflection\Type;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserEditType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username', TextType::class,[
                'label'=>'Pseudo'
            ])
            ->add('email', EmailType::class,[
                'label'=>'Adresse mail'
            ])
            ->add('profile_picture', FileType::class, [
                'label'=>'Photo de profil',
                'attr' => ['placeholder' => "Aucun fichier sélectionné"],
                'mapped' => false,
                'required' => false
            ])
            ->add('cover_picture', FileType::class, [
                'label'=>'Photo de couverture',
                'attr' => ['placeholder' => "Aucun fichier sélectionné"],
                'mapped' => false,
                'required' => false
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
