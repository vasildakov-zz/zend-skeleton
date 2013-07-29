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
        $id = 53;
        
        /* using DQL*/
        $em = $this->getServiceLocator()->get('doctrine.entitymanager.orm_default');
        #$qb = $em->createQueryBuilder()->select(array('u', 's'))->from('Backoffice\Entity\User', 'u')->where('u.id = 53')->leftJoin('u.site', 's');
        $qb = $em->createQueryBuilder()->select(array('u', 's'))->from('Backoffice\Entity\User', 'u')->where('u.id = 53')->leftJoin('u.site', 's');
        $query = $qb->getQuery();
        #$results = $query->getResult();
         $results = $query->getArrayResult(); 
        echo '<pre>';print_r($results); echo '</pre>';


        $em = $this->getServiceLocator()->get('doctrine.entitymanager.orm_default');
        $data = $em->getRepository('Backoffice\Entity\Site')->findAll();
        
        #$user = $em->find('Backoffice\Entity\User', $id);
        #print_r($user->getUsername());
        
        foreach($data as $key => $row)
        {
            $url = $row->getUrl();
            $username = $row->getUser()->getUsername();
            
            //print_r(array($url, $username));
            //echo '<br />';
        }        
        /* return new ViewModel(array(
            'sites' => 
                $this->getSiteTable()->fetchAll(),
        )); */       
    }
}