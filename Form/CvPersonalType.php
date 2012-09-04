<?php

namespace Skonsoft\Bundle\CvEditorBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CvPersonalType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('lastName')
            ->add('lastNamePrefix')
            ->add('initials')
            ->add('firstName')
            ->add('middleName')
            ->add('title')
            ->add('dateOfBirth')
            ->add('placeOfBirth')
            ->add('maritalStatus')
            ->add('nationality')
            ->add('genderCode')
            ->add('driversLicence')
            ->add('availability')
            ->add('CvAddress', new CvAddressType())
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Skonsoft\Bundle\CvEditorBundle\Entity\CvPersonal'
        ));
    }

    public function getName()
    {
        return 'skonsoft_bundle_cveditorbundle_cvpersonaltype';
    }
}
