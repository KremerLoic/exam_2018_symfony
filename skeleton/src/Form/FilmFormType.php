<?php

namespace App\Form;

use App\Entity\Acteur;
use App\Entity\Affiche;
use App\Entity\Film;
use App\Entity\Genre;
use Doctrine\ORM\Mapping\Entity;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FilmFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titre',TextType::class)
            ->add('resume',TextType::class)
            ->add('date_sortie',DateType::class)
            ->add('production',TextType::class)
            ->add('realisateur',TextType::class)
            ->add('genre',EntityType::class, array(
                'label'=>'Genre',
                'class'=>Genre::class
            ))
            ->add('acteur',EntityType::class,array(
                'label'=>'Acteur',
                'class'=>Acteur::class,
                'multiple'=>true
            ))
            ->add('affiche',EntityType::class,array(
                'label'=>'Affiche',
                'class'=>Affiche::class


            ))
            ->add('save',SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Film::class,
        ]);
    }
}
