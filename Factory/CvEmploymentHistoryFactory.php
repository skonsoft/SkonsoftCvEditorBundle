<?php

namespace Skonsoft\Bundle\CvEditorBundle\Factory;

use \Skonsoft\Bundle\CvEditorBundle\Entity\CvEmploymentHistory;
/**
 * Description of CvEmploymentHistoryFactory
 * 
 * recives node like
 *
 * @author smabrouk
 */
class CvEmploymentHistoryFactory extends CvBaseFactory
{
    /**
     * 
     * @param SimpleXmlElement $xmlNode
     * @example:
     * <EmploymentItem id="96">
		<JobTitle id="111">Développeur symfony</JobTitle>
 		<StartDate id="106">2009-01-01</StartDate>
 		<EndDate id="106"></EndDate>
		<EmployerNameAndPlace id="116">Panteo</EmployerNameAndPlace>
		<Description id="96+122">j&apos;ai contribué au développement site web : attractiveworld
Conception et développement de la version 2 du site web msb-online.org</Description>
		<QuitReason></QuitReason>
		<IsLastItem>0</IsLastItem>
		<IsLastItemWithJobTitle>0</IsLastItemWithJobTitle>
	</EmploymentItem>
     */
    public function loadFromXml($xmlNode){
        $cvEmploymentHistory = new CvEmploymentHistory();
        
        $cvEmploymentHistory->setJobTitle($this->getXmlElementValue($xmlNode, "JobTitle"));
        $cvEmploymentHistory->setStartDate($this->getXmlElementValue($xmlNode, "StartDate"));
        $cvEmploymentHistory->setEndDate($this->getXmlElementValue($xmlNode, "EndDate"));
        $cvEmploymentHistory->setEmployerNameAndPlace($this->getXmlElementValue($xmlNode, "EmployerNameAndPlace"));
        $cvEmploymentHistory->setDescription($this->getXmlElementValue($xmlNode, "Description"));
        $cvEmploymentHistory->setQuitReason($this->getXmlElementValue($xmlNode, "QuitReason"));
        $cvEmploymentHistory->setIsLast($this->getXmlElementValue($xmlNode, "IsLastItem"));
        $cvEmploymentHistory->setIsLastItemWithJobTitle($this->getXmlElementValue($xmlNode, "IsLastItemWithJobTitle"));
        
        return $cvEmploymentHistory;
    }
}

?>
