<?php

namespace App\Form;

use App\Entity\Personen;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class PersonenType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('vorname', TextType::class, [
                'attr' => ['class' => 'form-control']
            ])
            ->add('nachname', TextType::class, [
                'attr' => ['class' => 'form-control']
            ])
            ->add('strasse', TextType::class, [
                'attr' => ['class' => 'form-control']
            ])
            ->add('hausnummer', TextType::class, [
                'attr' => ['class' => 'form-control']
            ])
            ->add('plz', IntegerType::class, [
                'attr' => ['class' => 'form-control']
            ])
            ->add('ort', TextType::class, [
                'attr' => ['class' => 'form-control']
            ])
            ->add('team', TextType::class, [
                'attr' => ['class' => 'form-control']
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Personen::class,
        ]);
    }
}
