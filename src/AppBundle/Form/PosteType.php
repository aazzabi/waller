<?php

namespace AppBundle\Form;

use AppBundle\Entity\Group;
use AppBundle\Entity\Poste;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PosteType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('libelle', TextType::class, array(
            'label' => 'entity.poste.libelle'
        ))
            ->add('description', TextareaType::class, array(
                'label' => 'entity.poste.description'
            ))
            ->add('profileDemande', TextareaType::class, array(
                'label' => 'entity.poste.profiledemande',
                            'required' => false,
            ))
            ->add('group', EntityType::class, array(
                'label' => 'entity.poste.group',
                'class' => Group::class
            ))
            ->add('type', ChoiceType::class, [
                'choices'  => [
                    'CDD Etranger' => 'CDD etranger',
                    'CDI Etranger' => 'CDI etranger',
                    'Regie Etranger' => 'regie etranger',
                    'Regie à distance' => 'regie à distance',
                    'Interne' => 'interne',
                ],
                'label' => 'entity.poste.type',
                'required' => false,
            ])
            ->add('dateEcheance', DateType::class, array(
                'label' => 'entity.poste.echeance',
                'required' => false,
            ))
            ->add('nbPostes', ChoiceType::class, [
                'choices'  => [
                    '1' => '1',
                    '2' => '2',
                    '3' => '3',
                    'Plusieurs' => 'plusieurs',
                ],
                'label' => 'entity.poste.nbPostes',
                'required' => false,
            ])
            ->add('responsable', TextareaType::class, array(
                'label' => 'entity.poste.responsable',
                'required' => false,
            ))
            ->add('localisation', TextareaType::class, array(
                'label' => 'entity.poste.localisation',
                'required' => false,
            ))
            ->add('tjm', TextareaType::class, array(
                'label' => 'entity.poste.tjm',
                'required' => false,
            ))
            ->add('primeCoptation', TextareaType::class, array(
                'label' => 'entity.poste.primeCoptation',
                'required' => false,
            ))
            ->add('etat', ChoiceType::class, [
                'choices'  => [
                    'Actif' => 'actif',
                    'Inactif' => 'inactif',
                ],
                'label' => 'entity.poste.etat',
                'required' => false,
            ])

            ->add('liens', CollectionType::class, array(
                'label' => 'entity.poste.lien',
                'required'=>false,
                'by_reference' => false,
                'allow_delete' => true,
                'allow_add' => true,
                'entry_type' => LienType::class
            ));

    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Poste::class
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_poste';
    }


}
