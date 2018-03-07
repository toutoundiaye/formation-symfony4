<?php

namespace App\Form;

use App\Entity\Job;
use App\Entity\Worker;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class WorkerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('lastName')
            ->add('firstName')
            ->add('job', EntityType::class, [
                'class' => Job::class,
                'choice_label' => 'title'
            ])
            ->add('workingTime')
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
