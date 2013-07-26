<?php

namespace Backoffice\Form;

use Zend\Form\Form;

class Login extends Form {

    public function __construct()
    {
        parent::__construct('login');
        $this->setAttribute('action', '/backoffice/auth/login');
        $this->setAttribute('method', 'post');
        $this->setAttribute('class', 'form-signin');
        
        $this->setInputFilter(new \Backoffice\Form\LoginFilter());

        $this->add(array(
            'name' => 'username',
            'attributes' => array(
                'type' => 'text',
            ),
            'options' => array(
                'label' => 'Username:',
            )
        ));

        $this->add(array(
            'name' => 'password',
            'attributes' => array(
                'type' => 'password',
            ),
            'options' => array(
                'label' => 'Password:'
            ),
        ));

        $this->add(array(
            'name' => 'submit',
            'attributes' => array(
                'type' => 'submit',
                'class' => 'btn btn-success',
                'value' => 'Login'
            ),
        ));
    }

}