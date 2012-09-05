<?php

namespace Skonsoft\Bundle\CvEditorBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Skonsoft\Bundle\CvEditorBundle\Entity\CvReference
 *
 * @ORM\Table(name="cv_reference")
 * @ORM\Entity
 */
class CvReference
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
     * @var string $name
     *
     * @ORM\Column(name="name", type="string", length=45, nullable=true)
     */
    private $name;

    /**
     * @var CvProfile
     *
     * @ORM\ManyToOne(targetEntity="CvProfile", inversedBy="cvReferences")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cv_profile_id", referencedColumnName="id")
     * })
     */
    private $cvProfile;



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
     * Set name
     *
     * @param string $name
     * @return CvReference
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

    /**
     * Set cvProfile
     *
     * @param Skonsoft\Bundle\CvEditorBundle\Entity\CvProfile $cvProfile
     * @return CvReference
     */
    public function setCvProfile(\Skonsoft\Bundle\CvEditorBundle\Entity\CvProfile $cvProfile = null)
    {
        $this->cvProfile = $cvProfile;
    
        return $this;
    }

    /**
     * Get cvProfile
     *
     * @return Skonsoft\Bundle\CvEditorBundle\Entity\CvProfile 
     */
    public function getCvProfile()
    {
        return $this->cvProfile;
    }
}