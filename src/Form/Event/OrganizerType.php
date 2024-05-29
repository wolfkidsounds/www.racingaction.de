<?php

namespace App\Form\Event;

use App\Entity\Event;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class OrganizerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            // Location
            ->add('name', TextType::class, [
                'label' => 'Name of Organizer',
                'required' => true,
            ])

            ->add('email', EmailType::class, [
                'label' => 'E-Mail of Organizer',
                'required' => true,
            ])

            ->add('phone', TelType::class, [
                'label' => 'Tel. of Organizer',
                'required' => false,
            ])

            ->add('website', UrlType::class, [
                'label' => 'Website of Organizer',
                'required' => false,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([]);
    }
}
