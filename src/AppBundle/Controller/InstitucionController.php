<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Institucion;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Institucion controller.
 *
 * @Route("institucion")
 */
class InstitucionController extends Controller
{
    /**
     * Lists all institucion entities.
     *
     * @Route("/", name="institucion_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $institucions = $em->getRepository('AppBundle:Institucion')->findAll();

        return $this->render('institucion/index.html.twig', array(
            'entities' => $institucions,
        ));
    }

    /**
     * Creates a new institucion entity.
     *
     * @Route("/new", name="institucion_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $institucion = new Institucion();
        $form = $this->createForm('AppBundle\Form\InstitucionType', $institucion);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($institucion);
            $em->flush();

            return $this->redirectToRoute('institucion_show', array('id' => $institucion->getId()));
        }

        return $this->render('institucion/new.html.twig', array(
            'institucion' => $institucion,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a institucion entity.
     *
     * @Route("/{id}", name="institucion_show")
     * @Method("GET")
     */
    public function showAction(Institucion $institucion)
    {
        $deleteForm = $this->createDeleteForm($institucion);

        return $this->render('institucion/show.html.twig', array(
            'institucion' => $institucion,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing institucion entity.
     *
     * @Route("/{id}/edit", name="institucion_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Institucion $institucion)
    {
        $deleteForm = $this->createDeleteForm($institucion);
        $editForm = $this->createForm('AppBundle\Form\InstitucionType', $institucion);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('institucion_edit', array('id' => $institucion->getId()));
        }

        return $this->render('institucion/edit.html.twig', array(
            'entity' => $institucion,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a institucion entity.
     *
     * @Route("/{id}", name="institucion_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Institucion $institucion)
    {
        $form = $this->createDeleteForm($institucion);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($institucion);
            $em->flush();
        }

        return $this->redirectToRoute('institucion_index');
    }

    /**
     * Creates a form to delete a institucion entity.
     *
     * @param Institucion $institucion The institucion entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Institucion $institucion)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('institucion_delete', array('id' => $institucion->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
