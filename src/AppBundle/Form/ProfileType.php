<?php

namespace AppBundle\Form;

use AppBundle\Entity\Profile;
use Symfony\Component\Form\AbstractType;
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
            ->add('nom', TextType::class, ['label' => 'entity.profile.nom'])
            ->add('prenom')
            ->add('telephone')
            ->add('email')
            ->add('cvFile', VichFileType::class, [
                'required' => false,
                'label' => 'entity.profile.cv',
                'allow_delete' => true,
                'download_link' => true
            ])
            ->add('experience')
            ->add('niveau')
            ->add('skype')
            ->add('linkedin')
            ->add('facebook')
            ->add('github')
            ->add('sivp')
            ->add('prestationsalariale', TextType::class, ['label' => 'entity.profile.prestation'])
            ->add('photo', FileType::class, ['required' => false, 'data_class' => null])
            ->add('disponibilite')
            ->add('competences');
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Profile'
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
