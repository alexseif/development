<?php

namespace App\Form;

use App\Entity\Item;
use App\Entity\ItemList;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ItemType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('type', ChoiceType::class, [
                'choices' => Item::geTypeChoices(),
                'attr' => ['class' => 'tom-select']
            ])
            ->add('itemList', EntityType::class, [
                'class' => ItemList::class,
                'required' => false,
                'attr' => ['class' => 'tom-select']

            ])
            ->add('name')
            ->add('description')
            ->add('priority', ChoiceType::class, [
                'choices' => Item::getPriorityChoices(),
                'expanded' => true,
                'attr' => ['class' => 'make-form-check-inline'],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Item::class,
        ]);
    }
}
