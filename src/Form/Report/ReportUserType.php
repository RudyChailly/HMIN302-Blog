<?php

namespace App\Form\Report;

use App\Entity\ReportUser;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ReportUserType extends ReportType
{


    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => ReportUser::class,
        ]);
    }
}
