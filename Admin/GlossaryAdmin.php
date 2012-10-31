<?php
namespace Zorbus\GlossaryBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Validator\ErrorElement;
use Sonata\AdminBundle\Form\FormMapper;

class GlossaryAdmin extends Admin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('letters', null, array('label' => 'Caracters'))
            ->add('title')
            ->add('description', 'textarea', array('required' => false, 'attr' => array('class' => 'ckeditor')))
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

    public function validate(ErrorElement $errorElement, $object)
    {
        $errorElement
            ->with('letters')
                ->assertNotBlank()
                ->assertMaxLength(array('limit' => 255))
            ->end()
            ->with('title')
                ->assertNotBlank()
                ->assertMaxLength(array('limit' => 255))
            ->end()
        ;
    }
}