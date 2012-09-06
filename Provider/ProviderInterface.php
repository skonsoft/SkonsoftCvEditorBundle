<?php

namespace Skonsoft\Bundle\CvEditorBundle\Provider;

/**
 *
 * @author smabrouk
 */
interface ProviderInterface
{
    /**
     * loads a document into CvProfile object
     * 
     * @param string $document the path of document to load
     * @return Skonsoft\Bundle\CvEditorBundle\Entity\CvProfile
     */
    public function load($document);
}

?>
