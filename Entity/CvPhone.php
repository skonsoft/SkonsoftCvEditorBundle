<?php

namespace Skonsoft\Bundle\CvEditorBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Skonsoft\Bundle\CvEditorBundle\Entity\CvPhone
 *
 * @ORM\Table(name="cv_phone")
 * @ORM\Entity
 */
class CvPhone
{
    const HOME_PHONE = 1;
    const MOBILE_PHONE = 2;
    const FAX_PHONE = 3;

    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string $number
     *
     * @ORM\Column(name="number", type="string", length=45, nullable=true)
     */
    private $number;

    /**
     * @var string $type
     *
     * @ORM\Column(name="type", type="string", length=45, nullable=true)
     */
    private $type;

    /**
     * @var CvPersonal
     *
     * @ORM\ManyToOne(targetEntity="CvPersonal", inversedBy="cvPhones")
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
     * Set number
     *
     * @param string $number
     * @return CvPhone
     */
    public function setNumber($number)
    {
        $this->number = $number;
    
        return $this;
    }

    /**
     * Get number
     *
     * @return string 
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Set type
     *
     * @param string $type
     * @return CvPhone
     */
    public function setType($type)
    {
        $this->type = $type;
    
        return $this;
    }

    /**
     * Get type
     *
     * @return string 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set cvPersonal
     *
     * @param Skonsoft\Bundle\CvEditorBundle\Entity\CvPersonal $cvPersonal
     * @return CvPhone
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