<?php

namespace Skonsoft\Bundle\CvEditorBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Skonsoft\Bundle\CvEditorBundle\Entity\CvDocument;
use Skonsoft\Bundle\CvEditorBundle\Form\CvDocumentType;

/**
 * CvDocument controller.
 *
 * @Route("/cv/document")
 */
class CvDocumentController extends Controller
{

    /**
     * Lists all CvDocument entities.
     *
     * @Route("/", name="cv_document")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('SkonsoftCvEditorBundle:CvDocument')->findAll();

        return array(
            'entities' => $entities,
        );
    }

    /**
     * Finds and displays a CvDocument entity.
     *
     * @Route("/{id}/show", name="cv_document_show")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SkonsoftCvEditorBundle:CvDocument')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find CvDocument entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity' => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to create a new CvDocument entity.
     *
     * @Route("/new", name="cv_document_new")
     * @Template()
     */
    public function newAction()
    {
        $entity = new CvDocument();
        $form = $this->createForm(new CvDocumentType(), $entity);

        return array(
            'entity' => $entity,
            'form' => $form->createView(),
        );
    }

    /**
     * Creates a new CvDocument entity.
     *
     * @Route("/create", name="cv_document_create")
     * @Method("POST")
     * @Template("SkonsoftCvEditorBundle:CvDocument:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new CvDocument();
        $form = $this->createForm(new CvDocumentType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('cv_document_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form' => $form->createView(),
        );
    }

    /**
     * Displays a form to edit an existing CvDocument entity.
     *
     * @Route("/{id}/edit", name="cv_document_edit")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SkonsoftCvEditorBundle:CvDocument')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find CvDocument entity.');
        }

        $editForm = $this->createForm(new CvDocumentType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity' => $entity,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing CvDocument entity.
     *
     * @Route("/{id}/update", name="cv_document_update")
     * @Method("POST")
     * @Template("SkonsoftCvEditorBundle:CvDocument:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SkonsoftCvEditorBundle:CvDocument')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find CvDocument entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new CvDocumentType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('cv_document_edit', array('id' => $id)));
        }

        return array(
            'entity' => $entity,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a CvDocument entity.
     *
     * @Route("/{id}/delete", name="cv_document_delete")
     * @Method("POST")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('SkonsoftCvEditorBundle:CvDocument')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find CvDocument entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('cv_document'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
                        ->add('id', 'hidden')
                        ->getForm()
        ;
    }

    /**
     * Finds and displays a CvDocument entity as HTML.
     *
     * @Route("/{id}/show-html", name="cv_document_show_html")
     * @Template("SkonsoftCvEditorBundle:CvDocument:showAsHtml.html.twig")
     */
    public function showAsHtmlAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SkonsoftCvEditorBundle:CvDocument')->find($id);
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find CvDocument entity.');
        }

        return array(
            'entity' => $entity
        );
    }

}
