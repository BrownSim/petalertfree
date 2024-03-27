<?php

namespace App\Form\Type;

use App\Entity\Animal;
use App\Entity\Breed;
use App\Entity\City;
use App\Entity\Department;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use App\Entity\AnimalType as AnimalEntityType;

class AnimalType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('animalType', EntityType::class, [
                'class' => AnimalEntityType::class,
                'choice_label' => 'label',
            ])
            ->add('breed', EntityType::class, [
                'class' => Breed::class,
                'choice_label' => 'label',
            ])
            ->add('department', EntityType::class, [
                'class' => Department::class,
                'choice_label' => 'label',
            ])
            ->add('city', EntityType::class, [
                'class' => City::class,
                'choice_label' => 'label',
            ])
            ->add('name', TextType::class)
            ->add('pictures', CollectionType::class, [
                'entry_type' => AnimalPictureType::class,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Animal::class
        ]);
    }
}
