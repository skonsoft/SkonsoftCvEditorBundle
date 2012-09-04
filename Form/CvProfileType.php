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
