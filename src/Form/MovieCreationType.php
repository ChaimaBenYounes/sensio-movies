<?php

namespace App\Form;

use App\Entity\{Movie, Person};
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use App\Form\PersonCreationType;

class MovieCreationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
            ->add('title')
            ->add('dateAt')
            ->add('producer', EntityType::class, [
                'class' => Person::class,
                'choices' => (new Movie)->getProducer(),
                'choice_label' => function (Person $person) {
                    return $person->getFirstName()." ".$person->getLastName();
                }
            ])

            ->add('actors', EntityType::class, [
                'class' => Person::class,
                'choice_label' => function (Person $person) {
                    return $person->getFirstName();
                },
                'multiple' => true,
                'expanded' => true,
            ])
          

            
            
            ->add('save', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Movie::class,
        ]);
    }
}
