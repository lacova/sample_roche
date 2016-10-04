<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SeminariosType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('visible')
            ->add('summary')
            ->add('content')
            ->add('source')
            ->add('createdate', 'datetime')
            ->add('editdate', 'datetime')
            ->add('hasimage')
            ->add('imagesource')
            ->add('hasdocument')
            ->add('documentsource')
            ->add('aforo')
            ->add('preinscripcion')
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Seminarios'
        ));
    }
}
