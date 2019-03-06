<?php

namespace App\Form;

use App\Entity\User;
use App\Form\ApplicationType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class RegistrationType extends ApplicationType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(
                'firstName', 
                TextType::class, 
                $this->getConfiguration("Prénom", "Votre prénom ...", ['required' => true])
                )
            ->add(
                'lastName', 
                TextType::class, 
                $this->getConfiguration("Nom", "Votre nom ...", ['required' => true])
            )
            ->add(
                'email', 
                EmailType::class, 
                $this->getConfiguration("Email", "Votre adresse email", ['required' => true])
            )
            ->add(
                'picture', 
                UrlType::class, 
                $this->getConfiguration("Photo de profil", "URL de votre avatar", ['required' => true])
            )
            ->add(
                'hash', 
                PasswordType::class, 
                $this->getConfiguration("Mot de passe", "Choisissez un mot de passe", ['required' => true])
            )
            ->add(
                'passwordConfirm',
                PasswordType::class,
                $this->getConfiguration("Confirmation du mot de passe", "Veuillez confirmer votre mot de passe", ['required' => true])
            )
            ->add(
                'introduction', 
                TextType::class, 
                $this->getConfiguration("Introduction", "Présentez-vous en quelques mots", ['required' => true])
            )
            ->add(
                'description', 
                TextareaType::class, 
                $this->getConfiguration("Description détaillée", "C'est le moment de vous présenter en détails !", ['required' => true])
            )
        ;   
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
