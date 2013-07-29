<?php
// module/Admin/src/Admin/Controller/ThemeController.php

namespace Admin\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\Session\Container;


class ThemeController extends AbstractActionController
{
    #protected $albumTable;
    
    #private $greetingService;
    
    #private $authService;
    
    
    public function indexAction()
    {   
        $view = new ViewModel(array(
            'message' => 'Hello admin',
        ));
        
        return $view;
    }
    
    public function showAction() {}
    
}