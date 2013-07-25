<?php
// module/Backoffice/src/Backoffice/Controller/UserController.php:
// http://www.behindthename.com/names/browse.php?type_gender=1&operator_gender=is&value_gender[]=masculine&type_usage=1&operator_usage=is&value_usage[]=english&type_letter=1&operator_letter=is&value_letter[]=a

namespace Backoffice\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

# The User Form
#use Backoffice\Form\UserForm;

# Doctrine Entity
#use Backoffice\Entity\User;
#use Doctrine\ORM\EntityManager;
#use Doctrine\ORM\QueryBuilder;

class UserController extends AbstractActionController
{
    protected $userTable;
    
    public function indexAction()
    {   
        return new ViewModel(array(
            'users' => 
                $this->getUserTable()->fetchAll(),
        ));        
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
    
    public function getUserTable()
    {
        if (!$this->userTable) {
            $sm = $this->getServiceLocator();
            $this->userTable = $sm->get('Backoffice\Model\UserTable');
        }
        return $this->userTable;
    }
    
}