<?php

namespace Skonsoft\Bundle\CvEditorBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use \Skonsoft\Bundle\CvEditorBundle\Provider\TextKernelProvider;

/**
 * @Route("/cv/manager")
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

    /**
     * @Route("/process/{cvUploadedDocumentId}", name="cv_manager_process")
     */
    public function processCvAction($cvUploadedDocumentId)
    {
        $cvUploadedDocument = $this->getDoctrine()
                ->getRepository('SkonsoftCvEditorBundle:CvUploadedDocument')
                ->find($cvUploadedDocumentId);

        if (!$cvUploadedDocument) {
            throw $this->createNotFoundException('Uploaded cv not not found  ' . $cvUploadedDocumentId);
        }
        
        $txtKernel = new TextKernelProvider("axones", "uzfp6738", "frenchdemo", "http://home.textkernel.nl/sourcebox/processAtomicPost.do");
        $cvProfile = $txtKernel->load($cvUploadedDocument->getPath() );

        $em = $this->getDoctrine()->getManager();
        $em->persist($cvProfile);
        $em->flush();

        return $this->redirect($this->generateUrl('cv_profile_edit', array('id' => $cvProfile->getId() ) ) );
    }

}
