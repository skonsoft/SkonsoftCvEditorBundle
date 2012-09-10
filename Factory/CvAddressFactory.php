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
        
        $address->setStreet($this->getXmlElementValue($xmlnode, "Street"));
        $address->setNumber($this->getXmlElementValue($xmlnode, "Number"));
        $address->setZipCode($this->getXmlElementValue($xmlnode, "ZipCode"));
        $address->setMunicipality($this->getXmlElementValue($xmlnode, "Municipality"));
        $address->setRegion($this->getXmlElementValue($xmlnode, "Region"));
        $address->setCountryCode($this->getXmlElementValue($xmlnode, "CountryCode"));
        
        return $address;
    }
}

?>
