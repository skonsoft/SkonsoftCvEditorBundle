<?php

namespace Skonsoft\Bundle\CvEditorBundle\Factory;

use \Skonsoft\Bundle\CvEditorBundle\Entity\CvAddress;
/**
 * Description of PersonalFactory
 *
 * @author smabrouk
 */
class CvAddressFactory extends CvBaseFactory
{
    public function loadFromXml($xmlNode){
        $address = new CvAddress();
        
        $address->setStreet($this->getXmlElementValue($xmlNode, "Street"));
        $address->setNumber($this->getXmlElementValue($xmlNode, "Number"));
        $address->setZipCode($this->getXmlElementValue($xmlNode, "ZipCode"));
        $address->setMunicipality($this->getXmlElementValue($xmlNode, "Municipality"));
        $address->setRegion($this->getXmlElementValue($xmlNode, "Region"));
        $address->setCountryCode($this->getXmlElementValue($xmlNode, "CountryCode"));
        
        return $address;
    }
}

?>
