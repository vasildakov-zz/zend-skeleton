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
use Doctrine\ORM\Tools\Pagination\Paginator as ORMPaginator;
use DoctrineORMModule\Paginator\Adapter\DoctrinePaginator as DoctrineAdapter;

use Zend\Paginator\Paginator as Paginator;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\Session\Container;

use Admin\Form\SystemForm;
use Application\Form\System\Search as SearchForm;


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
            $this->em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
        }
        return $this->em;
    }

    
    
    public function indexAction()
    {
        // Zend framework 2.2.x album example of pagination with search result
        // https://github.com/tahmina8765/zf2_search_with_pagination_example
        // http://zf2pagination.lifencolor.com/public/album

        $decorator = $this->DecoratorPlugin();
        $systemPlugin = $this->SystemPlugin();
        
        $form = new SearchForm();
        $page = $this->params()->fromRoute('page') ? (int) $this->params()->fromRoute('page') : 1;
        
        $request = $this->getRequest();
        if ($request->isPost()) {}

        #$entityManager = $this->getServiceLocator()->get('doctrine.entitymanager.orm_default');
        #$repository = $entityManager->getRepository('Application\Entity\System');
        
        $repository = $this->getEntityManager()->getRepository('Application\Entity\System');
        $adapter = new DoctrineAdapter(new ORMPaginator($repository->createQueryBuilder('system')));
        
        $paginator = new Paginator($adapter);
        $paginator->setDefaultItemCountPerPage(12);

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

    
    public function searchAction() {}
    
    
    
    public function addAction()
    {
        $form = new SystemForm();
        $form->get('submit')->setAttribute('label', 'Add');

        $request = $this->getRequest();
        if ($request->isPost()) {
            $system = new System();
            $form->setInputFilter($system->getInputFilter());
            #$form->setData($request->post());
            $form->setData($request->getPost());
            if ($form->isValid()) {
                $system->populate($form->getData());
                $this->getEntityManager()->persist($album);
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
        $view = new ViewModel(array());
        return $view;
    }
    
    
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