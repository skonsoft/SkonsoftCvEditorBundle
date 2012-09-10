<?php

namespace Skonsoft\Bundle\CvEditorBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Skonsoft\Bundle\CvEditorBundle\Entity\CvProfile
 *
 * @ORM\Table(name="cv_profile")
 * @ORM\Entity
 */
class CvProfile
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
     * @var string $language
     *
     * @ORM\Column(name="language", type="string", length=45, nullable=true)
     */
    private $language;

    /**
     * @var string $salary
     *
     * @ORM\Column(name="salary", type="string", length=45, nullable=true)
     */
    private $salary;

    /**
     * @var integer $totalExperienceYears
     *
     * @ORM\Column(name="total_experience_years", type="integer", nullable=true)
     */
    private $totalExperienceYears;

    /**
     * @var CvClient
     *
     * @ORM\ManyToOne(targetEntity="CvClient")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cv_client_id", referencedColumnName="id")
     * })
     */
    private $cvClient;

    /**
     * @var CvUploadedDocument
     *
     * @ORM\ManyToOne(targetEntity="CvUploadedDocument")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cv_uploaded_document_id", referencedColumnName="id")
     * })
     */
    private $cvUploadedDocument;

    /**
     * @var CvDocument
     *
     * @ORM\OneToOne(targetEntity="CvDocument",cascade={"persist", "remove"} )
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cv_document_id", referencedColumnName="id")
     * })
     */
    private $cvDocument;

    /**
     * @var CvPersonal
     *
     * @ORM\OneToOne(targetEntity="CvPersonal", cascade={"persist", "remove"} )
     * @@ORM\JoinColumn(name="cv_personal_id", referencedColumnName="id")
     */
    private $cvPersonal;

    /**
     *
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="CvEducationHistory", mappedBy="cvProfile", cascade={"persist", "remove"} )
     */
    private $cvEducationHistories;

    /**
     *
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="CvEmploymentHistory", mappedBy="cvProfile", cascade={"persist", "remove"} )
     */
    private $cvEmploymentHistories;

    /**
     *
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="CvLanguageSkill", mappedBy="cvProfile", cascade={"persist", "remove"} )
     */
    protected $cvLanguageSkills;

    /**
     *
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="CvBenefit", mappedBy="cvProfile", cascade={"persist", "remove"} )
     */
    protected $cvBenefits;

    /**
     *
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="CvSoftSkill", mappedBy="cvProfile", cascade={"persist", "remove"} )
     */
    protected $cvSoftSkills;

    /**
     *
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="CvHobby", mappedBy="cvProfile", cascade={"persist", "remove"} )
     */
    protected $cvHobbies;

    /**
     *
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="CvReference", mappedBy="cvProfile", cascade={"persist", "remove"} )
     */
    protected $cvReferences;

    /**
     *
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="CvComputerSkill", mappedBy="cvProfile", cascade={"persist", "remove"} )
     */
    protected $cvComputerSkills;

    public function __construct()
    {
        $this->cvEducationHistories = new ArrayCollection();
        $this->cvEmploymentHistories = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->getCvPersonal()->__toString();
    }

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
     * Set language
     *
     * @param string $language
     * @return CvProfile
     */
    public function setLanguage($language)
    {
        $this->language = $language;

        return $this;
    }

    /**
     * Get language
     *
     * @return string 
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * Set salary
     *
     * @param string $salary
     * @return CvProfile
     */
    public function setSalary($salary)
    {
        $this->salary = $salary;

        return $this;
    }

    /**
     * Get salary
     *
     * @return string 
     */
    public function getSalary()
    {
        return $this->salary;
    }

    /**
     * Set totalExperienceYears
     *
     * @param integer $totalExperienceYears
     * @return CvProfile
     */
    public function setTotalExperienceYears($totalExperienceYears)
    {
        $this->totalExperienceYears = $totalExperienceYears;

        return $this;
    }

    /**
     * Get totalExperienceYears
     *
     * @return integer 
     */
    public function getTotalExperienceYears()
    {
        return $this->totalExperienceYears;
    }

    /**
     * Set cvClient
     *
     * @param Skonsoft\Bundle\CvEditorBundle\Entity\CvClient $cvClient
     * @return CvProfile
     */
    public function setCvClient(\Skonsoft\Bundle\CvEditorBundle\Entity\CvClient $cvClient = null)
    {
        $this->cvClient = $cvClient;

        return $this;
    }

    /**
     * Get cvClient
     *
     * @return Skonsoft\Bundle\CvEditorBundle\Entity\CvClient 
     */
    public function getCvClient()
    {
        return $this->cvClient;
    }

    /**
     * Set cvUploadedDocument
     *
     * @param Skonsoft\Bundle\CvEditorBundle\Entity\CvUploadedDocument $cvUploadedDocument
     * @return CvProfile
     */
    public function setCvUploadedDocument(\Skonsoft\Bundle\CvEditorBundle\Entity\CvUploadedDocument $cvUploadedDocument = null)
    {
        $this->cvUploadedDocument = $cvUploadedDocument;

        return $this;
    }

    /**
     * Get cvUploadedDocument
     *
     * @return Skonsoft\Bundle\CvEditorBundle\Entity\CvUploadedDocument 
     */
    public function getCvUploadedDocument()
    {
        return $this->cvUploadedDocument;
    }

    /**
     * Set cvDocument
     *
     * @param Skonsoft\Bundle\CvEditorBundle\Entity\CvDocument $cvDocument
     * @return CvProfile
     */
    public function setCvDocument(\Skonsoft\Bundle\CvEditorBundle\Entity\CvDocument $cvDocument = null)
    {
        $this->cvDocument = $cvDocument;

        return $this;
    }

    /**
     * Get cvDocument
     *
     * @return Skonsoft\Bundle\CvEditorBundle\Entity\CvDocument 
     */
    public function getCvDocument()
    {
        return $this->cvDocument;
    }

    /**
     * Set cvPersonal
     *
     * @param Skonsoft\Bundle\CvEditorBundle\Entity\CvPersonal $cvPersonal
     * @return CvProfile
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

    /**
     * Add cvEducationHistories
     *
     * @param Skonsoft\Bundle\CvEditorBundle\Entity\CvEducationHistory $cvEducationHistories
     * @return CvProfile
     */
    public function addCvEducationHistorie(\Skonsoft\Bundle\CvEditorBundle\Entity\CvEducationHistory $cvEducationHistories)
    {
        $cvEducationHistories->setCvProfile($this);
        $this->cvEducationHistories[] = $cvEducationHistories;

        return $this;
    }

    /**
     * Remove cvEducationHistories
     *
     * @param Skonsoft\Bundle\CvEditorBundle\Entity\CvEducationHistory $cvEducationHistories
     */
    public function removeCvEducationHistorie(\Skonsoft\Bundle\CvEditorBundle\Entity\CvEducationHistory $cvEducationHistories)
    {
        $this->cvEducationHistories->removeElement($cvEducationHistories);
    }

    /**
     * Get cvEducationHistories
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getCvEducationHistories()
    {
        return $this->cvEducationHistories;
    }

    /**
     * set cvEducationHistories
     *
     * @return CvProfile 
     */
    public function setCvEducationHistories($cvEducationHistories)
    {
        $this->cvEducationHistories = new ArrayCollection();
        foreach ($cvEducationHistories as $cvEducationHistory) {
            $this->addCvEducationHistorie($cvEducationHistory);
        }
        return $this;
    }

    /**
     * Add cvEmploymentHistories
     *
     * @param Skonsoft\Bundle\CvEditorBundle\Entity\CvEmploymentHistory $cvEmploymentHistories
     * @return CvProfile
     */
    public function addCvEmploymentHistorie(\Skonsoft\Bundle\CvEditorBundle\Entity\CvEmploymentHistory $cvEmploymentHistories)
    {
        $cvEmploymentHistories->setCvProfile($this);
        $this->cvEmploymentHistories[] = $cvEmploymentHistories;

        return $this;
    }

    /**
     * Remove cvEmploymentHistories
     *
     * @param Skonsoft\Bundle\CvEditorBundle\Entity\CvEmploymentHistory $cvEmploymentHistories
     */
    public function removeCvEmploymentHistorie(\Skonsoft\Bundle\CvEditorBundle\Entity\CvEmploymentHistory $cvEmploymentHistories)
    {
        $this->cvEmploymentHistories->removeElement($cvEmploymentHistories);
    }

    /**
     * Get cvEmploymentHistories
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getCvEmploymentHistories()
    {
        return $this->cvEmploymentHistories;
    }

    /**
     * set cvEmploymentHistories
     *
     * @return CvProfile 
     */
    public function setCvEmploymentHistories($cvEmploymentHistories)
    {
        $this->cvEmploymentHistories = new ArrayCollection();
        foreach ($cvEmploymentHistories as $cvEmploymentHistory) {
            $this->addCvEmploymentHistorie($cvEmploymentHistory);
        }
        return $this;
    }

    /**
     * Add cvLanguageSkills
     *
     * @param Skonsoft\Bundle\CvEditorBundle\Entity\CvLanguageSkill $cvLanguageSkills
     * @return CvProfile
     */
    public function addCvLanguageSkill(\Skonsoft\Bundle\CvEditorBundle\Entity\CvLanguageSkill $cvLanguageSkills)
    {
        $cvLanguageSkills->setCvProfile($this);
        $this->cvLanguageSkills[] = $cvLanguageSkills;

        return $this;
    }

    /**
     * Remove cvLanguageSkills
     *
     * @param Skonsoft\Bundle\CvEditorBundle\Entity\CvLanguageSkill $cvLanguageSkills
     */
    public function removeCvLanguageSkill(\Skonsoft\Bundle\CvEditorBundle\Entity\CvLanguageSkill $cvLanguageSkills)
    {
        $this->cvLanguageSkills->removeElement($cvLanguageSkills);
    }

    /**
     * Get cvLanguageSkills
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getCvLanguageSkills()
    {
        return $this->cvLanguageSkills;
    }

    /**
     * set cvLanguageSkills
     *
     * @return CvProfile 
     */
    public function setCvLanguageSkills($cvLanguageSkills)
    {
        $this->cvLanguageSkills = new ArrayCollection();
        foreach ($cvLanguageSkills as $cvLanguageSkill) {
            $this->addCvLanguageSkill($cvLanguageSkill);
        }
        return $this;
    }

    /**
     * Add cvBenefits
     *
     * @param Skonsoft\Bundle\CvEditorBundle\Entity\CvBenefit $cvBenefits
     * @return CvProfile
     */
    public function addCvBenefit(\Skonsoft\Bundle\CvEditorBundle\Entity\CvBenefit $cvBenefits)
    {
        $cvBenefits->setCvProfile($this);
        $this->cvBenefits[] = $cvBenefits;

        return $this;
    }

    /**
     * Remove cvBenefits
     *
     * @param Skonsoft\Bundle\CvEditorBundle\Entity\CvBenefit $cvBenefits
     */
    public function removeCvBenefit(\Skonsoft\Bundle\CvEditorBundle\Entity\CvBenefit $cvBenefits)
    {
        $this->cvBenefits->removeElement($cvBenefits);
    }

    /**
     * Get cvBenefits
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getCvBenefits()
    {
        return $this->cvBenefits;
    }

    /**
     * set cvBenefits
     *
     * @return CvProfile 
     */
    public function setCvBenefits($cvBenefits)
    {
        $this->cvBenefits = new ArrayCollection();
        foreach ($cvBenefits as $cvBenefit) {
            $this->addCvBenefit($cvBenefit);
        }
        return $this;
    }

    /**
     * Add cvSoftSkills
     *
     * @param Skonsoft\Bundle\CvEditorBundle\Entity\CvSoftSkill $cvSoftSkills
     * @return CvProfile
     */
    public function addCvSoftSkill(\Skonsoft\Bundle\CvEditorBundle\Entity\CvSoftSkill $cvSoftSkills)
    {
        $cvSoftSkills->setCvProfile($this);
        $this->cvSoftSkills[] = $cvSoftSkills;

        return $this;
    }

    /**
     * Remove cvSoftSkills
     *
     * @param Skonsoft\Bundle\CvEditorBundle\Entity\CvSoftSkill $cvSoftSkills
     */
    public function removeCvSoftSkill(\Skonsoft\Bundle\CvEditorBundle\Entity\CvSoftSkill $cvSoftSkills)
    {
        $this->cvSoftSkills->removeElement($cvSoftSkills);
    }

    /**
     * Get cvSoftSkills
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getCvSoftSkills()
    {
        return $this->cvSoftSkills;
    }

    /**
     * set cvSoftSkills
     *
     * @return CvProfile 
     */
    public function setCvSoftSkills($cvSoftSkills)
    {
        $this->cvSoftSkills = new ArrayCollection();
        foreach ($cvSoftSkills as $cvSoftSkill) {
            $this->addCvSoftSkill($cvSoftSkill);
        }
        return $this;
    }

    /**
     * Add cvHobbies
     *
     * @param Skonsoft\Bundle\CvEditorBundle\Entity\CvHobby $cvHobbies
     * @return CvProfile
     */
    public function addCvHobbie(\Skonsoft\Bundle\CvEditorBundle\Entity\CvHobby $cvHobbies)
    {
        $cvHobbies->setCvProfile($this);
        $this->cvHobbies[] = $cvHobbies;

        return $this;
    }

    /**
     * Remove cvHobbies
     *
     * @param Skonsoft\Bundle\CvEditorBundle\Entity\CvHobby $cvHobbies
     */
    public function removeCvHobbie(\Skonsoft\Bundle\CvEditorBundle\Entity\CvHobby $cvHobbies)
    {
        $this->cvHobbies->removeElement($cvHobbies);
    }

    /**
     * Get cvHobbies
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getCvHobbies()
    {
        return $this->cvHobbies;
    }

    /**
     * set cvHobbies
     *
     * @return CvProfile 
     */
    public function setCvHobbies($cvHobbies)
    {
        $this->cvHobbies = new ArrayCollection();
        foreach ($cvHobbies as $cvHobbie) {
            $this->addCvHobbie($cvHobbie);
        }
        return $this;
    }

    /**
     * Add cvReferences
     *
     * @param Skonsoft\Bundle\CvEditorBundle\Entity\CvReference $cvReferences
     * @return CvProfile
     */
    public function addCvReference(\Skonsoft\Bundle\CvEditorBundle\Entity\CvReference $cvReferences)
    {
        $cvReferences->setCvProfile($this);
        $this->cvReferences[] = $cvReferences;

        return $this;
    }

    /**
     * Remove cvReferences
     *
     * @param Skonsoft\Bundle\CvEditorBundle\Entity\CvReference $cvReferences
     */
    public function removeCvReference(\Skonsoft\Bundle\CvEditorBundle\Entity\CvReference $cvReferences)
    {
        $this->cvReferences->removeElement($cvReferences);
    }

    /**
     * Get cvReferences
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getCvReferences()
    {
        return $this->cvReferences;
    }

    /**
     * set cvReferences
     *
     * @return CvProfile 
     */
    public function setCvReferences($cvReferences)
    {
        $this->cvReferences = new ArrayCollection();
        foreach ($cvReferences as $cvReference) {
            $this->addCvReference($cvReference);
        }
        return $this;
    }

    /**
     * Add cvComputerSkills
     *
     * @param Skonsoft\Bundle\CvEditorBundle\Entity\CvComputerSkill $cvComputerSkills
     * @return CvProfile
     */
    public function addCvComputerSkill(\Skonsoft\Bundle\CvEditorBundle\Entity\CvComputerSkill $cvComputerSkills)
    {
        $cvComputerSkills->setCvProfile($this);
        $this->cvComputerSkills[] = $cvComputerSkills;

        return $this;
    }

    /**
     * Remove cvComputerSkills
     *
     * @param Skonsoft\Bundle\CvEditorBundle\Entity\CvComputerSkill $cvComputerSkills
     */
    public function removeCvComputerSkill(\Skonsoft\Bundle\CvEditorBundle\Entity\CvComputerSkill $cvComputerSkills)
    {
        $this->cvComputerSkills->removeElement($cvComputerSkills);
    }

    /**
     * Get cvComputerSkills
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getCvComputerSkills()
    {
        return $this->cvComputerSkills;
    }

    /**
     * set cvComputerSkills
     *
     * @return CvProfile 
     */
    public function setCvComputerSkills($cvComputerSkills)
    {
        $this->cvComputerSkills = new ArrayCollection();
        foreach ($cvComputerSkills as $cvComputerSkill) {
            $this->addCvComputerSkill($cvComputerSkill);
        }
        return $this;
    }

}