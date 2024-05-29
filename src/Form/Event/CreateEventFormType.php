<?php

namespace App\Form\Event;

use DateTime;
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
                'empty_data' => '',
                'required' => true,
            ])

            ->add('type', ChoiceType::class, [
                'label' => 'Event Type',
                'empty_data' => 'Select Type',
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
                'empty_data' => '',
                'required' => false,
            ])

            // Date & Time
            ->add('dateStart', DateType::class, [
                'label' => 'Event Begin',
                'empty_data' => new DateTime('now'),
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
                'empty_data' => false,
                'required' => false,
            ])

            // Schedule
            ->add('schedule', CollectionType::class, [
                'entry_type' => ScheduleDayType::class,
                'label' => false,
                'allow_add' => true,
                'allow_delete' => true,
                'delete_empty' => true,
                'by_reference' => false,
                'required' => false,
            ])

            // Location
            ->add('location', CollectionType::class, [
                'entry_type' => LocationType::class,
                'label' => false,
                'allow_add' => false,
                'allow_delete' => false,
                'delete_empty' => true,
                'by_reference' => false,
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
            ->add('organizers', CollectionType::class, [
                'entry_type' => OrganizerType::class,
                'allow_add' => true,
                'allow_delete' => true,
                'delete_empty' => true,
                'by_reference' => false,
                'required' => false,
            ])

            ->add('websites', LiveCollectionType::class, [
                'entry_type' => LinkType::class,
                'allow_add' => true,
                'allow_delete' => true,
                'delete_empty' => true,
                'by_reference' => false,
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
