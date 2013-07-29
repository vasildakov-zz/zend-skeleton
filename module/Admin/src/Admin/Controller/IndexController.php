<?php
// module/Admin/src/Admin/Controller/IndexController.php

namespace Admin\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\Session\Container;


class IndexController extends AbstractActionController
{
    #protected $albumTable;
    
    #private $greetingService;
    
    #private $authService;
    
    
    public function indexAction()
    {   
        $view = new ViewModel(array(
            'message' => 'Admin/Index',
        ));
        
        return $view;
    }

}