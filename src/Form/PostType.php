<?php

namespace App\Form;

use App\Entity\Post;
use App\Entity\Type;
use Doctrine\DBAL\Types\StringType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PostType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                "label" => "Pseudo",
                "attr" => [
                    "placeholder" => "Ecrire votre pseudo"
                ]
            ])
            ->add('title', TextType::class, [
                "label" => "Titre",
                "attr" => [
                    "placeholder" => "Ecrire le titre"
                ]
            ])
            ->add('content', TextareaType::class, [
                "label" => "Contenu",
                "attr" => [
                    "placeholder" => "Ecrire votre article"
                ]
            ])
            ->add('type', EntityType::class, [
                'class' => Type::class,
                'choice_label' => 'id',
            ])
            ->add('img', FileType::class, [
                'label' => 'illustration',
                'mapped' => false
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Post::class,
        ]);
    }
}
