<?php

namespace AppBundle\Form;

use AppBundle\Entity\Candidature;
use AppBundle\Entity\Etape;
use AppBundle\Entity\Group;
use AppBundle\Entity\Poste;
use AppBundle\Entity\Profile;
use AppBundle\Entity\Workflow;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
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
            'label' => 'entity.candidat.etapecourante',
                'required' => true,
                'class' => Etape::class
            ])
            ->add('group',EntityType::class,[
                'label' => 'entity.candidat.group',
                'class' => Group::class
            ])
            ->add('poste',EntityType::class,[
                'label' => 'entity.candidat.poste',
                'class' => Poste::class
            ])
            ->add('profile',EntityType::class,[
                'label' => 'entity.candidat.profile',
                'class' => Profile::class
            ])
            ->add('workflow',EntityType::class,[
                'label' => 'entity.candidat.workflow',
                'class' => Workflow::class
            ])
            ->add('commentaire',TextareaType::class,[
                'label' => 'entity.candidat.commentaire',
                'required' => true
            ]);
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Candidature::class,
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
