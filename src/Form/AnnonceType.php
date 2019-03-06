<?php

namespace App\Form;

use App\Entity\Ad;
use App\Form\ImageType;
use App\Form\ApplicationType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

class AnnonceType extends ApplicationType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(
                'title',
                TextType::class,
                $this->getConfiguration('Titre', 'Tapez le titre de l\'annonce')
            )
            ->add(
                'slug',
                TextType::class,
                $this->getConfiguration('Adresse web', 'Tapez l\'adresse web (automatique)', ['required' => false])
            )
            ->add(
                'coverImage',
                UrlType::class,
                $this->getConfiguration('URL de l\'image principale', 'Adresse de l\'image')
            )
            ->add(
                'introduction',
                TextType::class,
                $this->getConfiguration('Introduction', 'Donnez une description globale de l\'annonce')
            )
            ->add(
                'content',
                TextareaType::class,
                $this->getConfiguration('Description détaillée', 'Donnez une description attractive de chez vous !')
            )
            ->add(
                'rooms',
                IntegerType::class,
                $this->getConfiguration('Nombre de chambre', 'Nombre de chambre(s) disponible(s)')
            )
            ->add(
                'price',
                MoneyType::class,
                $this->getConfiguration('Prix par nuit', 'Indiquez le prix d\'une nuit')
            )
            ->add(
                'images',
                CollectionType::class,
                [
                    'entry_type' => ImageType::class,
                    'allow_add' => true,
                    'allow_delete' => true
                ]
            );
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Ad::class,
        ]);
    }
}
