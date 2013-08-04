<?php

namespace Admin\Controller;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\QueryBuilder;
use Doctrine\ORM\Tools\Pagination\Paginator as ORMPaginator;
use DoctrineORMModule\Paginator\Adapter\DoctrinePaginator as DoctrineAdapter;

use Zend\Paginator\Paginator as Paginator;

use Application\Form\User\Search as UserSearchForm;


use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class UserController extends AbstractActionController
{
 
    public function indexAction()
    {
        #$searchForm = new UserSearchForm();
        #print_r($searchForm);

        $decorator = $this->DecoratorPlugin();
        
        $entityManager = $this->getServiceLocator()->get('doctrine.entitymanager.orm_default');
        $repository = $entityManager->getRepository('Application\Entity\User');
        $adapter = new DoctrineAdapter(new ORMPaginator($repository->createQueryBuilder('user')));
        
        $paginator = new Paginator($adapter);
        $paginator->setDefaultItemCountPerPage(12);

        $page = (int)$this->params()->fromQuery('page');
        if($page) $paginator->setCurrentPageNumber($page);

        // setting variables to the layout
        $this->layout()->setVariables(array(
            'searchForm' => new UserSearchForm(),
        )); 

        $view = new ViewModel(array(
            'paginator' => $paginator,
            'decorator' => $decorator
        ));

        return $view;
    }
    

    public function viewAction() {
        $id = (int) $this->getEvent()->getRouteMatch()->getParam('id');
        
        $entityManager = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
        $user = $entityManager->find("Application\Entity\User", array("id" => $id));
        $entityManager->persist($user);
        
        $view = new ViewModel(array(
            'user' => $user
        ));
        return $view;        
    }

    public function addAction()
    {
        return new ViewModel();
    }  
    
    public function editAction()
    {
        return new ViewModel();
    } 
    
}
