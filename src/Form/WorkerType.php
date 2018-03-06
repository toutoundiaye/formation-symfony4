<?php

namespace App\Form;

use App\Entity\Worker;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class WorkerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('lastName')
            ->add('firstName')
            ->add('jobTitle', ChoiceType::class,[
                'choices' => ['dev', 'trainee', 'cook'],
                'choice_label' => function($value, $key, $index) {
                    return "worker.field.jobTitleChoices.$value";
                }
            ])
            ->add('workingTime')
            ->add('wage')
            ->add('startDate', null, [
                'widget' => 'single_text'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // uncomment if you want to bind to a class
            'data_class' => Worker::class,
            'label_format' => 'worker.%name%',
            'translation_domain' => 'worker',
        ]);
    }
}
