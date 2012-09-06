<?php

namespace Skonsoft\Bundle\CvEditorBundle\Provider;

/**
 * Description of BaseProvider
 *
 * @author smabrouk
 */
abstract class BaseProvider implements ProviderInterface
{

    /**
     *
     * @var string the path of $document to load 
     */
    protected $document;

    /**
     * @return string the path of document
     */
    public function getDocument()
    {
        return $this->document;
    }

    /**
     * @param string $document the path of document
     */
    public function setDocument($document)
    {
        $this->document = $document;
    }

}

?>
