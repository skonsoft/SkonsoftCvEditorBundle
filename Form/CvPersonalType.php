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
            ->add('dateOfBirth','date',array(
                'widget' => 'single_text',
                'format' => 'dd/MM/yyyy',
                'attr' => array('class' => 'datepicker')
            ))
            ->add('placeOfBirth')
            ->add('maritalStatus')
            ->add('nationality')
            ->add('genderCode')
            ->add('driversLicence')
            ->add('availability')
            ->add('CvAddress', new CvAddressType())
            ->add('CvPhones', 'collection', array(
                                                    'type' => new CvPhoneType(),
                                                    'allow_add' => true,
                                                    'by_reference' => false,
                                                    'cascade_validation' => true,
                ) )
            ->add('CvEmails', 'collection', array(
                                                    'type' => new CvEmailType(),
                                                    'allow_add' => true,
                                                    'by_reference' => false,
                                                    'cascade_validation' => true,
                ) )
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
