<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use AppBundle\Entity\Seminarios;
use AppBundle\Form\SeminariosType;

/**
 * Seminarios controller.
 *
 */
class SeminariosController extends Controller
{
    /**
     * Lists all Seminarios entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $seminarios = $em->getRepository('AppBundle:Seminarios')->findAll();

        return $this->render('seminarios/index.html.twig', array(
            'seminarios' => $seminarios,
        ));
    }

    /**
     * Creates a new Seminarios entity.
     *
     */
    public function newAction(Request $request)
    {
        $seminario = new Seminarios();
        $form = $this->createForm('AppBundle\Form\SeminariosType', $seminario);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($seminario);
            $em->flush();

            return $this->redirectToRoute('seminarios_show', array('id' => $seminario->getId()));
        }

        return $this->render('seminarios/new.html.twig', array(
            'seminario' => $seminario,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Seminarios entity.
     *
     */
    public function showAction(Seminarios $seminario)
    {
        $deleteForm = $this->createDeleteForm($seminario);

        return $this->render('seminarios/show.html.twig', array(
            'seminario' => $seminario,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Seminarios entity.
     *
     */
    public function editAction(Request $request, Seminarios $seminario)
    {
        $deleteForm = $this->createDeleteForm($seminario);
        $editForm = $this->createForm('AppBundle\Form\SeminariosType', $seminario);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($seminario);
            $em->flush();

            return $this->redirectToRoute('seminarios_edit', array('id' => $seminario->getId()));
        }

        return $this->render('seminarios/edit.html.twig', array(
            'seminario' => $seminario,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Seminarios entity.
     *
     */
    public function deleteAction(Request $request, Seminarios $seminario)
    {
        $form = $this->createDeleteForm($seminario);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($seminario);
            $em->flush();
        }

        return $this->redirectToRoute('seminarios_index');
    }

    /**
     * Creates a form to delete a Seminarios entity.
     *
     * @param Seminarios $seminario The Seminarios entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Seminarios $seminario)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('seminarios_delete', array('id' => $seminario->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
