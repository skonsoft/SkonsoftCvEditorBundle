<?php

namespace Skonsoft\Bundle\CvEditorBundle\Factory;

use \Skonsoft\Bundle\CvEditorBundle\Entity\CvProfile;
use \Skonsoft\Bundle\CvEditorBundle\Entity\CvComputerSkill;
use \Skonsoft\Bundle\CvEditorBundle\Entity\CvLanguageSkill;
use \Doctrine\Common\Collections\ArrayCollection;
/**
 * Description of CvProfileFactory
 *
 * @author smabrouk
 */
class CvProfileFactory extends CvBaseFactory
{
    public function loadFromXml($xmlNode){
        $cvProfile = new CvProfile();
        $cvProfile->setLanguage($this->getXmlAttributeValue($xmlNode, 'lang'));
        
        //personal
        if(isset($xmlNode->Personal))
            $cvProfile->setCvPersonal (CvPersonalFactory::getNewInstance ()->loadFromXml ($xmlNode->Personal));
        
        //parses the education history
        if(isset($xmlNode->EducationHistory)){
            
            $educationItems = new ArrayCollection();
            
            foreach ($xmlNode->EducationHistory as $educationItem) {
                $educationItems[] = CvEducationHistoryFactory::getNewInstance()->loadFromXml($educationItem);
            }
            $cvProfile->setCvEducationHistories($educationItems);
        }
        
        //parses the employment History
        if(isset($xmlNode->EmploymentHistory)){
            
            $employmentItems = new ArrayCollection();
            
            foreach ($xmlNode->EmploymentHistory as $employmentHistory) {
                $employmentItems[] = CvEducationHistoryFactory::getNewInstance()->loadFromXml($employmentHistory);
            }
            $cvProfile->setCvEmploymentHistories($employmentItems);
        }
        
        //parsing skills
        if(isset($xmlNode->Skills)){
            //computer
            if(isset($xmlNode->Skills->ComputerSkills)){
                $computerSkills = new ArrayCollection();
                foreach ($xmlNode->Skills->ComputerSkills as $skill ) {
                    $computerSkill = new CvComputerSkill();
                    $computerSkill->setName((string) $skill);
                    $computerSkills[] = $computerSkill;
                }
                $cvProfile->setCvComputerSkills($computerSkills);
            }
            //languages
            if(isset($xmlNode->Skills->LanguageSkills)){
                $languageSkills = new ArrayCollection();
                foreach ($xmlNode->Skills->LanguageSkills as $skill ) {
                    $languageSkill = new CvLanguageSkill();
                    
                    if(isset($skill->LanguageName))
                        $languageSkill->setLanguageName( (string) $skill->LanguageName);
                    
                    if(isset($skill->LanguageProficiency))
                        $languageSkill->setLanguageProficiency( (string) $skill->LanguageProficiency);
                    
                    $languageSkills[] = $languageSkill;
                }
                $cvProfile->setCvLanguageSkills($languageSkills);
            }
            
            //softs
        }
        
        
        
        return $cvProfile;
    }
}

?>
