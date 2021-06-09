<?php

namespace App\Form;

use App\Entity\Bike;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BikeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('picture')
            ->add('details')
            ->add('size')
            ->add('recommandation')
            ->add('minSize')
            ->add('maxsize')
            ->add('creationDate')
            ->add('price')
            ->add('isSold')
            ->add('soldDate')
            ->add('category', null, ['choice_label' => 'name'])
            ->add('propulsion', null, ['choice_label' => 'name'])
            ->add('gender', null, ['choice_label' => 'name'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Bike::class,
        ]);
    }
}
