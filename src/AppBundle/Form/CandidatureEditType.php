<?php

namespace AppBundle\Form;

use AppBundle\Entity\Candidature;
use AppBundle\Entity\Etape;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CandidatureEditType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('currentEtape', EntityType::class, [
                'label' => 'entity.candidat.etapecourante',
                'class' => Etape::class,
                'required' => true
            ])
            ->add('commentaire', TextareaType::class, [
                'label' => 'entity.candidat.commentaire',
                'required' => false
            ])
            ->add('noteId', HiddenType::class, [
                'mapped' => false,
            ])
            ->add('noteCommentaire', TextareaType::class, [
                'label' => 'entity.note.commentaire',
                'required' => false,
                'mapped' => false,
            ])
            ->add('noteEvaluation', IntegerType::class, [
                'label' => 'entity.note.evaluation',
                'required' => false,
                'mapped' => false,
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
