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
            ->add('name', TextType::class)
            ->add('type', ChoiceType::class, [
                'choices' => [
                    'race' => 'Rennen',
                    'race-series' => 'Rennserie',
                    'practice' => 'Freies Training',
                    'course' => 'Schulung',
                    'training' => 'Trainingscamp',
                    'other' => 'Sonstiges',
                ],
            ])
            ->add('location', TextType::class)
            ->add('dateStart', DateType::class, [
                'widget' => 'single_text',
            ])
            ->add('dateEnd', DateType::class, [
                'widget' => 'single_text',
            ])
            ->add('priceVisitor', NumberType::class)
            ->add('priceRider', NumberType::class)
            ->add('priceVisitor', NumberType::class)
            ->add('dateTimeStartVisitor', DateTimeType::class, [
                'widget' => 'single_text',
            ])
            ->add('dateTimeArrival', DateTimeType::class, [
                'widget' => 'single_text',
            ])
            ->add('dateTimeRidersBreefing', DateTimeType::class, [
                'widget' => 'single_text',
            ])
            ->add('dateTimeDeparture', DateTimeType::class, [
                'widget' => 'single_text',
            ])
            ->add('classes', TextType::class)
            ->add('registration', TextType::class)
            ->add('links', CollectionType::class)
            ->add('description', TextType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Event::class,
        ]);
    }
}
