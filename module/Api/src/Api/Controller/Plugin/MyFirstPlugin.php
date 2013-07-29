<?php

namespace Api\Controller\Plugin;

use Zend\Mvc\Controller\Plugin\AbstractPlugin;

class MyFirstPlugin extends AbstractPlugin {

    public function doSomething() {
        
        return array(
            'data' => array('plugin' => 'MyFirstPlugin'),
        );
    }

}