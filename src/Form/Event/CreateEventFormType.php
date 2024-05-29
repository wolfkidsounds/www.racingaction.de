<?php

namespace App\Form\Event;

use App\Entity\Event;
use App\Enum\Event\Status;
use App\Form\Event\LinkType;
use App\Enum\Event\Visibility;
use App\Form\Event\LocationType;
use App\Form\Event\OrganizerType;
use Symfony\Component\Form\AbstractType;
use App\Form\Event\Schedule\ScheduleDayType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EnumType;
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
                //'autocomplete' => true,
                'choices' => [
                    'Rennen' => 'race',
                    'Rennserie' => 'series',
                    'Freies Training' => 'training',
                    'Schulung' => 'course',
                    'Trainingscamp' => 'trainingscamp',
                    'Sonstiges' => 'other'
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
            ->add('schedule', LiveCollectionType::class, [
                'entry_type' => ScheduleDayType::class,
                'required' => false,
            ])

            // Location
            ->add('location', LiveCollectionType::class, [
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

            ->add('riderRegistration', TextareaType::class, [
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
            ->add('organizers', LiveCollectionType::class, [
                'entry_type' => OrganizerType::class,
                'required' => true,
            ])

            ->add('websites', LiveCollectionType::class, [
                'entry_type' => LinkType::class,
                'required' => false,
            ])
            
            // Status
            ->add('visibility', EnumType::class, [
                'class' => Visibility::class,
                'required' => true,
            ])

            ->add('status', EnumType::class, [
                'class' => Status::class,
                'required' => true,
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
