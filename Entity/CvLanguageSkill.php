<?php

namespace Skonsoft\Bundle\CvEditorBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Skonsoft\Bundle\CvEditorBundle\Entity\CvLanguageSkill
 *
 * @ORM\Table(name="cv_language_skill")
 * @ORM\Entity
 */
class CvLanguageSkill
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
     * @var string $languageName
     *
     * @ORM\Column(name="language_name", type="string", length=255, nullable=true)
     */
    private $languageName;

    /**
     * @var string $languageProficiency
     *
     * @ORM\Column(name="language_proficiency", type="string", length=100, nullable=true)
     */
    private $languageProficiency;

    /**
     * @var CvProfile
     *
     * @ORM\ManyToOne(targetEntity="CvProfile")
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
     * Set languageName
     *
     * @param string $languageName
     * @return CvLanguageSkill
     */
    public function setLanguageName($languageName)
    {
        $this->languageName = $languageName;
    
        return $this;
    }

    /**
     * Get languageName
     *
     * @return string 
     */
    public function getLanguageName()
    {
        return $this->languageName;
    }

    /**
     * Set languageProficiency
     *
     * @param string $languageProficiency
     * @return CvLanguageSkill
     */
    public function setLanguageProficiency($languageProficiency)
    {
        $this->languageProficiency = $languageProficiency;
    
        return $this;
    }

    /**
     * Get languageProficiency
     *
     * @return string 
     */
    public function getLanguageProficiency()
    {
        return $this->languageProficiency;
    }

    /**
     * Set cvProfile
     *
     * @param Skonsoft\Bundle\CvEditorBundle\Entity\CvProfile $cvProfile
     * @return CvLanguageSkill
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