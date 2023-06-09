<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\File;

class BienPhotoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom')
            ->add('prix', NumberType::class)
            ->add('superficie', NumberType::class)
            ->add('rue')
            ->add('numero', NumberType::class)
            ->add('code')
            ->add('ville')
            ->add('description', TextareaType::class)
            ->add('type', ChoiceType::class, [
                'choices' => [
                    'Chambres' => 0,
                    'Studios' => 1,
                    'Appartements' => 3,
                    'Maisons'=> 4
                ]
            ])
            ->add('photo', FileType::class, [
                'required' => false,
                'multiple' => true,
                'constraints' => [
                    new File([
                        'maxSize' => '3072k',
                        'mimeTypes' => [
                            'image/*'
                        ],
                        'mimeTypesMessage' => 'SVP choisissez une image valide (moins de 3Mo)'
                    ])
                ],
            ])
            ->add('valider', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
