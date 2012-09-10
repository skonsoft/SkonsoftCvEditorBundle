<?php

namespace Skonsoft\Bundle\CvEditorBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Skonsoft\Bundle\CvEditorBundle\Entity\CvUploadedDocument;
use Skonsoft\Bundle\CvEditorBundle\Form\CvUploadedDocumentType;

/**
 * CvUploadedDocument controller.
 *
 * @Route("/cv/upload")
 */
class CvUploadedDocumentController extends Controller
{
    /**
     * Lists all CvUploadedDocument entities.
     *
     * @Route("/", name="cv_upload")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('SkonsoftCvEditorBundle:CvUploadedDocument')->findAll();

        return array(
            'entities' => $entities,
        );
    }

    /**
     * Finds and displays a CvUploadedDocument entity.
     *
     * @Route("/{id}/show", name="cv_upload_show")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SkonsoftCvEditorBundle:CvUploadedDocument')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find CvUploadedDocument entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to create a new CvUploadedDocument entity.
     *
     * @Route("/new", name="cv_upload_new")
     * @Template()
     */
    public function newAction()
    {
        $entity = new CvUploadedDocument();
        $form   = $this->createForm(new CvUploadedDocumentType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a new CvUploadedDocument entity.
     *
     * @Route("/create", name="cv_upload_create")
     * @Method("POST")
     * @Template("SkonsoftCvEditorBundle:CvUploadedDocument:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity  = new CvUploadedDocument();
        $form = $this->createForm(new CvUploadedDocumentType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity->upload();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('cv_manager_process', array('cvUploadedDocumentId' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to edit an existing CvUploadedDocument entity.
     *
     * @Route("/{id}/edit", name="cv_upload_edit")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SkonsoftCvEditorBundle:CvUploadedDocument')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find CvUploadedDocument entity.');
        }

        $editForm = $this->createForm(new CvUploadedDocumentType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing CvUploadedDocument entity.
     *
     * @Route("/{id}/update", name="cv_upload_update")
     * @Method("POST")
     * @Template("SkonsoftCvEditorBundle:CvUploadedDocument:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SkonsoftCvEditorBundle:CvUploadedDocument')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find CvUploadedDocument entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new CvUploadedDocumentType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('cv_upload_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a CvUploadedDocument entity.
     *
     * @Route("/{id}/delete", name="cv_upload_delete")
     * @Method("POST")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('SkonsoftCvEditorBundle:CvUploadedDocument')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find CvUploadedDocument entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('cv_upload'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
