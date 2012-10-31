<?php
namespace Zorbus\GlossaryBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Validator\ErrorElement;
use Sonata\AdminBundle\Form\FormMapper;

class EntryAdmin extends Admin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('letter', null, array('label' => 'Caracter',  'attr' => array('class' => 'span1')))
            ->add('glossary', null, array('required' => true, 'attr' => array('class' => 'span5 select2')))
            ->add('expression')
            ->add('definition', 'textarea', array('required' => false, 'attr' => array('class' => 'ckeditor')))
            ->add('enabled', null, array('required' => false))
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('letter')
            ->add('glossary')
            ->add('expression')
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('letter')
            ->addIdentifier('expression')
            ->addIdentifier('glossary')
            ->add('enabled')
        ;
    }

    public function validate(ErrorElement $errorElement, $object)
    {
        $errorElement
            ->with('letter')
                ->assertNotBlank()
                ->assertMaxLength(array('limit' => 1))
            ->end()
            ->with('glossary')
                ->assertNotBlank()
                ->assertMaxLength(array('limit' => 255))
            ->end()
            ->with('expression')
                ->assertNotBlank()
                ->assertMaxLength(array('limit' => 255))
            ->end()
            ->with('definition')
                ->assertNotBlank()
                ->assertMaxLength(array('limit' => 255))
            ->end()
        ;
    }
}