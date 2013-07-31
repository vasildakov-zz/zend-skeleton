<?php
/**
 * SystemPlugin
 * 
 * @author Vasil Dakov
 * http://docs.doctrine-project.org/en/2.0.x/reference/working-with-objects.html
 * 
 */

namespace Application\Controller\Plugin;

use Zend\Mvc\Controller\Plugin\AbstractPlugin;

#use Zend\EventManager\EventInterface as Event;
#use Zend\Authentication\AuthenticationService;

#use Doctrine\ORM\EntityManager;
#use Application\Entity\User;
#use Zend\Mvc\MvcEvent;

#use Zend\ServiceManager\ServiceManagerAwareInterface;
#use Zend\ServiceManager\ServiceManager;


class SystemPlugin extends AbstractPlugin {

    #protected $em;

    #protected $sm;
    
    

    public function getEntityManager() 
    {
        return $this->getController()->getServiceLocator()->get('Doctrine\ORM\EntityManager');
    }
      
    
    public function getOwnerName($system)
    {
        #return $system_id;
       
        #$em = $this->getController()->getServiceLocator()->get('Doctrine\ORM\EntityManager');
        #$this->getEntityManager()->getRepository('Subject\Entity\User');       
        #$em =  $this->getController()->getServiceLocator()->get('Doctrine\ORM\EntityManager');
        
        $repository = $this->getEntityManager()->getRepository('Application\Entity\User');
        $user = $repository->findOneBy(array('system' => $system, 'role' => 1));
        return ($user) ? $user->getFirstName().' '.$user->getLastName() : '-' ;
    }
    
    public function countSystemUsers($system) {
        
        $repository = $this->getEntityManager()->getRepository('Application\Entity\User');
        $users = $repository->findBy(array('system' => $system));
        return ($users) ? count($users) : 0;
    }
    

    
    /* public function getEntityManager() 
    {
        if (null === $this->em) {
            $this->em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
        }
        return $this->em;
    }
    
    
    public function setEntityManager(EntityManager $em) 
    {
        $this->em = $em;
    }
    
    
    public function getServiceManager()
    {
        return $this->sm->getServiceLocator();
    }    
    
    public function setServiceManager(ServiceManager $serviceManager)
    {
        $this->sm = $serviceManager;
    }     */
}