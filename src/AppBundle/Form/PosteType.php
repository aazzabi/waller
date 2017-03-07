<?php

namespace AppBundle\Form;

use AppBundle\Entity\Group;
use AppBundle\Entity\Poste;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
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
        $builder->add('libelle', TextType::class,array(
            'label' => 'entity.poste.libelle'
        ))
            ->add('description',TextType::class, array(
                'label' => 'entity.poste.description'
            ))
            ->add('profileDemande',TextType::class, array(
                'label' => 'entity.poste.profiledemande'
            ))
            ->add('group', EntityType::class, array(
                'label' => 'entity.poste.group',
                'class' => Group::class

            ))
            ->add('liens', CollectionType::class, array(
                'label' => 'entity.poste.lien',
                'entry_type' => LienType::class
            ));;
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
