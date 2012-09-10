<?php

namespace Skonsoft\Bundle\CvEditorBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CvUploadedDocumentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('file')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Skonsoft\Bundle\CvEditorBundle\Entity\CvUploadedDocument'
        ));
    }

    public function getName()
    {
        return 'skonsoft_bundle_cveditorbundle_cvuploadeddocumenttype';
    }
}
