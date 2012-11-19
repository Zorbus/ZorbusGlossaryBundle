<?php
namespace Zorbus\GlossaryBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\MaxLength;

class GlossaryAdmin extends Admin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('letters', null, array(
                'label' => 'Caracters',
                'constraints' => array(
                    new NotBlank(),
                    new MaxLength(array('limit' => 255))
                )
            ))
            ->add('title', null, array(
                'constraints' => array(
                    new NotBlank(),
                    new MaxLength(array('limit' => 255))
                )
            ))
            ->add('description', 'textarea', array(
                'required' => false,
                'attr' => array('class' => 'ckeditor')
            ))
            ->add('enabled', null, array('required' => false))
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('letters')
            ->add('title')
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('letters')
            ->addIdentifier('title')
            ->add('enabled')
        ;
    }

}