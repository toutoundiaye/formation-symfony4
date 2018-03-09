<?php

namespace App\Form;

use App\Entity\Job;
use App\Entity\Worker;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Security\Core\Authorization\AuthorizationChecker;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;

class WorkerType extends AbstractType
{
    /**
     * @var AuthorizationCheckerInterface
     */
    private $checker;

    /**
     * WorkerType constructor.
     * @param AuthorizationCheckerInterface $checker
     */
    public function __construct(AuthorizationCheckerInterface $checker)
    {
        $this->checker = $checker;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $isAdmin = $this->checker->isGranted('ROLE_ADMIN');

        $builder
            ->add('lastName')
            ->add('firstName')
            ->add('job', EntityType::class, [
                'class' => Job::class,
                'choice_label' => 'title',
                'disabled' => !$isAdmin
            ])
            ->add('workingTime', null,
                [
                    'disabled' => !$isAdmin
                ])
            ->add('startDate', null, [
                'widget' => 'single_text',
                'disabled' => !$isAdmin
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
