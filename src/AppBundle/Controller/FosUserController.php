<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use AppBundle\Entity\FosUser;
use AppBundle\Form\FosUserType;

use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use AppBundle\Services\RolesHelper;
/**
 * FosUser controller.
 *
 */
class FosUserController extends Controller
{
    /**
     * Lists all FosUser entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $fosUsers = $em->getRepository('AppBundle:FosUser')->findAll();

        return $this->render('fosuser/index.html.twig', array(
            'fosUsers' => $fosUsers,
        ));
    }

    /**
     * Creates a new FosUser entity.
     *
     */
    public function newAction(Request $request)
    {
        $fosUser = new FosUser();
        $em = $this->getDoctrine()->getManager();
        
        $ArrayCliente1 = $this->getClientesChoice($em);
        $ArrayCliente2 = $this->getClientesChoice($em);
        $ArrayCliente3 = $this->getClientesChoice($em);
      
        $form = $this->createForm('AppBundle\Form\FosUserType', $fosUser);
        
        
        $form->add('cliente1', ChoiceType::Class, array(
                'choices' => $ArrayCliente1,
                'label' => 'cliente1'
            ));
        
        $form->add('cliente2', ChoiceType::Class, array(
                'choices' => $ArrayCliente2,
                'label' => 'cliente2'
            ));

        $form->add('cliente3', ChoiceType::Class, array(
                'choices' => $ArrayCliente3,
                'label' => 'cliente3'
            ));
        
        $form->add('roles', ChoiceType::Class, array(
                'choices' => $this->getExistingRoles(),
                'data' => $fosUser->getRoles(),
                'label' => 'Roles',
                'expanded' => true,
                'multiple' => true,
                'mapped' => true,
            ));
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($fosUser);
            $em->flush();

            return $this->redirectToRoute('use_show', array('id' => $fosUser->getId()));
        }

        return $this->render('fosuser/new.html.twig', array(
            'fosUser' => $fosUser,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a FosUser entity.
     *
     */
    public function showAction(FosUser $fosUser)
    {
        $deleteForm = $this->createDeleteForm($fosUser);

        return $this->render('fosuser/show.html.twig', array(
            'fosUser' => $fosUser,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing FosUser entity.
     *
     */
    public function editAction(Request $request, FosUser $fosUser)
    {
        $em = $this->getDoctrine()->getManager();
        $deleteForm = $this->createDeleteForm($fosUser);
        $ArrayCliente1 = $this->getClientesChoice($em);
        $ArrayCliente2 = $this->getClientesChoice($em);
        $ArrayCliente3 = $this->getClientesChoice($em);
        
        $editForm = $this->createForm('AppBundle\Form\FosUserType', $fosUser);
        
        $editForm->add('cliente1', ChoiceType::Class, array(
                'choices' => $ArrayCliente1,
                'label' => 'cliente1'
            ));
        
        $editForm->add('cliente2', ChoiceType::Class, array(
                'choices' => $ArrayCliente2,
                'label' => 'cliente2'
            ));

        $editForm->add('cliente3', ChoiceType::Class, array(
                'choices' => $ArrayCliente3,
                'label' => 'cliente3'
            ));
        
        $editForm->add('roles', ChoiceType::Class, array(
                'choices' => $this->getExistingRoles(),
                'data' => $fosUser->getRoles(),
                'label' => 'Roles',
                'expanded' => true,
                'multiple' => true,
                'mapped' => true,
            ));


        
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            
            $em->persist($fosUser);
            $em->flush();

            return $this->redirectToRoute('use_edit', array('id' => $fosUser->getId()));
        }

        return $this->render('fosuser/edit.html.twig', array(
            'fosUser' => $fosUser,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a FosUser entity.
     *
     */
    public function deleteAction(Request $request, FosUser $fosUser)
    {
        $form = $this->createDeleteForm($fosUser);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($fosUser);
            $em->flush();
        }

        return $this->redirectToRoute('use_index');
    }

    /**
     * Creates a form to delete a FosUser entity.
     *
     * @param FosUser $fosUser The FosUser entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(FosUser $fosUser)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('use_delete', array('id' => $fosUser->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
    
    public function getExistingRoles(){
       $roleHierarchy = $this->container->getParameter('security.role_hierarchy.roles');
       $roles = array_keys($roleHierarchy); 

       foreach ($roles as $role) {
           $theRoles[$role] = $role;
       }
       return $theRoles;
    }
    
    public function getClientesChoice($em){
        $clientes = $em->getRepository('AppBundle:Cliente')->findAll();
        
        $returncliente = array();
        $returncliente['No tiene cliente asignado']= 0;
        foreach($clientes as $cliente){           
            $returncliente[$cliente->getCodigosap()." - ".$cliente->getNombre()]=$cliente->getId();
        }
        return $returncliente;
    }
    
    public function stateAction(FosUser $fosUser){
        
    }
}
