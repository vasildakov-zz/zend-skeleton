<?php
// module/Backoffice/src/Backoffice/Controller/SiteController.php:

namespace Backoffice\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Backoffice\Form\UserForm;

use Zend\Form\Element;
use Zend\Form\Form;


class SiteController extends AbstractActionController
{
    protected $siteTable;
    
    public function indexAction()
    {   
        /* return new ViewModel(array(
            'sites' => 
                $this->getSiteTable()->fetchAll(),
        )); */       
    }
}