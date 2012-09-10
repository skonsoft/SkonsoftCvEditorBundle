<?php

namespace Skonsoft\Bundle\CvEditorBundle\Factory;

use \Skonsoft\Bundle\CvEditorBundle\Entity\CvPersonal;
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
        //object attributes
        
        return $personal;
    }
}

?>
