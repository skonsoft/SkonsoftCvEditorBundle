<?php

namespace Skonsoft\Bundle\CvEditorBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Skonsoft\Bundle\CvEditorBundle\Entity\CvUploadedDocument
 *
 * @ORM\Table(name="cv_uploaded_document")
 * @ORM\Entity
 */
class CvUploadedDocument
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
     * @var string $original
     *
     * @ORM\Column(name="original", type="blob", nullable=true)
     */
    private $original;

    /**
     * @var string $fileType
     *
     * @ORM\Column(name="file_type", type="string", length=45, nullable=true)
     */
    private $fileType;

    /**
     * @var string $name
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=true)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    public $path;

    /**
     * @Assert\File(maxSize="6000000")
     * @Assert\NotBlank()
     */
    public $file;

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
     * Set original
     *
     * @param string $original
     * @return CvUploadedDocument
     */
    public function setOriginal($original)
    {
        $this->original = $original;

        return $this;
    }

    /**
     * Get original
     *
     * @return string 
     */
    public function getOriginal()
    {
        return $this->original;
    }

    /**
     * Set fileType
     *
     * @param string $fileType
     * @return CvUploadedDocument
     */
    public function setFileType($fileType)
    {
        $this->fileType = $fileType;

        return $this;
    }

    /**
     * Get fileType
     *
     * @return string 
     */
    public function getFileType()
    {
        return $this->fileType;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return CvUploadedDocument
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    public function getAbsolutePath()
    {
        return null === $this->path ? null : $this->getUploadRootDir() . '/' . $this->path;
    }

    public function getWebPath()
    {
        return null === $this->path ? null : $this->getUploadDir() . '/' . $this->path;
    }

    protected function getUploadRootDir()
    {
        // the absolute directory path where uploaded documents should be saved
        return __DIR__ . '/../../../../../web/' . $this->getUploadDir();
    }

    protected function getUploadDir()
    {
        // get rid of the __DIR__ so it doesn't screw when displaying uploaded doc/image in the view.
        return 'uploads/cv';
    }

    public function upload()
    {
        // the file property can be empty if the field is not required
        if (null === $this->file) {
            return;
        }

        // we use the original file name here but you should
        // sanitize it at least to avoid any security issues
        // move takes the target directory and then the target filename to move to
        $this->file->move($this->getUploadRootDir(), $this->file->getClientOriginalName());

        // set the path property to the filename where you'ved saved the file
        $this->path = realpath( $this->getUploadRootDir().'/'.$this->file->getClientOriginalName() );
        
        $this->fileType = $this->file->getClientMimeType();
        
        if(!file_exists( $this->path ) )
            throw new \Exception("Uploaded file was not moved under uploaded dir");

        // clean up the file property as you won't need it anymore
        $this->file = null;
        
        $this->name = basename($this->path);
        
        $this->original = file_get_contents($this->path);
    }


    /**
     * Set path
     *
     * @param string $path
     * @return CvUploadedDocument
     */
    public function setPath($path)
    {
        $this->path = $path;
    
        return $this;
    }

    /**
     * Get path
     *
     * @return string 
     */
    public function getPath()
    {
        return $this->path;
    }
}