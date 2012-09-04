<?php

namespace Skonsoft\Bundle\CvEditorBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Skonsoft\Bundle\CvEditorBundle\Entity\CvReference;
use Skonsoft\Bundle\CvEditorBundle\Form\CvReferenceType;

/**
 * CvReference controller.
 *
 * @Route("/cv/reference")
 */
class CvReferenceController extends Controller
{
    /**
     * Lists all CvReference entities.
     *
     * @Route("/", name="cv_reference")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('SkonsoftCvEditorBundle:CvReference')->findAll();

        return array(
            'entities' => $entities,
        );
    }

    /**
     * Finds and displays a CvReference entity.
     *
     * @Route("/{id}/show", name="cv_reference_show")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SkonsoftCvEditorBundle:CvReference')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find CvReference entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to create a new CvReference entity.
     *
     * @Route("/new", name="cv_reference_new")
     * @Template()
     */
    public function newAction()
    {
        $entity = new CvReference();
        $form   = $this->createForm(new CvReferenceType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a new CvReference entity.
     *
     * @Route("/create", name="cv_reference_create")
     * @Method("post")
     * @Template("SkonsoftCvEditorBundle:CvReference:new.html.twig")
     */
    public function createAction()
    {
        $entity  = new CvReference();
        $request = $this->getRequest();
        $form    = $this->createForm(new CvReferenceType(), $entity);
        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('cv_reference_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to edit an existing CvReference entity.
     *
     * @Route("/{id}/edit", name="cv_reference_edit")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SkonsoftCvEditorBundle:CvReference')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find CvReference entity.');
        }

        $editForm = $this->createForm(new CvReferenceType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing CvReference entity.
     *
     * @Route("/{id}/update", name="cv_reference_update")
     * @Method("post")
     * @Template("SkonsoftCvEditorBundle:CvReference:edit.html.twig")
     */
    public function updateAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SkonsoftCvEditorBundle:CvReference')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find CvReference entity.');
        }

        $editForm   = $this->createForm(new CvReferenceType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        $request = $this->getRequest();

        $editForm->bindRequest($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('cv_reference_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a CvReference entity.
     *
     * @Route("/{id}/delete", name="cv_reference_delete")
     * @Method("post")
     */
    public function deleteAction($id)
    {
        $form = $this->createDeleteForm($id);
        $request = $this->getRequest();

        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('SkonsoftCvEditorBundle:CvReference')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find CvReference entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('cv_reference'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
