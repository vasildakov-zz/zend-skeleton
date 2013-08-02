<?php
namespace Application\Form\System;

use Doctrine\ORM\EntityManager;
use Zend\Form\Fieldset;
use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class SystemFieldset extends Fieldset implements ServiceLocatorAwareInterface
{
    protected $serviceLocator;

    public function init()
    {
      $em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
        // Here, we have $this->serviceLocator !!
    }

    public function setServiceLocator(ServiceLocatorInterface $sl)
    {
        $this->serviceLocator = $sl;
    }

    public function getServiceLocator()
    {
        return $this->serviceLocator;
    }
}
