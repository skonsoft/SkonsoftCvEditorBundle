<?php

namespace Skonsoft\Bundle\CvEditorBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Skonsoft\Bundle\CvEditorBundle\Entity\CvEmploymentHistory
 *
 * @ORM\Table(name="cv_employment_history")
 * @ORM\Entity
 */
class CvEmploymentHistory
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
     * @var string $jobTitle
     *
     * @ORM\Column(name="job_title", type="string", length=255, nullable=true)
     */
    private $jobTitle;

    /**
     * @var \DateTime $startDate
     *
     * @ORM\Column(name="start_date", type="date", nullable=true)
     */
    private $startDate;

    /**
     * @var \DateTime $endDate
     *
     * @ORM\Column(name="end_date", type="date", nullable=true)
     */
    private $endDate;

    /**
     * @var string $employerNameAndPlace
     *
     * @ORM\Column(name="employer_name_and_place", type="string", length=255, nullable=true)
     */
    private $employerNameAndPlace;

    /**
     * @var string $description
     *
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;

    /**
     * @var string $quitReason
     *
     * @ORM\Column(name="quit_reason", type="text", nullable=true)
     */
    private $quitReason;

    /**
     * @var boolean $isLast
     *
     * @ORM\Column(name="is_last", type="boolean", nullable=true)
     */
    private $isLast;

    /**
     * @var boolean $isLastItemWithJobTitle
     *
     * @ORM\Column(name="is_last_item_with_job_title", type="boolean", nullable=true)
     */
    private $isLastItemWithJobTitle;

    /**
     * @var CvProfile
     *
     * @ORM\ManyToOne(targetEntity="CvProfile", inversedBy="cvEmploymentHistories")
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
     * Set jobTitle
     *
     * @param string $jobTitle
     * @return EmploymentHistory
     */
    public function setJobTitle($jobTitle)
    {
        $this->jobTitle = $jobTitle;
    
        return $this;
    }

    /**
     * Get jobTitle
     *
     * @return string 
     */
    public function getJobTitle()
    {
        return $this->jobTitle;
    }

    /**
     * Set startDate
     *
     * @param \DateTime $startDate
     * @return EmploymentHistory
     */
    public function setStartDate($startDate)
    {
        if( ! $startDate instanceof \DateTime){
            $startDate = new \DateTime($startDate);
        }
        $this->startDate = $startDate;
    
        return $this;
    }

    /**
     * Get startDate
     *
     * @return \DateTime 
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * Set endDate
     *
     * @param \DateTime $endDate
     * @return EmploymentHistory
     */
    public function setEndDate($endDate)
    {
        if( ! $endDate instanceof \DateTime){
            $endDate = new \DateTime($endDate);
        }
        $this->endDate = $endDate;
    
        return $this;
    }

    /**
     * Get endDate
     *
     * @return \DateTime 
     */
    public function getEndDate()
    {
        return $this->endDate;
    }

    /**
     * Set employerNameAndPlace
     *
     * @param string $employerNameAndPlace
     * @return EmploymentHistory
     */
    public function setEmployerNameAndPlace($employerNameAndPlace)
    {
        $this->employerNameAndPlace = $employerNameAndPlace;
    
        return $this;
    }

    /**
     * Get employerNameAndPlace
     *
     * @return string 
     */
    public function getEmployerNameAndPlace()
    {
        return $this->employerNameAndPlace;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return EmploymentHistory
     */
    public function setDescription($description)
    {
        $this->description = $description;
    
        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set quitReason
     *
     * @param string $quitReason
     * @return EmploymentHistory
     */
    public function setQuitReason($quitReason)
    {
        $this->quitReason = $quitReason;
    
        return $this;
    }

    /**
     * Get quitReason
     *
     * @return string 
     */
    public function getQuitReason()
    {
        return $this->quitReason;
    }

    /**
     * Set isLast
     *
     * @param boolean $isLast
     * @return EmploymentHistory
     */
    public function setIsLast($isLast)
    {
        $this->isLast = $isLast;
    
        return $this;
    }

    /**
     * Get isLast
     *
     * @return boolean 
     */
    public function getIsLast()
    {
        return $this->isLast;
    }

    /**
     * Set isLastItemWithJobTitle
     *
     * @param boolean $isLastItemWithJobTitle
     * @return EmploymentHistory
     */
    public function setIsLastItemWithJobTitle($isLastItemWithJobTitle)
    {
        $this->isLastItemWithJobTitle = $isLastItemWithJobTitle;
    
        return $this;
    }

    /**
     * Get isLastItemWithJobTitle
     *
     * @return boolean 
     */
    public function getIsLastItemWithJobTitle()
    {
        return $this->isLastItemWithJobTitle;
    }

    /**
     * Set cvProfile
     *
     * @param Skonsoft\Bundle\CvEditorBundle\Entity\CvProfile $cvProfile
     * @return EmploymentHistory
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