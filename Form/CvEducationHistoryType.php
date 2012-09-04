<?php

namespace Skonsoft\Bundle\CvEditorBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CvEducationHistoryType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('degreeDirection')
            ->add('educationType')
            ->add('startDate')
            ->add('endDate')
            ->add('instituteNameAndPlace')
            ->add('diploma')
            ->add('diplomaDate')
            ->add('subject')
            ->add('isHighest')
            ->add('cvProfile')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Skonsoft\Bundle\CvEditorBundle\Entity\CvEducationHistory'
        ));
    }

    public function getName()
    {
        return 'skonsoft_bundle_cveditorbundle_cveducationhistorytype';
    }
}
