<?php

namespace AppBundle\Controller;

use AppBundle\Entity\TipoArchivoDocumento;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Tipoarchivodocumento controller.
 *
 * @Route("tipoarchivodocumento")
 */
class TipoArchivoDocumentoController extends Controller
{
    /**
     * Lists all tipoArchivoDocumento entities.
     *
     * @Route("/", name="tipoarchivodocumento_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $tipoArchivoDocumentos = $em->getRepository('AppBundle:TipoArchivoDocumento')->findAll();

        return $this->render('tipoarchivodocumento/index.html.twig', array(
            'tipoArchivoDocumentos' => $tipoArchivoDocumentos,
        ));
    }

    /**
     * Creates a new tipoArchivoDocumento entity.
     *
     * @Route("/new", name="tipoarchivodocumento_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $tipoArchivoDocumento = new Tipoarchivodocumento();
        $form = $this->createForm('AppBundle\Form\TipoArchivoDocumentoType', $tipoArchivoDocumento);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($tipoArchivoDocumento);
            $em->flush();

            return $this->redirectToRoute('tipoarchivodocumento_show', array('id' => $tipoArchivoDocumento->getId()));
        }

        return $this->render('tipoarchivodocumento/new.html.twig', array(
            'tipoArchivoDocumento' => $tipoArchivoDocumento,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a tipoArchivoDocumento entity.
     *
     * @Route("/{id}", name="tipoarchivodocumento_show")
     * @Method("GET")
     */
    public function showAction(TipoArchivoDocumento $tipoArchivoDocumento)
    {
        $deleteForm = $this->createDeleteForm($tipoArchivoDocumento);

        return $this->render('tipoarchivodocumento/show.html.twig', array(
            'tipoArchivoDocumento' => $tipoArchivoDocumento,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing tipoArchivoDocumento entity.
     *
     * @Route("/{id}/edit", name="tipoarchivodocumento_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, TipoArchivoDocumento $tipoArchivoDocumento)
    {
        $deleteForm = $this->createDeleteForm($tipoArchivoDocumento);
        $editForm = $this->createForm('AppBundle\Form\TipoArchivoDocumentoType', $tipoArchivoDocumento);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('tipoarchivodocumento_edit', array('id' => $tipoArchivoDocumento->getId()));
        }

        return $this->render('tipoarchivodocumento/edit.html.twig', array(
            'tipoArchivoDocumento' => $tipoArchivoDocumento,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a tipoArchivoDocumento entity.
     *
     * @Route("/{id}", name="tipoarchivodocumento_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, TipoArchivoDocumento $tipoArchivoDocumento)
    {
        $form = $this->createDeleteForm($tipoArchivoDocumento);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($tipoArchivoDocumento);
            $em->flush();
        }

        return $this->redirectToRoute('tipoarchivodocumento_index');
    }

    /**
     * Creates a form to delete a tipoArchivoDocumento entity.
     *
     * @param TipoArchivoDocumento $tipoArchivoDocumento The tipoArchivoDocumento entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(TipoArchivoDocumento $tipoArchivoDocumento)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('tipoarchivodocumento_delete', array('id' => $tipoArchivoDocumento->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
