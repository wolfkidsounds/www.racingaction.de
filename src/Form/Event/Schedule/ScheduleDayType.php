<?php

namespace App\Form\Event\Schedule;

use App\Entity\Event;
use Symfony\Component\Form\AbstractType;
use App\Form\Event\Schedule\ScheduleDayTimeSlotType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\UX\LiveComponent\Form\Type\LiveCollectionType;

class ScheduleDayType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            // Day
            ->add('name', TextType::class, [
                'label' => 'Event Name',
                'required' => true,
            ])

            ->add('slot', LiveCollectionType::class, [
                'entry_type' => ScheduleDayTimeSlotType::class,
                'allow_add' => true,
                'allow_delete' => true,
                'delete_empty' => true,
                'by_reference' => false,
                'required' => true,
            ])            
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([]);
    }
}
