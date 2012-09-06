<?php

namespace Skonsoft\Bundle\CvEditorBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use \Skonsoft\Bundle\CvEditorBundle\Provider\TextKernelProvider;

/**
 * @Route("/cv/upload")
 */
class CvManagerController extends Controller
{
    /**
     * @Route("")
     * @Template("SkonsoftCvEditorBundle:Default:index.html.twig")
     */
    public function indexAction()
    {
        $this->processCv();
        return array();
    }
    
    protected function processCv(){
        $txtKernel = new TextKernelProvider("axones","uzfp6738", "frenchdemo", "http://home.textkernel.nl/sourcebox/processAtomicPost.do");
        $txtKernel->load("/home/smabrouk/Downloads/Mabrouk_Skander.doc");
    }
}
