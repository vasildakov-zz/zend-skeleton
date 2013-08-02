<?php
namespace Application\Form\System;

use Zend\Form\Form;
use Zend\InputFilter\InputFilter;
use Zend\Stdlib\Hydrator\ClassMethods;

class SystemForm extends Form
{
	public function __construct($name = null)
	{
	    parent::__construct('system');

		$this->setAttribute('method', 'post');

        $this->add(array(
            'name' => 'id',
            'type' => 'Hidden',
        ));		 

		$this->add(array(
		      'name' => 'name',
		      'options' => array(
		        'label' => 'System name: '
		      ),
		      'attributes' => array(
		        'type' => 'text',
		        'class' => 'form-control'
		      )
		));	 

        $this->add(array(
            'name' => 'submit',
            'attributes' => array(
                'type'  => 'submit',
                'value' => 'Save',
                'id' => 'submitbutton',
                'class' => 'btn btn-success'
            ),
        ));		   
	}
}