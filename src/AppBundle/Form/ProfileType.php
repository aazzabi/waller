<?php

namespace AppBundle\Form;

use AppBundle\Entity\Competence;
use AppBundle\Entity\Disponibilite;
use AppBundle\Entity\Profile;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
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
                'label' => 'entity.profile.nom'
            ])
            ->add('prenom', TextType::class, [
                'label' => 'entity.profile.prenom'
            ])
            ->add('telephone', TextType::class, [
                'label' => 'entity.profile.telephone'])
            ->add('email',  TextType::class,[
                'label' => 'entity.profile.email'])
            ->add('cvFile', VichFileType::class, [
                'required' => false,
                'label' => 'entity.profile.cv',
                'allow_delete' => true,
                'download_link' => true
            ])
            ->add('experience', TextType::class,[
                'label' => 'entity.profile.experience'
            ])
            ->add('niveau',TextType::class, [
                'label' => 'entity.profile.niveau'
            ])
            ->add('skype', TextType::class,[
                'label' => 'entity.profile.skype',
                'required' => false,

            ])
            ->add('linkedin', TextType::class,[
                'label' => 'entity.profile.linkedin',
                'required' => false,

            ])
            ->add('facebook', TextType::class, [
                'label' => 'entity.profile.facebook',
                'required' => false,

            ])
            ->add('github',TextType::class, [
                'label' => 'entity.profile.github',
                'required' => false,

            ])
            ->add('sivp', CheckboxType::class, [
                'label' => 'entity.profile.sivp'
            ])
            ->add('prestationsalariale', TextType::class, [
                'label' => 'entity.profile.prestationsalariale'
            ])
            ->add('photoFile', VichFileType::class, [
                'required' => false,
                'allow_delete' => true,
                'label' => 'entity.profile.photo',
                'download_link' => true
            ])
            ->add('disponibilite', EntityType::class, [
                'label' => 'entity.profile.disponibilite',
                'class' => Disponibilite::class
            ])
            ->add('competences', EntityType::class, [
                'label' => 'entity.profile.competences',
                'class' => Competence::class,
                'multiple' => true
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
