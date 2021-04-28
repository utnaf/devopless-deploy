<?php

namespace App\Form;

use App\Entity\AwesomeCandidate;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AwesomeCandidateType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('twitterHandle', null, [
                'help' => 'Adding your Twitter username will increase the chances to be an awesome person.'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => AwesomeCandidate::class,
        ]);
    }
}
