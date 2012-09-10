<?php

namespace Skonsoft\Bundle\CvEditorBundle\Provider;

use Skonsoft\Bundle\CvEditorBundle\Nusoap;
use Symfony\Component\DomCrawler\Crawler;

use \Skonsoft\Bundle\CvEditorBundle\Factory\CvProfileFactory;

/**
 * Description of TextKernelProvider
 *
 * @author smabrouk
 */
class TextKernelProvider extends BaseProvider
{

    /**
     * @var string the TextKernel username
     */
    protected $username;

    /**
     * @var string the textKernel passwor
     */
    protected $password;

    /**
     * @var string the textKernel account
     */
    protected $account;

    /**
     *
     * @var string textkernel url
     */
    protected $url;

    /**
     * @var string the xml result
     */
    protected $xml;

    public function __construct($username, $password, $account, $url)
    {
        $this->setUsername($username);
        $this->setPassword($password);
        $this->setAccount($account);
        $this->setUrl($url);
    }

    /**
     * 
     * @return string
     */
    public function getXml()
    {
        return $this->xml;
    }

    /**
     * 
     * @param string $xml
     */
    public function setXml($xml)
    {
        $this->xml = $xml;
    }

    public function getUrl()
    {
        return $this->url;
    }

    public function setUrl($url)
    {
        $this->url = $url;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function setUsername($username)
    {
        $this->username = $username;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function getAccount()
    {
        return $this->account;
    }

    public function setAccount($account)
    {
        $this->account = $account;
    }

    /**
     * loads a document into CvProfile object
     * 
     * @param string $document the path of document to load
     * @return Skonsoft\Bundle\CvEditorBundle\Entity\CvProfile
     */
    public function load($document)
    {
        $this->setDocument($document);
        $this->post();
        return $this->buildFromXml();
    }

    /**
     * posts the document to textkernel server and puts the result into $xml attribute
     */
    protected function post()
    {
        $post = array(
            "uploaded_file" => "@" . $this->getDocument(),
            "account" => $this->getAccount(),
            "username" => $this->getUsername(),
            "password" => $this->getPassword(),
        );

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HEADER, array('Content-type: multipart/form-data'));
        curl_setopt($ch, CURLOPT_VERBOSE, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/4.0 (compatible;)");
        curl_setopt($ch, CURLOPT_URL, $this->getUrl());
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
        $response = curl_exec($ch);
        $header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
        $header = substr($response, 0, $header_size);
        $body = substr($response, $header_size);
        curl_close($ch);
        
        $this->setXml($body);
    }

    /*protected function postWithSoap()
    {
        $post = array(
            //"uploaded_file" => "@" . $this->getDocument(),
            "account" => $this->getAccount(),
            "username" => $this->getUsername(),
            "password" => $this->getPassword(),
            "fileName" => basename($this->getDocument()),
            "fileContent" => base64_encode(file_get_contents($this->getDocument()))
        );
        $client = new \Soapclient('http://home.textkernel.nl/sourcebox/soap/documentProcessor?wsdl', true);
        //$client = new \Soapclient('http://home.textkernel.nl/sourcebox/soap/documentProcessor?wsdl');
        $result = $client->call('processDocument', $post);
        var_dump($result);
        exit();
    }*/

    /**
     * parses the xml and loads it into CvProfile object 
     */
    protected function buildFromXml()
    {
        $xml =  \simplexml_load_string($this->getXml());
        if(!$xml)
            throw new \Exception("Invalid Xml recieved from Text Kernel");
        return  CvProfileFactory::getNewInstance()->loadFromXml($xml);
        
    }

}

?>
