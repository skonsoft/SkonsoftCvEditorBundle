<?php

namespace Skonsoft\Bundle\CvEditorBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Skonsoft\Bundle\CvEditorBundle\Entity\CvClient;
use Skonsoft\Bundle\CvEditorBundle\Form\CvClientType;

/**
 * CvClient controller.
 *
 * @Route("/cv/client")
 */
class CvClientController extends Controller
{
    /**
     * Lists all CvClient entities.
     *
     * @Route("/", name="cv_client")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('SkonsoftCvEditorBundle:CvClient')->findAll();

        return array(
            'entities' => $entities,
        );
    }

    /**
     * Finds and displays a CvClient entity.
     *
     * @Route("/{id}/show", name="cv_client_show")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SkonsoftCvEditorBundle:CvClient')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find CvClient entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to create a new CvClient entity.
     *
     * @Route("/new", name="cv_client_new")
     * @Template()
     */
    public function newAction()
    {
        $entity = new CvClient();
        $form   = $this->createForm(new CvClientType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a new CvClient entity.
     *
     * @Route("/create", name="cv_client_create")
     * @Method("post")
     * @Template("SkonsoftCvEditorBundle:CvClient:new.html.twig")
     */
    public function createAction()
    {
        $entity  = new CvClient();
        $request = $this->getRequest();
        $form    = $this->createForm(new CvClientType(), $entity);
        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('cv_client_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to edit an existing CvClient entity.
     *
     * @Route("/{id}/edit", name="cv_client_edit")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SkonsoftCvEditorBundle:CvClient')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find CvClient entity.');
        }

        $editForm = $this->createForm(new CvClientType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing CvClient entity.
     *
     * @Route("/{id}/update", name="cv_client_update")
     * @Method("post")
     * @Template("SkonsoftCvEditorBundle:CvClient:edit.html.twig")
     */
    public function updateAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SkonsoftCvEditorBundle:CvClient')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find CvClient entity.');
        }

        $editForm   = $this->createForm(new CvClientType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        $request = $this->getRequest();

        $editForm->bindRequest($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('cv_client_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a CvClient entity.
     *
     * @Route("/{id}/delete", name="cv_client_delete")
     * @Method("post")
     */
    public function deleteAction($id)
    {
        $form = $this->createDeleteForm($id);
        $request = $this->getRequest();

        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('SkonsoftCvEditorBundle:CvClient')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find CvClient entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('cv_client'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
