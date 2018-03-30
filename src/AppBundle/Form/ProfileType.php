<?php

namespace AppBundle\Form;

use AppBundle\Entity\Competence;
use AppBundle\Entity\Disponibilite;
use AppBundle\Entity\Profile;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichFileType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;


class ProfileType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom', TextType::class, [
                'required' => true,
                'label' => 'entity.profileForm.nom'
            ])
            ->add('prenom', TextType::class, [
                'required' => true,
                'label' => 'entity.profileForm.prenom'
            ])
            ->add('telephone', TextType::class, [
                'required' => true,
                'label' => 'entity.profileForm.telephone'
                ])
            ->add('email', EmailType::class, [
                'required' => false,
                'label' => 'entity.profileForm.email'])
            ->add('cvFile', VichFileType::class, [
                'required' => false,
                'label' => 'cv',
                'allow_delete' => true,
                'download_link' => true
            ])
            ->add('experience', TextType::class, [
                'required' => false,
                'label' => 'entity.profileForm.experience'
            ])
            ->add('niveau', TextType::class, [
                'required' => false,
                'label' => 'entity.profileForm.niveau'
            ])
            ->add('societeactuel', TextType::class, [
                'required' => false,
                'label' => 'entity.profileForm.societeactuel'
            ])
            ->add('ambition', ChoiceType::class, [
                'choices'  => [
                    'Cherche une mission en France / à l\'étranger' => 'mission en france',
                    'Veut être embauché en France / à l\'étranger' => 'travailler en france',
                    'Veut être embauché en Tunisie' => 'travailler en tunisie',
                ],
                'required' => false,
                'label' => 'entity.profileForm.ambition'
            ])
            ->add('ville', TextType::class, [
                'required' => false,
                'label' => 'entity.profileForm.ville'
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
            ->add('contrat', ChoiceType::class, [
                'choices'  => [
                    'SIVP' => 'SIVP',
                    'CDI' => 'CDI',
                    'CDD' => 'CDD',
                    'Freeelance' => 'Freeelance',
                ],
                'label' => 'entity.profileForm.contrat',
                'required' => false,
            ])
            ->add('prestationsalariale', TextType::class, [
                'required' => false,
                'label' => 'entity.profileForm.prestationsalariale'
            ])
            ->add('salaireactuel', TextType::class, [
                'required' => false,
                'label' => 'entity.profileForm.salaireactuel'
            ])
            ->add('institut', TextType::class, [
                'required' => false,
                'label' => 'entity.profileForm.institut'
            ])
            ->add('postBac', TextType::class, [
                'required' => false,
                'label' => 'entity.profileForm.postBac'
            ])
            ->add('diplome', TextType::class, [
                'required' => false,
                'label' => 'entity.profileForm.diplome'
            ])
            ->add('photoFile', VichFileType::class, [
                'required' => false,
                'allow_delete' => true,
                'label' => 'photo',
                'download_link' => true
            ])
            ->add('disponibilite', EntityType::class, [
                'label' => 'entity.profileForm.disponibilite',
                'class' => Disponibilite::class
            ])
            ->add('competencesTags', TextType::class, [
                'required' => true,
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
