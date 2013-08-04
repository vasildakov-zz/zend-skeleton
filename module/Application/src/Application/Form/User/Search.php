<?php
namespace Application\Form\User;

use Zend\Form\Form;

class Search extends Form
{
    private $name;
    
    public function __construct($name = null)
    {
        // we want to ignore the name passed
        parent::__construct('user');
        
        $this->setAttribute('method', 'get');
        $this->setAttribute('class', 'form-inline navbar-form pull-left');
        $this->setAttribute('style', '');
        
        $this->add(array(
            'name' => 'username',
            'attributes' => array(
                'type'  => 'text',
                'placeholder' => '',
                'class' => 'form-control input-small',
                'style' => 'background: #414141;border:none;'
            ),
            'options' => array(
                'label' => '',
                
            ),
        ));   
        
        $this->add(array(
            'name' => 'submit',
            'attributes' => array(
                'type'  => 'submit',
                'value' => 'Search',
                'id' => 'submitbutton',
                'class' => 'btn btn-primary btn-small'
            ),
        ));        
        
    }
}