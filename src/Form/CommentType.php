<?php

namespace App\Form;

use App\Entity\Comment;
use App\Entity\Post;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CommentType extends AbstractType
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
            ->add('content', TextareaType::class, [
                "label" => "Contenu",
                "attr" => [
                    "placeholder" => "Ecrire votre commentaire"
                ]
            ])
            ->add('post', EntityType::class, [
                'class' => Post::class,
                'choice_label' => 'id',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Comment::class,
        ]);
    }
}
