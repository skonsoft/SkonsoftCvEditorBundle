<?php

namespace Skonsoft\Bundle\CvEditorBundle\Factory;

/**
 * Description of CvBaseFactory
 *
 * @author smabrouk
 */
abstract class CvBaseFactory
{

    Abstract public function loadFromXml($xmlnode);

    /**
     * 
     * @param XmlElement $xmlnode
     * @param string $node the name of the node
     * @return string the value of given node
     */
    public function getXmlElementValue($xmlnode, $node)
    {
        if ( !isset($xmlnode) )
            return null;
        
        if ( !isset($xmlnode->$node) )
            return null;
        
        return (string)$xmlnode->$node;
    }
    
    /**
     * 
     * @return \Skonsoft\Bundle\CvEditorBundle\Factory\CvBaseFactory
     */
    public static function getNewInstance(){
        $class = __CLASS__;
        return new $class();
    }
    /**
     * 
     * @param SimpleXmlElement $xmlnode
     * @param string $attribute the name of the attribute
     * @return String the value of the attribute
     */
    public function getXmlAttributeValue($xmlnode, $attribute)
    {
        if ( !isset($xmlnode) )
            return null;
        
        if ( !isset($xmlnode[$attribute]) )
            return null;
        
        return (string)$xmlnode[$attribute];
    }

}

?>
