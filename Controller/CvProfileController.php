<?php

namespace Skonsoft\Bundle\CvEditorBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Skonsoft\Bundle\CvEditorBundle\Entity\CvProfile;
use Skonsoft\Bundle\CvEditorBundle\Form\CvProfileType;

/**
 * CvProfile controller.
 *
 * @Route("/cv/profile")
 */
class CvProfileController extends Controller
{
    /**
     * Lists all CvProfile entities.
     *
     * @Route("/", name="cv_profile")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('SkonsoftCvEditorBundle:CvProfile')->findAll();

        return array(
            'entities' => $entities,
        );
    }

    /**
     * Finds and displays a CvProfile entity.
     *
     * @Route("/{id}/show", name="cv_profile_show")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SkonsoftCvEditorBundle:CvProfile')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find CvProfile entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to create a new CvProfile entity.
     *
     * @Route("/new", name="cv_profile_new")
     * @Template()
     */
    public function newAction()
    {
        $entity = new CvProfile();
        $form   = $this->createForm(new CvProfileType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a new CvProfile entity.
     *
     * @Route("/create", name="cv_profile_create")
     * @Method("post")
     * @Template("SkonsoftCvEditorBundle:CvProfile:new.html.twig")
     */
    public function createAction()
    {
        $entity  = new CvProfile();
        $request = $this->getRequest();
        $form    = $this->createForm(new CvProfileType(), $entity);
        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('cv_profile_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to edit an existing CvProfile entity.
     *
     * @Route("/{id}/edit", name="cv_profile_edit")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SkonsoftCvEditorBundle:CvProfile')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find CvProfile entity.');
        }

        $editForm = $this->createForm(new CvProfileType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing CvProfile entity.
     *
     * @Route("/{id}/update", name="cv_profile_update")
     * @Method("post")
     * @Template("SkonsoftCvEditorBundle:CvProfile:edit.html.twig")
     */
    public function updateAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SkonsoftCvEditorBundle:CvProfile')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find CvProfile entity.');
        }

        $editForm   = $this->createForm(new CvProfileType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        $request = $this->getRequest();

        $editForm->bindRequest($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('cv_profile_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a CvProfile entity.
     *
     * @Route("/{id}/delete", name="cv_profile_delete")
     * @Method("post")
     */
    public function deleteAction($id)
    {
        $form = $this->createDeleteForm($id);
        $request = $this->getRequest();

        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('SkonsoftCvEditorBundle:CvProfile')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find CvProfile entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('cv_profile'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
