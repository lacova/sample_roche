<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use AppBundle\Entity\Cliente;
use AppBundle\Form\ClienteType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

/**
 * Cliente controller.
 *
 */
class ClienteController extends Controller
{
    /**
     * Lists all Cliente entities.
     *
     */
    public function indexAction()
    {
        $search = array();

        $em = $this->getDoctrine()->getManager();

        $sql = "SELECT c FROM AppBundle:Cliente c";
        $where = "";
        
        if(isset($_GET['criterio']))
        {
            if($_GET['valor']!='')
            {
                switch($_GET['criterio'])
                {
                    case 1:
                        $where = " WHERE c.nombre like '%".$_GET['valor']."%'";
                        break;
                    case 2:
                        $where = " WHERE c.codigosap like '%".$_GET['valor']."%'";
                        break;
                }
            }
        }
        
        if(isset($_GET['ordenar_por']))
        {
            switch($_GET['ordenar_por'])
            {
                case 0:
                    $order = " ORDER BY c.nombre ASC";
                    break;
                case 1:
                    $order = " ORDER BY c.codigosap ASC";
                    break;
            }
        }
        else{
            $order = " ORDER BY c.nombre ASC";
        }
        
        $sql .= $where.$order;

        $query = $em->createQuery($sql);
        
        $clientes = $query->getResult();

        return $this->render('cliente/index.html.twig', array(
            'clientes' => $clientes,
        ));
    }

    /**
     * Creates a new Cliente entity.
     *
     */
    public function newAction(Request $request)
    {
        $cliente = new Cliente();
        $form = $this->createForm('AppBundle\Form\ClienteType', $cliente);
        
        $form->add('eshospital', ChoiceType::Class, array(
                        'choices' => array(
                            'NO' => '0',
                            'Si' => '1',
                        ),
                        'expanded' => true 
                    ));
        $form->add('clientede', ChoiceType::Class, array(
                        'choices' => array(
                            'ROCHE' => 'Roche',
                            'BIOTEST' => 'biotest',
                        )
                    ));   
        
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            $cliente->setStatus(1);
            $cliente->setFechaalta('');
            $em = $this->getDoctrine()->getManager();
            $em->persist($cliente);
            $em->flush();

            return $this->redirectToRoute('cliente_show', array('id' => $cliente->getId()));
        }

        return $this->render('cliente/new.html.twig', array(
            'cliente' => $cliente,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Cliente entity.
     *
     */
    public function showAction(Cliente $cliente)
    {
        $deleteForm = $this->createDeleteForm($cliente);

        return $this->render('cliente/show.html.twig', array(
            'cliente' => $cliente,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Cliente entity.
     *
     */
    public function editAction(Request $request, Cliente $cliente)
    {
        $deleteForm = $this->createDeleteForm($cliente);
        $editForm = $this->createForm('AppBundle\Form\ClienteType', $cliente);
        $editForm->add('eshospital', ChoiceType::Class, array(
                        'choices' => array(
                            'NO' => '0',
                            'Si' => '1',
                        ),
                        'expanded' => true 
                    ));
        $editForm->add('clientede', ChoiceType::Class, array(
                        'choices' => array(
                            'ROCHE' => 'Roche',
                            'BIOTEST' => 'biotest',
                        )
                    ));          
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($cliente);
            $em->flush();

            return $this->redirectToRoute('cliente_edit', array('id' => $cliente->getId()));
        }

        return $this->render('cliente/edit.html.twig', array(
            'cliente' => $cliente,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    public function changestateAction(Request $request, Cliente $cliente){
 
        if ($cliente->getStatus() == 0) {
            $cliente->setStatus(1);
        } else {
            $cliente->setStatus(0);
        }
        
        $em = $this->getDoctrine()->getManager();
        $em->persist($cliente);
        $em->flush();
        
        return $this->redirectToRoute('cliente_index');
    }
    
    /**
     * Deletes a Cliente entity.
     *
     */
    public function deleteAction(Request $request, Cliente $cliente)
    {
        $form = $this->createDeleteForm($cliente);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $cliente->setStatus(0);
            $em = $this->getDoctrine()->getManager();
            //$em->remove($cliente);
            $em->persist($cliente);
            $em->flush();
        }

        return $this->redirectToRoute('cliente_index');
    }

    /**
     * Creates a form to delete a Cliente entity.
     *
     * @param Cliente $cliente The Cliente entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Cliente $cliente)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('cliente_delete', array('id' => $cliente->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
