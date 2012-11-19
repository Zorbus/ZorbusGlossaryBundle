<?php
namespace Zorbus\GlossaryBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\MaxLength;

class EntryAdmin extends Admin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('letter', null, array(
                'label' => 'Caracter',
                'attr' => array('class' => 'span1'),
                'constraints' => array(
                    new NotBlank(),
                    new MaxLength(array('limit' => 1))
                )
            ))
            ->add('glossary', null, array(
                'required' => true,
                'attr' => array('class' => 'span5 select2'),
                'constraints' => array(
                    new NotBlank(),
                    new MaxLength(array('limit' => 255))
                )
            ))
            ->add('expression', null, array(
                'constraints' => array(
                    new NotBlank(),
                    new MaxLength(array('limit' => 255))
                )
            ))
            ->add('definition', 'textarea', array(
                'required' => false,
                'attr' => array('class' => 'ckeditor'),
                'constraints' => array(
                    new NotBlank()
                )
            ))
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
}