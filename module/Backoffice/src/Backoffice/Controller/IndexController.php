<?php
// module/Backoffice/src/Backoffice/Controller/IndexController.php

namespace Backoffice\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

use Backoffice\Form\Login;

class IndexController extends AbstractActionController
{
    #protected $albumTable;
    
    private $greetingService;
    
    private $authService;
    
    
    public function indexAction()
    {   
        $this->authService = $this->getServiceLocator()->get('authService');
        $this->greetingService = $this->getServiceLocator()->get('greetingService');
        
        
        
        if ( !$this->authService->hasIdentity()) 
            $this->redirect()->toUrl('/backoffice/auth/login');



        
        \Locale::setDefault('en_EN');
        
        
        
        return new ViewModel(
            array('greeting' => $this->greetingService->getGreeting())
        );
    }


    public function addAction()
    {
    }

    public function editAction()
    {
    }

    public function deleteAction()
    {
    }
}