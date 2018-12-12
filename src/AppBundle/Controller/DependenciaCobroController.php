<?php

namespace AppBundle\Controller;

use AppBundle\Entity\DependenciaCobro;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Dependenciacobro controller.
 *
 * @Route("dependenciacobro")
 */
class DependenciaCobroController extends Controller
{
    /**
     * Lists all dependenciaCobro entities.
     *
     * @Route("/", name="dependenciacobro_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $dependenciaCobros = $em->getRepository('AppBundle:DependenciaCobro')->findAll();

        return $this->render('dependenciacobro/index.html.twig', array(
            'dependenciaCobros' => $dependenciaCobros,
        ));
    }

    /**
     * Creates a new dependenciaCobro entity.
     *
     * @Route("/new", name="dependenciacobro_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $dependenciaCobro = new Dependenciacobro();
        $form = $this->createForm('AppBundle\Form\DependenciaCobroType', $dependenciaCobro);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($dependenciaCobro);
            $em->flush();

            return $this->redirectToRoute('dependenciacobro_show', array('id' => $dependenciaCobro->getId()));
        }

        return $this->render('dependenciacobro/new.html.twig', array(
            'dependenciaCobro' => $dependenciaCobro,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a dependenciaCobro entity.
     *
     * @Route("/{id}", name="dependenciacobro_show")
     * @Method("GET")
     */
    public function showAction(DependenciaCobro $dependenciaCobro)
    {
        $deleteForm = $this->createDeleteForm($dependenciaCobro);

        return $this->render('dependenciacobro/show.html.twig', array(
            'dependenciaCobro' => $dependenciaCobro,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing dependenciaCobro entity.
     *
     * @Route("/{id}/edit", name="dependenciacobro_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, DependenciaCobro $dependenciaCobro)
    {
        $deleteForm = $this->createDeleteForm($dependenciaCobro);
        $editForm = $this->createForm('AppBundle\Form\DependenciaCobroType', $dependenciaCobro);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('dependenciacobro_edit', array('id' => $dependenciaCobro->getId()));
        }

        return $this->render('dependenciacobro/edit.html.twig', array(
            'dependenciaCobro' => $dependenciaCobro,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a dependenciaCobro entity.
     *
     * @Route("/{id}", name="dependenciacobro_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, DependenciaCobro $dependenciaCobro)
    {
        $form = $this->createDeleteForm($dependenciaCobro);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($dependenciaCobro);
            $em->flush();
        }

        return $this->redirectToRoute('dependenciacobro_index');
    }

    /**
     * Creates a form to delete a dependenciaCobro entity.
     *
     * @param DependenciaCobro $dependenciaCobro The dependenciaCobro entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(DependenciaCobro $dependenciaCobro)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('dependenciacobro_delete', array('id' => $dependenciaCobro->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
