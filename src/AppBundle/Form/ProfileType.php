<?php

namespace AppBundle\Form;

use AppBundle\Entity\Competence;
use AppBundle\Entity\Disponibilite;
use AppBundle\Entity\Profile;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichFileType;


class ProfileType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom', TextType::class, [
                'label' => 'entity.profileForm.nom'
            ])
            ->add('prenom', TextType::class, [
                'label' => 'entity.profileForm.prenom'
            ])
            ->add('telephone', TextType::class, [
                'label' => 'entity.profileForm.telephone'])
            ->add('email', TextType::class, [
                'label' => 'entity.profileForm.email'])
            ->add('cvFile', VichFileType::class, [
                'required' => false,
                'label' => 'entity.profileForm.cv',
                'allow_delete' => true,
                'download_link' => true
            ])
            ->add('experience', TextType::class, [
                'label' => 'entity.profileForm.experience'
            ])
            ->add('niveau', TextType::class, [
                'label' => 'entity.profileForm.niveau'
            ])
            ->add('skype', TextType::class, [
                'label' => 'entity.profileForm.skype',
                'required' => false,

            ])
            ->add('linkedin', TextType::class, [
                'label' => 'entity.profileForm.linkedin',
                'required' => false,

            ])
            ->add('facebook', TextType::class, [
                'label' => 'entity.profileForm.facebook',
                'required' => false,

            ])
            ->add('github', TextType::class, [
                'label' => 'entity.profileForm.github',
                'required' => false,

            ])
            ->add('sivp', CheckboxType::class, [
                'label' => 'entity.profileForm.sivp',
                'required' => false,
            ])
            ->add('prestationsalariale', TextType::class, [
                'label' => 'entity.profileForm.prestationsalariale'
            ])
            ->add('photoFile', VichFileType::class, [
                'required' => false,
                'allow_delete' => true,
                'label' => 'entity.profileForm.photo',
                'download_link' => true
            ])
            ->add('disponibilite', EntityType::class, [
                'label' => 'entity.profileForm.disponibilite',
                'class' => Disponibilite::class
            ])
            ->add('competencesTags', TextType::class, [
                'label' => 'entity.profileForm.competences',
            ]);
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Profile::class,
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_profile';
    }


}
