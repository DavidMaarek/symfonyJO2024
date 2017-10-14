<?php

namespace DavidBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AthleteType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'athlete.label.name'
            ])
            ->add('firstName', TextType::class, [
                'label' => 'athlete.label.firstName'
            ])
            ->add('birthDate', DateType::class, [
                'label' => 'athlete.label.birthDate',
                'years' => range(2017,1950),
                'placeholder' => [
                    'day' => 'generic.form.birthDate.day',
                    'month' => 'generic.form.birthDate.month',
                    'year' => 'generic.form.birthDate.year',
                ]
            ])
            ->add('picture', FileType::class, [
                'label' => 'athlete.label.picture',
                'data_class' => null
            ])
            ->add('country', EntityType::class, [
                'label' => 'athlete.label.country',
                'class' => 'DavidBundle:Country',
                'choice_label' => 'name',
                'placeholder'  => 'athlete.placeholder.country'
            ])
            ->add('discipline', EntityType::class, [
                'label' => 'athlete.label.discipline',
                'class' => 'DavidBundle:Discipline',
                'choice_label' => 'name',
                'placeholder'  => 'athlete.placeholder.discipline'
            ]);
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'DavidBundle\Entity\Athlete'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'davidbundle_athlete';
    }


}
