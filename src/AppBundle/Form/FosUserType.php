<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FosUserType extends AbstractType
{ 
    
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        //parent::buildForm($builder, $options);
        
        //print_r($options);
        
        $builder
            ->add('name')
            ->add('surname')
            ->add('phone')
            ->add('fax')
            ->add('phoneext')
            ->add('center')
            ->add('facultad')
            ->add('departamento')
            ->add('zip')
            ->add('ciudad')
            ->add('direccion')
            ; 
    }
    
    public function getParent()
    {
        return 'FOS\UserBundle\Form\Type\RegistrationFormType';

        // Or for Symfony < 2.8
        // return 'fos_user_registration';
    }

    public function getBlockPrefix()
    {
        return 'app_user_registration';
    }

    // For Symfony 2.x
    public function getName()
    {
        return $this->getBlockPrefix();
    }    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\FosUser'
        ));
    }
}
