<?php

namespace App\Form\Event\Schedule;

use App\Entity\Event;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ScheduleDayTimeSlotType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            // Slot
            ->add('slotBegin', TextType::class, [
                'label' => 'From',
                'required' => true,
            ])

            ->add('slotEnd', TextType::class, [
                'label' => 'To',
                'required' => true,
            ])

            ->add('slotTitle', TextType::class, [
                'label' => 'Title',
                'required' => true,
            ])
            
            ->add('slotEnd', TextType::class, [
                'label' => 'Description',
                'required' => false,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([]);
    }
}
