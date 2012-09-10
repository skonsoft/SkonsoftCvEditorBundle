<?php

namespace Skonsoft\Bundle\CvEditorBundle\Factory;

use \Skonsoft\Bundle\CvEditorBundle\Entity\CvPersonal;
use \Skonsoft\Bundle\CvEditorBundle\Entity\CvPhone;
use \Skonsoft\Bundle\CvEditorBundle\Entity\CvEmail;
use \Doctrine\Common\Collections\ArrayCollection;
/**
 * Description of PersonalFactory
 *
 * @author smabrouk
 */
class CvPersonalFactory extends CvBaseFactory
{
    public function loadFromXml($xmlNode){
        $personal = new CvPersonal();
        $personal->setLastName($this->getXmlElementValue($xmlNode, "LastName") );
        $personal->setLastNamePrefix($this->getXmlElementValue($xmlNode, "LastNamePrefix") );
        $personal->setInitials($this->getXmlElementValue($xmlNode, "Initials") );
        $personal->setFirstName($this->getXmlElementValue($xmlNode, "FirstName") );
        $personal->setMiddleName($this->getXmlElementValue($xmlNode, "MiddleName") );
        $personal->setTitle($this->getXmlElementValue($xmlNode, "Title") );
        $personal->setDateOfBirth($this->getXmlElementValue($xmlNode, "DateOfBirth") );
        $personal->setPlaceOfBirth($this->getXmlElementValue($xmlNode, "PlaceOfBirth") );
        $personal->setMaritalStatus($this->getXmlElementValue($xmlNode, "MaritalStatus") );
        $personal->setNationality($this->getXmlElementValue($xmlNode, "Nationality") );
        $personal->setGenderCode($this->getXmlElementValue($xmlNode, "GenderCode") );
        $personal->setDriversLicence($this->getXmlElementValue($xmlNode, "DriversLicence") );
        $personal->setAvailability($this->getXmlElementValue($xmlNode, "Availability") );
        
        if(isset($xmlNode->Address)){
            $personal->setCvAddress(CvAddressFactory::getNewInstance()->loadFromXml($xmlNode->Address) );
        }
        
        $phones = new ArrayCollection();
        
        //parses home phones
        if(isset($xmlNode->HomePhones)){
            
            foreach ($xmlNode->HomePhones as $phoneNode) {
                $phone = new CvPhone();
                $phone->setType(CvPhone::HOME_PHONE);
                $phone->setNumber((string) $phoneNode);
                
                $phones[] = $phone;
            }
        }
        
        //parses mobile phones
        if(isset($xmlNode->MobilePhones)){
            
            foreach ($xmlNode->MobilePhones as $phoneNode) {
                $phone = new CvPhone();
                $phone->setType(CvPhone::MOBILE_PHONE);
                $phone->setNumber((string) $phoneNode);
                
                $phones[] = $phone;
            }
        }
        
        //parses Faxes
        if(isset($xmlNode->Faxes)){
            
            foreach ($xmlNode->Faxes as $phoneNode) {
                $phone = new CvPhone();
                $phone->setType(CvPhone::FAX_PHONE);
                $phone->setNumber((string) $phoneNode);
                
                $phones[] = $phone;
            }
        }
        
        $personal->setcvPhones($phones);
        
        $emails = new ArrayCollection();
        
        //parses home phones
        if(isset($xmlNode->Emails)){
            
            foreach ($xmlNode->Emails as $emailNode) {
                $cvEmail = new CvEmail();
                $cvEmail->setAddress ( (string) $emailNode );
                
                $emails[] = $cvEmail;
            }
        }
        
        $personal->setCvEmails($emails );
        //object attributes
        
        return $personal;
    }
}

?>
