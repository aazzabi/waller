<?php

namespace AppBundle\Form;

use AppBundle\Entity\Etape;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CandidatureType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('currentEtape', EntityType::class,[
            'label' => 'entity.profile.currentetape',
            'class' => Etape::class
            ])
            ->add('group',EntityType::class,[
                'label' => 'entity.candidat.group',
                'class' => Etape::class
            ])
            ->add('poste',EntityType::class,[
                'label' => 'entity.candidat.poste',
                'class' => Etape::class
            ])
            ->add('profile',EntityType::class,[
                'label' => 'entity.candidat.profile',
                'class' => Etape::class
            ])
            ->add('workflow',EntityType::class,[
                'label' => 'entity.candidat.workflow',
                'class' => Etape::class
            ]) ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Candidature'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_candidature';
    }


}
