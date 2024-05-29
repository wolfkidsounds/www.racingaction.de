<?php

namespace App\Form\Event;

use App\Entity\Event;
use App\Form\Event\LocationType;
use Symfony\Component\Form\AbstractType;
use App\Form\Event\Schedule\ScheduleDayType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\UX\LiveComponent\Form\Type\LiveCollectionType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

class CreateEventFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            // General
            ->add('name', TextType::class, [
                'label' => 'Event Name',
                'required' => true,
            ])

            ->add('type', ChoiceType::class, [
                'label' => 'Event Type',
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

            ->add('description', TextareaType::class, [
                'label' => 'Event Description',
                'required' => false,
            ])

            // Date & Time
            ->add('dateStart', DateType::class, [
                'label' => 'Event Begin',
                'required' => true,
                'widget' => 'single_text',
            ])

            ->add('dateEnd', DateType::class, [
                'label' => 'Event End',
                'required' => true,
                'widget' => 'single_text',
            ])

            ->add('isAllDay', CheckboxType::class, [
                'label' => 'All Day Event?',
                'required' => false,
            ])

            // Schedule
            ->add('schedule', CollectionType::class, [
                'entry_type' => ScheduleDayType::class,
                'required' => false,
            ])

            // Location
            ->add('location', CollectionType::class, [
                'entry_type' => LocationType::class,
                'required' => false,
            ])

            // Visitor
            ->add('visitorPrice', NumberType::class, [
                'required' => false,
            ])
            ->add('visitorStart', NumberType::class, [
                'required' => false,
            ])

            // Rider
            ->add('riderClasses', TextType::class, [
                'required' => false,
            ])
            
            ->add('riderPrice', NumberType::class, [
                'required' => false,
            ])

            ->add('riderStart', DateTimeType::class, [
                'required' => false,
                'widget' => 'single_text',
            ])

            ->add('riderBreefing', DateTimeType::class, [
                'required' => false,
                'widget' => 'single_text',
            ])

            ->add('riderEnd', DateTimeType::class, [
                'required' => false,
                'widget' => 'single_text',
            ])

            // Contact
            ->add('dateTimeDeparture', DateTimeType::class, [
                'required' => false,
                'widget' => 'single_text',
            ])
            ->add('registration', TextType::class, [
                'required' => true,
            ])
            ->add('links', CollectionType::class, [
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
