<?php

namespace Skonsoft\Bundle\CvEditorBundle\Factory;

use \Skonsoft\Bundle\CvEditorBundle\Entity\CvEducationHistory;
/**
 * Description of CvEducationHistoryFactory
 * 
 *
 * @author smabrouk
 */
class CvEducationHistoryFactory extends CvBaseFactory
{
    /**
     * 
     * @param type $xmlNode
     * @example:
     * <EducationItem id="98">
		<DegreeDirection id="28">Diplôme national des ingénieurs spécialité informatique</DegreeDirection>
		<EducationType id="98">Cours</EducationType>
		<StartDate id="15+16">2011-07-01</StartDate>
		<EndDate id="15+16">2013-02-01</EndDate>
		<InstituteNameAndPlace id="35">l&apos;école nationale des ingénieurs de Tunis</InstituteNameAndPlace>
		<Diploma id="26">Mention assez-bien</Diploma>
		<DiplomaDate></DiplomaDate>
		<Subjects></Subjects>
		<IsHighestItem>0</IsHighestItem>
	</EducationItem>
     */
    public function loadFromXml($xmlNode){
        $cvEducationHistory = new CvEducationHistory();
        
        $cvEducationHistory->setDegreeDirection($this->getXmlElementValue($xmlNode, "DegreeDirection"));
        $cvEducationHistory->setEducationType($this->getXmlElementValue($xmlNode, "EducationType"));
        $cvEducationHistory->setStartDate($this->getXmlElementValue($xmlNode, "StartDate"));
        $cvEducationHistory->setEndDate($this->getXmlElementValue($xmlNode, "EndDate"));
        $cvEducationHistory->setInstituteNameAndPlace($this->getXmlElementValue($xmlNode, "InstituteNameAndPlace"));
        $cvEducationHistory->setDiploma($this->getXmlElementValue($xmlNode, "Diploma"));
        $cvEducationHistory->setDiplomaDate($this->getXmlElementValue($xmlNode, "DiplomaDate"));
        $cvEducationHistory->setSubject($this->getXmlElementValue($xmlNode, "Subjects"));
        
        return $cvEducationHistory;
    }
}

?>
