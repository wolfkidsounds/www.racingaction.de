<?php

namespace App\Form\Event;

use App\Entity\Event;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LocationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            // Location
            ->add('name', TextType::class, [
                'label' => 'Name',
                'required' => true,
            ])

            ->add('address', TextType::class, [
                'label' => 'Address',
                'required' => true,
            ])

            ->add('url', UrlType::class, [
                'label' => 'Link',
                'required' => false,
            ])

            ->add('description', TextareaType::class, [
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
