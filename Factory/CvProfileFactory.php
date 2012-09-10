<?php

namespace Skonsoft\Bundle\CvEditorBundle\Factory;

use \Skonsoft\Bundle\CvEditorBundle\Entity\CvProfile;
use \Skonsoft\Bundle\CvEditorBundle\Entity\CvComputerSkill;
use \Skonsoft\Bundle\CvEditorBundle\Entity\CvLanguageSkill;
use \Doctrine\Common\Collections\ArrayCollection;
use \Skonsoft\Bundle\CvEditorBundle\Entity\CvDocument;

/**
 * Description of CvProfileFactory
 *
 * @author smabrouk
 */
class CvProfileFactory extends CvBaseFactory
{

    public function loadFromXml($xmlNode)
    {
        $cvProfile = new CvProfile();
        $cvProfile->setLanguage($this->getXmlAttributeValue($xmlNode, 'lang'));

        //personal
        if (isset($xmlNode->Personal))
            $cvProfile->setCvPersonal(CvPersonalFactory::getNewInstance()->loadFromXml($xmlNode->Personal));

        //parses the education history
        if (isset($xmlNode->EducationHistory)) {
            //at least one
            if (isset($xmlNode->EducationHistory->EducationItem)) {
                $educationItems = new ArrayCollection();

                foreach ($xmlNode->EducationHistory->EducationItem as $educationItem) {
                    $educationItems[] = CvEducationHistoryFactory::getNewInstance()->loadFromXml($educationItem);
                }
                $cvProfile->setCvEducationHistories($educationItems);
            }
        }

        //parses the employment History
        if (isset($xmlNode->EmploymentHistory)) {
            //at least one
            if (isset($xmlNode->EmploymentHistory->EmploymentItem)) {
                $employmentItems = new ArrayCollection();

                foreach ($xmlNode->EmploymentHistory->EmploymentItem as $employmentHistory) {
                    $employmentItems[] = CvEmploymentHistoryFactory::getNewInstance()->loadFromXml($employmentHistory);
                }
                $cvProfile->setCvEmploymentHistories($employmentItems);
            }
        }

        //parsing skills
        if (isset($xmlNode->Skills)) {
            //computer
            if (isset($xmlNode->Skills->ComputerSkills)) {
                $computerSkills = new ArrayCollection();
                foreach ($xmlNode->Skills->ComputerSkills as $skill) {
                    $computerSkill = new CvComputerSkill();
                    $computerSkill->setName((string) $skill);
                    $computerSkills[] = $computerSkill;
                }
                $cvProfile->setCvComputerSkills($computerSkills);
            }
            //languages
            if (isset($xmlNode->Skills->LanguageSkills)) {
                $languageSkills = new ArrayCollection();
                foreach ($xmlNode->Skills->LanguageSkills as $skill) {
                    $languageSkill = new CvLanguageSkill();

                    if (isset($skill->LanguageName))
                        $languageSkill->setLanguageName((string) $skill->LanguageName);

                    if (isset($skill->LanguageProficiency))
                        $languageSkill->setLanguageProficiency((string) $skill->LanguageProficiency);

                    $languageSkills[] = $languageSkill;
                }
                $cvProfile->setCvLanguageSkills($languageSkills);
            }

            //@TODO: softs
            //
            //others:
            if (isset($xmlNode->Other)) {
                //@TODO: hobbies
                //
                //@TODO: References
                //@TODO: Benefits

                if (isset($xmlNode->Other->Salary)) {
                    $cvProfile->setSalary((string) $xmlNode->Other->Salary);
                }

                if (isset($xmlNode->Other->TotalExperienceYears)) {
                    $cvProfile->setTotalExperienceYears((string) $xmlNode->Other->TotalExperienceYears);
                }
            }

            //parses document
            if (isset($xmlNode->Document) || isset($xmlNode->AnnotatedDocument)) {
                $cvDocument = new CvDocument();

                if (isset($xmlNode->Document)) {
                    $cvDocument->setDocument((string) $xmlNode->Document);
                }

                if (isset($xmlNode->AnnotatedDocument)) {
                    $cvDocument->setAnnotatedDocument((string) $xmlNode->AnnotatedDocument);
                }

                $cvProfile->setCvDocument($cvDocument);
            }
        }

        return $cvProfile;
    }

}

?>
