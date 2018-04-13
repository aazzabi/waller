<?php
namespace AppBundle\Form;

use AppBundle\Entity\Group;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class RegistrationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom', TextType::class, [
            'label' => 'entity.profileForm.nom',
        ],'first')
            ->add('prenom', TextType::class, [
                'label' => 'entity.profileForm.prenom'
            ])
            ->add('roles', ChoiceType::class, array(
                'label'=>'Role',
                'choices'   => array(
                    'Examinateur'   => 'ROLE_EXAMIN',
                    'Admin'   => 'ROLE_ADMIN',
                    'Consultant'   => 'ROLE_CONSULT',
                    'Saisie'   => 'ROLE_SAISIE',
                ),
                'required'=>false,
                'multiple'  => true
            ))
            ->add('group', EntityType::class, array(
                'label' => 'Travaillant chez',
                'class' => Group::class,
                'multiple'=>false,
                'required'=>false
            ));

    }

    public function getParent()
    {
        return 'FOS\UserBundle\Form\Type\RegistrationFormType';

        // Or for Symfony < 2.8
        // return 'fos_user_registration';
    }

    public function getBlockPrefix()
    {
        return 'app_user_registration';
    }

    // For Symfony 2.x
    public function getName()
    {
        return $this->getBlockPrefix();
    }
}