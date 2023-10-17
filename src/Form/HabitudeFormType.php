<?php

namespace App\Form;

use App\Entity\Habitude;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Range;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;

class HabitudeFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('dateBrossage', DateType::class, [
                'data' => new \DateTime(), // Définissez la date par défaut à aujourd'hui
                'format' => 'dd-MM-yyyy', // Format de date à afficher
                'years' => range(date('Y'), date('Y')),//+1), // Années disponibles (par exemple, l'année en cours et l'année suivante)
                'months' => range(date('m'),date('m')), // Mois disponibles (à partir du mois en cours)
                'days' => range(date('d'), date('d')-3)// Jours disponibles (à partir du jour en cours)
            ])
            ->add('nbBrossage', IntegerType::class, [
                'label' => 'nbBrossage',
                'constraints' => [
                    new Range([
                        'min' => 0,
                        'max' => 5,
                        'minMessage' => 'La valeur doit être au moins 0',
                        'maxMessage' => 'La valeur doit être au plus 5',
                    ])
                ]
            ])
            ->add('nettLangue', ChoiceType::class, [
                'label' => 'Nettoyage langue',
                'choices' => [
                    'Oui' => true,
                    'Non' => false,
                ],
                'expanded' => true, // Pour utiliser des boutons radio au lieu de la liste déroulante
                'multiple' => false, // Pour autoriser une seule sélection
            ])
            ->add('filDentaire', ChoiceType::class, [
                'label' => 'Fil dentaire',
                'choices' => [
                    'Oui' => true,
                    'Non' => false,
                ],
                'expanded' => true, // Pour utiliser des boutons radio au lieu de la liste déroulante
                'multiple' => false, // Pour autoriser une seule sélection
            ])
            ->add('bainBouche', ChoiceType::class, [
                'label' => 'Bain de bouche',
                'choices' => [
                    'Oui' => true,
                    'Non' => false,
                ],
                'expanded' => true, // Pour utiliser des boutons radio au lieu de la liste déroulante
                'multiple' => false, // Pour autoriser une seule sélection
            ])
            // ->add('user')
            // ->add('conseils')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Habitude::class,
        ]);
    }
}
