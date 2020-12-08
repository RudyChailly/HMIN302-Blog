<?php

namespace App\Form;

use App\Entity\ReportComment;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ReportCommentType extends ReportType
{

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => ReportComment::class,
        ]);
    }
}
