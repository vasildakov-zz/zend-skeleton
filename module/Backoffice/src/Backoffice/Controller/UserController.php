<?php
// module/Backoffice/src/Backoffice/Controller/UserController.php:
// http://www.behindthename.com/names/browse.php?type_gender=1&operator_gender=is&value_gender[]=masculine&type_usage=1&operator_usage=is&value_usage[]=english&type_letter=1&operator_letter=is&value_letter[]=a

namespace Backoffice\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Backoffice\Form\UserForm;

use Zend\Form\Element;
use Zend\Form\Form;

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
        # testing zend form elements
        $username = new Element\Text('username');
        $username->setLabel('Username')->setAttributes(array('class' => 'username','size'  => '30',));
        
        $email = new Element\Email('email');
        $email->setLabel('Email')->setAttributes(array('size'  => '30',));        
        
        #$button = new Element\Submit('save-button');
        #$button->setLabel('Save')->setValue('Save')->setAttributes( array('name' => 'button'));
        
        $submit = new Element\Submit('save-button');
        $submit->setLabel('')->setValue('Save')->setAttributes( array('name' => 'submit', 'class' => 'btn btn-success'));
        
        $form = new Form('add-user-form');
        $form->setAttribute('method', 'get');
        $form->setAttribute('action', '/user/add');
        $form->add($username)->add($email)->add($submit);   
        
        return new ViewModel(array(
            'form' => $form
        ));          
    }

    
    
    public function editAction()
    {
        $id = (int) $this->params()->fromRoute('id', 0);
        
        if (!$id) {
            return $this->redirect()->toRoute('user', array(
                'action' => 'add'
            ));
        }
        
        $user = $this->getUserTable()->getUser($id);
        
        $form = new UserForm();
        $form->setBindOnValidate(false);
        $form->bind($user);
        $form->get('username')->setAttribute('value', 'Fooo');
        $form->get('submit')->setAttribute('value', 'Edit');
        $request = $this->getRequest(); 
        
        if ($request->isPost()) {
            $form->setInputFilter($user>getInputFilter());
            $form->setData($request->getPost());

            if ($form->isValid()) {
                $this->getUserTable()->saveUser($form->getData());
                return $this->redirect()->toRoute('user');
            }
        }
        
        return array(
            'id' => $id,
            'form' => $form,
        );        
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