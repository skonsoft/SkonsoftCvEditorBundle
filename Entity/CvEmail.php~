<?php

namespace Skonsoft\Bundle\CvEditorBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Skonsoft\Bundle\CvEditorBundle\Entity\CvEmail
 *
 * @ORM\Table(name="cv_email")
 * @ORM\Entity
 */
class CvEmail
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
     * @var string $address
     *
     * @ORM\Column(name="address", type="string", length=255, nullable=false)
     */
    private $address;

    /**
     * @var CvPersonal
     *
     * @ORM\ManyToOne(targetEntity="CvPersonal")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cv_personal_id", referencedColumnName="id")
     * })
     */
    private $cvPersonal;



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
     * Set address
     *
     * @param string $address
     * @return CvEmail
     */
    public function setAddress($address)
    {
        $this->address = $address;
    
        return $this;
    }

    /**
     * Get address
     *
     * @return string 
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set cvPersonal
     *
     * @param Skonsoft\Bundle\CvEditorBundle\Entity\CvPersonal $cvPersonal
     * @return CvEmail
     */
    public function setCvPersonal(\Skonsoft\Bundle\CvEditorBundle\Entity\CvPersonal $cvPersonal = null)
    {
        $this->cvPersonal = $cvPersonal;
    
        return $this;
    }

    /**
     * Get cvPersonal
     *
     * @return Skonsoft\Bundle\CvEditorBundle\Entity\CvPersonal 
     */
    public function getCvPersonal()
    {
        return $this->cvPersonal;
    }
}