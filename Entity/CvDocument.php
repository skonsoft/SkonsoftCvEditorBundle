<?php

namespace Skonsoft\Bundle\CvEditorBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Skonsoft\Bundle\CvEditorBundle\Entity\CvDocument
 *
 * @ORM\Table(name="cv_document")
 * @ORM\Entity
 */
class CvDocument
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string $document
     *
     * @ORM\Column(name="document", type="text", nullable=true)
     */
    private $document;

    /**
     * @var string $annotatedDocument
     *
     * @ORM\Column(name="annotated_document", type="text", nullable=true)
     */
    private $annotatedDocument;



    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set document
     *
     * @param string $document
     * @return CvDocument
     */
    public function setDocument($document)
    {
        $this->document = $document;
    
        return $this;
    }

    /**
     * Get document
     *
     * @return string 
     */
    public function getDocument()
    {
        return $this->document;
    }

    /**
     * Set annotatedDocument
     *
     * @param string $annotatedDocument
     * @return CvDocument
     */
    public function setAnnotatedDocument($annotatedDocument)
    {
        $this->annotatedDocument = $annotatedDocument;
    
        return $this;
    }

    /**
     * Get annotatedDocument
     *
     * @return string 
     */
    public function getAnnotatedDocument()
    {
        return $this->annotatedDocument;
    }
}