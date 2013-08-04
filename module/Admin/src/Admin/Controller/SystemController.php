<?php 
// module/Admin/src/Admin/Controller/SystemController.php

/**
 * Affiliate Framework (http://framework.vasildakov.com/)
 *
 * @package Admin
 * @author Vasil Dakov
 * @link https://github.com/vasildakov/zend-skeleton for the canonical source repository
 * @copyright Copyright (c) 2005-2013 Vasil Dakov (http://www.vasildakov.com)
 * @license http://framework.vasildakov.com/license/new-bsd New BSD License
 */

namespace Admin\Controller;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\QueryBuilder;
use Doctrine\ORM\Tools\Pagination\Paginator as DoctrinePaginator;
use DoctrineORMModule\Paginator\Adapter\DoctrinePaginator as DoctrinePaginatorAdapter;

use DoctrineModule\Validator\NoObjectExists as NoObjectExists;
#use DoctrineModule\Validator\ObjectExists as ObjectExists;

use Zend\Paginator\Paginator as ZendPaginator;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\Session\Container;

use Application\Form\System\SystemForm as SystemForm;
use Application\Form\System\Search as SearchForm;

use Application\Entity\System;


use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterInterface;

class SystemController extends AbstractActionController {

    protected $systemTable;

    #private $greetingService;
    #private $authService;
    
    protected $em;

    public function setEntityManager(EntityManager $em) 
    {
        $this->em = $em;
    }

    public function getEntityManager() 
    {
        if (null === $this->em) {
            #$this->em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
            $this->em = $this->getServiceLocator()->get('doctrine.entitymanager.orm_default');
        }
        return $this->em;
    }

    
    
    public function paginationWithDQL() 
    {
        $dql = "SELECT s FROM Application\\Entity\\System s ORDER BY s.id DESC";
        $query = $entityManager->createQuery($dql);

    }



    public function indexAction() 
    {
        $decorator = $this->DecoratorPlugin();
        $systemPlugin = $this->SystemPlugin();
        
        $form = new SearchForm();

        $entityManager = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
        #$repository = $entityManager->getRepository('Application\Entity\System');

        // http://docs.doctrine-project.org/en/latest/reference/query-builder.html
        $qb = $entityManager->createQueryBuilder()
              ->from('Application\Entity\System', 's')
              ->select("s")
              ->orderBy('s.id', 'desc');
        
        $query = $qb->getQuery();

        $adapter = new DoctrinePaginatorAdapter(new DoctrinePaginator($query));

        $paginator = new ZendPaginator($adapter);
        $paginator->setDefaultItemCountPerPage(15);

        $page = (int)$this->params()->fromQuery('page');
        if($page) $paginator->setCurrentPageNumber($page); 

        $view = new ViewModel(array(
                    'form' => $form,
                    'paginator' => $paginator,
                    'systemPlugin' => $systemPlugin,
                    'decorator' => $decorator
                ));

        return $view;

    }


    public function oldIndexAction()
    {
        // Zend framework 2.2.x album example of pagination with search result
        // https://github.com/tahmina8765/zf2_search_with_pagination_example
        // http://zf2pagination.lifencolor.com/public/album

        $decorator = $this->DecoratorPlugin();
        $systemPlugin = $this->SystemPlugin();
        
        $form = new SearchForm();
        
    
        $request = $this->getRequest();
        if ($request->isPost()) {}

        $entityManager = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
        $repository = $entityManager->getRepository('Application\Entity\System');
        


        # $results = $this->getEntityManager()->getRepository('Application\Entity\System')->getPaginator(0, 3);
        /* foreach ($paginator as $s) {
            var_dump($s->getName() ); echo '<br />';
        } */

        #print_r($systems); #exit();
        /* $dql = "SELECT s, u FROM Application\Entity\System s JOIN s.users u ORDER BY s.id DESC";
        $query = $this->getEntityManager()->createQuery($dql)
                       ->setFirstResult(0)
                       ->setMaxResults(100); */

        $adapter = new DoctrinePaginatorAdapter(new DoctrinePaginator($repository->createQueryBuilder('system')));
        #$adapter = new DoctrineAdapter(new ORMPaginator($repository));

        $paginator = new ZendPaginator($adapter);
        $paginator->setDefaultItemCountPerPage(15);

        $page = (int)$this->params()->fromQuery('page');
        if($page) $paginator->setCurrentPageNumber($page);
        
        // setting variables to the layout
        $this->layout()->setVariables(array(
                    'var1' => 'Search form',
                    'var2'  => 'Some value for another variable',
        ));
        
        
        $view = new ViewModel(array(
                    'form' => $form,
                    'paginator' => $paginator,
                    'systemPlugin' => $systemPlugin,
                    'decorator' => $decorator
                ));

        return $view;
    }

    
    public function searchAction() {}
    
    
    // http://questiontrack.com/how-to-use-doctrinemodulevalidatornoobjectexists-in-edit-forms---zend-framework-2-amp-doctrine-2-1098290.html
    // http://www.zf2.com.br/tutoriais/post/zf2-doctrine2-dbnorecordexists-vs-noobjectexists
    // https://github.com/doctrine/DoctrineModule/blob/master/docs/validator.md
    

    public function addAction()
    {
        /* $validator = new \DoctrineModule\Validator\ObjectExists(array(
            'object_repository' => $this->getEntityManager()->getRepository('Application\Entity\System'),
            'fields' => array('name')
        ));

        var_dump($validator->isValid('test123')); */

        $form = new SystemForm();

        


        $form->get('submit')->setAttribute('label', 'Add');

        $request = $this->getRequest();

        if ($request->isPost()) 
        {
            # new doctrine Entity
            $system = new System();

            # check if object is exists
            $validator = new NoObjectExists(array(
                    'object_repository' => $this->getEntityManager()->getRepository('Application\Entity\System'),
                    'fields' => array(
                        'name'
                    )
            ));
            $validator->setMessage('Sorry guy, a system with this name already exists !', 'objectFound');

            $form->setInputFilter($system->getInputFilter());
            $form->getInputFilter()->get('name')->getValidatorChain()->addValidator($validator);

            $form->setData($request->getPost());

            if ($form->isValid()) 
            {
                $system->populate($form->getData());
                $this->getEntityManager()->persist($system);
                $this->getEntityManager()->flush();

                // Redirect to list of albums
                return $this->redirect()->toRoute('admin/system');
            }
        }
        
        $view = new ViewModel(array(
            'form' => $form
        ));

        return $view;
    }


    public function editAction()
    {
        $view = new ViewModel(array());
        return $view;
    }


    public function deleteAction()
    {
        $id = (int) $this->getEvent()->getRouteMatch()->getParam('id');
        $system = $this->getEntityManager()->find('Application\Entity\System', $id);

        $request = $this->getRequest();
        
        if ($request->isPost()) 
        {
            $del = $request->getPost()->get('del', 'No');
            if ($del == 'Yes') {
                $id = (int) $request->getPost()->get('id');
                $system = $this->getEntityManager()->find('Application\Entity\System', $id);

                if ($system) {
                    $this->getEntityManager()->remove($system);
                    $this->getEntityManager()->flush();
                }
            }      
            // Redirect to list of Systems
            return $this->redirect()->toRoute('admin/system');                  
        }

        #print_r($id);

        $view = new ViewModel(array(
            'id' => $id,
            'system' => $system
        ));
        return $view;
    }
    

    public function deactivateAction() {}

    
    public function viewAction()
    {
        $id = (int) $this->getEvent()->getRouteMatch()->getParam('id');
        
        $entityManager = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
        $system = $entityManager->find("Application\Entity\System", array("id" => $id));
        $entityManager->persist($system);
        
        $view = new ViewModel(array(
            'system' => $system
        ));
        return $view;
    }    
}