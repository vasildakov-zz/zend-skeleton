<?php

namespace Admin\Controller;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\QueryBuilder;
use Doctrine\ORM\Tools\Pagination\Paginator as ORMPaginator;
use DoctrineORMModule\Paginator\Adapter\DoctrinePaginator as DoctrineAdapter;

use Zend\Paginator\Paginator as Paginator;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class UserController extends AbstractActionController
{
    
    public function indexAction()
    {
        $decorator = $this->DecoratorPlugin();
        
        $entityManager = $this->getServiceLocator()->get('doctrine.entitymanager.orm_default');
        $repository = $entityManager->getRepository('Application\Entity\User');
        $adapter = new DoctrineAdapter(new ORMPaginator($repository->createQueryBuilder('user')));
        
        $paginator = new Paginator($adapter);
        $paginator->setDefaultItemCountPerPage(12);

        $page = (int)$this->params()->fromQuery('page');
        if($page) $paginator->setCurrentPageNumber($page);
        
        $view = new ViewModel(array(
                    //'form' => $form,
                    'paginator' => $paginator,
                    'decorator' => $decorator
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
