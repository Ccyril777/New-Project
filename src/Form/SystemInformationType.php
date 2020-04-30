<?php

namespace App\Form;

use App\Entity\SystemInformation;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SystemInformationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('usualInformationName')
            ->add('siiName')
            ->add('description')
            ->add('confidentialite', null, ['choice_label' => 'confidentialiteName'])
            ->add('domain', null, ['choice_label' => 'domaineName'])
            ->add('type', null, ['choice_label' => 'shortName'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => SystemInformation::class,
        ]);
    }
}
