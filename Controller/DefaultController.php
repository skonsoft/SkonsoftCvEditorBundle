<?php

namespace Skonsoft\Bundle\CvEditorBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * @Route("/cv")
 */
class DefaultController extends Controller
{
    /**
     * @Route("")
     * @Template("SkonsoftCvEditorBundle:Default:index.html.twig")
     */
    public function indexAction()
    {
        return array();
    }
}
