<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Subsidio;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Subsidio controller.
 *
 * @Route("subsidio")
 */
class SubsidioController extends Controller
{
    /**
     * Lists all subsidio entities.
     *
     * @Route("/", name="subsidio_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $subsidios = $em->getRepository('AppBundle:Subsidio')->findAll();

        return $this->render('subsidio/index.html.twig', array(
            'entities' => $subsidios,
        ));
    }

    /**
     * Creates a new subsidio entity.
     *
     * @Route("/new", name="subsidio_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $subsidio = new Subsidio();
        $form = $this->createForm('AppBundle\Form\SubsidioType', $subsidio);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($subsidio);
            $em->flush();

            return $this->redirectToRoute('subsidio_show', array('id' => $subsidio->getId()));
        }

        return $this->render('subsidio/new.html.twig', array(
            'subsidio' => $subsidio,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a subsidio entity.
     *
     * @Route("/{id}", name="subsidio_show")
     * @Method("GET")
     */
    public function showAction(Subsidio $subsidio)
    {
        $deleteForm = $this->createDeleteForm($subsidio);

        return $this->render('subsidio/show.html.twig', array(
            'subsidio' => $subsidio,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing subsidio entity.
     *
     * @Route("/{id}/edit", name="subsidio_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Subsidio $subsidio)
    {
        $deleteForm = $this->createDeleteForm($subsidio);
        $editForm = $this->createForm('AppBundle\Form\SubsidioType', $subsidio);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('subsidio_edit', array('id' => $subsidio->getId()));
        }

        return $this->render('subsidio/edit.html.twig', array(
            'entity' => $subsidio,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a subsidio entity.
     *
     * @Route("/{id}", name="subsidio_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Subsidio $subsidio)
    {
        $form = $this->createDeleteForm($subsidio);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($subsidio);
            $em->flush();
        }

        return $this->redirectToRoute('subsidio_index');
    }

    /**
     * Creates a form to delete a subsidio entity.
     *
     * @param Subsidio $subsidio The subsidio entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Subsidio $subsidio)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('subsidio_delete', array('id' => $subsidio->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
