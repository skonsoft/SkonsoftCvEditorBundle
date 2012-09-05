<?php

namespace Skonsoft\Bundle\CvEditorBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CvProfileType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('language')
            ->add('salary')
            ->add('totalExperienceYears')
            ->add('cvClient')
            ->add('cvPersonal', new CvPersonalType(), array('cascade_validation' => true,))
            ->add('cvEducationHistories', 'collection', array(
                                                    'type' => new CvEducationHistoryType(),
                                                    'allow_add' => true,
                                                    'by_reference' => false,
                                                    'cascade_validation' => true,
                ) )
            ->add('cvEmploymentHistories', 'collection', array(
                                                    'type' => new CvEmploymentHistoryType(),
                                                    'allow_add' => true,
                                                    'by_reference' => false,
                                                    'cascade_validation' => true,
                ) )
            ->add('cvLanguageSkills', 'collection', array(
                                                    'type' => new CvLanguageSkillType(),
                                                    'allow_add' => true,
                                                    'by_reference' => false,
                                                    'cascade_validation' => true,
                ) )
            ->add('cvBenefits', 'collection', array(
                                                    'type' => new CvBenefitType(),
                                                    'allow_add' => true,
                                                    'by_reference' => false,
                                                    'cascade_validation' => true,
                ) )
            ->add('cvSoftSkills', 'collection', array(
                                                    'type' => new CvSoftSkillType(),
                                                    'allow_add' => true,
                                                    'by_reference' => false,
                                                    'cascade_validation' => true,
                ) )
                
            ->add('cvHobbies', 'collection', array(
                                                    'type' => new CvHobbyType(),
                                                    'allow_add' => true,
                                                    'by_reference' => false,
                                                    'cascade_validation' => true,
                ) )
            ->add('cvReferences', 'collection', array(
                                                    'type' => new CvReferenceType(),
                                                    'allow_add' => true,
                                                    'by_reference' => false,
                                                    'cascade_validation' => true,
                ) )
            ->add('cvComputerSkills', 'collection', array(
                                                    'type' => new CvComputerSkillType(),
                                                    'allow_add' => true,
                                                    'by_reference' => false,
                                                    'cascade_validation' => true,
                ) )
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Skonsoft\Bundle\CvEditorBundle\Entity\CvProfile',
            'cascade_validation' => true,
        ));
    }

    public function getName()
    {
        return 'skonsoft_bundle_cveditorbundle_cvprofiletype';
    }
}
