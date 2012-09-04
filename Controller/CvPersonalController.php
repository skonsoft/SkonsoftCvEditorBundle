<?php

namespace Skonsoft\Bundle\CvEditorBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Skonsoft\Bundle\CvEditorBundle\Entity\CvPersonal;
use Skonsoft\Bundle\CvEditorBundle\Form\CvPersonalType;

/**
 * CvPersonal controller.
 *
 * @Route("/cv/personal")
 */
class CvPersonalController extends Controller
{
    /**
     * Lists all CvPersonal entities.
     *
     * @Route("/", name="cv_personal")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('SkonsoftCvEditorBundle:CvPersonal')->findAll();

        return array(
            'entities' => $entities,
        );
    }

    /**
     * Finds and displays a CvPersonal entity.
     *
     * @Route("/{id}/show", name="cv_personal_show")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SkonsoftCvEditorBundle:CvPersonal')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find CvPersonal entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to create a new CvPersonal entity.
     *
     * @Route("/new", name="cv_personal_new")
     * @Template()
     */
    public function newAction()
    {
        $entity = new CvPersonal();
        $form   = $this->createForm(new CvPersonalType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a new CvPersonal entity.
     *
     * @Route("/create", name="cv_personal_create")
     * @Method("post")
     * @Template("SkonsoftCvEditorBundle:CvPersonal:new.html.twig")
     */
    public function createAction()
    {
        $entity  = new CvPersonal();
        $request = $this->getRequest();
        $form    = $this->createForm(new CvPersonalType(), $entity);
        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('cv_personal_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to edit an existing CvPersonal entity.
     *
     * @Route("/{id}/edit", name="cv_personal_edit")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SkonsoftCvEditorBundle:CvPersonal')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find CvPersonal entity.');
        }

        $editForm = $this->createForm(new CvPersonalType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing CvPersonal entity.
     *
     * @Route("/{id}/update", name="cv_personal_update")
     * @Method("post")
     * @Template("SkonsoftCvEditorBundle:CvPersonal:edit.html.twig")
     */
    public function updateAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SkonsoftCvEditorBundle:CvPersonal')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find CvPersonal entity.');
        }

        $editForm   = $this->createForm(new CvPersonalType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        $request = $this->getRequest();

        $editForm->bindRequest($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('cv_personal_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a CvPersonal entity.
     *
     * @Route("/{id}/delete", name="cv_personal_delete")
     * @Method("post")
     */
    public function deleteAction($id)
    {
        $form = $this->createDeleteForm($id);
        $request = $this->getRequest();

        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('SkonsoftCvEditorBundle:CvPersonal')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find CvPersonal entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('cv_personal'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
