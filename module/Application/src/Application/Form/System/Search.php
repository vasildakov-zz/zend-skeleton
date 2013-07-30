<?php
namespace Application\Form\System;

use Zend\Form\Form;

class Search extends Form
{
    public function __construct($name = null)
    {
        // we want to ignore the name passed
        parent::__construct('system');
        
        $this->setAttribute('method', 'get');
        $this->setAttribute('class', 'form-inline');
        
        
        $this->add(array(
            'name' => 'name',
            'attributes' => array(
                'type'  => 'text',
                'placeholder' => 'System name',
                'class' => 'input-small'
            ),
            'options' => array(
                'label' => '',
                
            ),
        ));   
        
        $this->add(array(
            'name' => 'submit',
            'required' => false,
            'allowEmpty' => true,
            'attributes' => array(
                'type'  => 'submit',
                'value' => 'Search',
                'id' => 'submitbutton',
                'class' => 'btn'
            ),
        ));        
        
    }
}