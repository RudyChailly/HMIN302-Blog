<?php

namespace App\Form\Report;

use App\Entity\ReportArticle;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ReportArticleType extends ReportType
{

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => ReportArticle::class,
        ]);
    }
}
