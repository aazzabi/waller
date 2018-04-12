<?php

namespace AppBundle\Form;

use AppBundle\Entity\Group;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichFileType;

class GroupType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
                'required' => false,
                'label' => 'entity.groupe.nom',
            ])
            ->add('logoFile', VichFileType::class, [
                'required' => false,
                'allow_delete' => true,
                'label' => 'photo',
                'download_link' => true,
            ])
            ->add('type', ChoiceType::class, [
                'choices'  => [
                    'Société externe' => 'externe',
                    'Société de recrutement' => 'recrutement',
                ],
                'label' => 'entity.groupe.type',
                'required' => false,
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Group::class,
        ));
    }

    public function getBlockPrefix()
    {
        return 'appbundle_group';
    }


}
