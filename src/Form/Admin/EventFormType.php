<?php

namespace App\Form\Admin;

use App\Entity\Event;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\UX\LiveComponent\Form\Type\LiveCollectionType;

class EventFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'required' => true,
            ])
            ->add('type', ChoiceType::class, [
                'required' => true,
                'autocomplete' => true,
                'choices' => [
                    'race' => 'Rennen',
                    'race-series' => 'Rennserie',
                    'practice' => 'Freies Training',
                    'course' => 'Schulung',
                    'training' => 'Trainingscamp',
                    'other' => 'Sonstiges',
                ],
            ])
            ->add('location', TextType::class, [
                'required' => true,
            ])
            ->add('dateStart', DateType::class, [
                'required' => true,
                'widget' => 'single_text',
            ])
            ->add('dateEnd', DateType::class, [
                'required' => true,
                'widget' => 'single_text',
            ])
            ->add('priceVisitor', NumberType::class, [
                'required' => false,
            ])
            ->add('priceRider', NumberType::class, [
                'required' => false,
            ])
            ->add('priceVisitor', NumberType::class, [
                'required' => false,
            ])
            ->add('dateTimeStartVisitor', DateTimeType::class, [
                'required' => false,
                'widget' => 'single_text',
            ])
            ->add('dateTimeArrival', DateTimeType::class, [
                'required' => false,
                'widget' => 'single_text',
            ])
            ->add('dateTimeRidersBreefing', DateTimeType::class, [
                'required' => false,
                'widget' => 'single_text',
            ])
            ->add('dateTimeDeparture', DateTimeType::class, [
                'required' => false,
                'widget' => 'single_text',
            ])
            ->add('classes', TextType::class, [
                'required' => false,
            ])
            ->add('registration', TextType::class, [
                'required' => true,
            ])
            ->add('links', CollectionType::class, [
                'required' => false,
            ])
            ->add('description', TextType::class, [
                'required' => false,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Event::class,
        ]);
    }
}
