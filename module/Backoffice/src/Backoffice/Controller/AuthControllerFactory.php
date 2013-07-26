<?php
// module/Backoffice/src/Backoffice/Controller/AuthControllerFactory.php

namespace Backoffice\Controller;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class AuthControllerFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $ctr = new AuthController();
        $ctr->setLoginForm(new \Backoffice\Form\Login());

        $ctr->setAuthService($serviceLocator->getServiceLocator()->get('Backoffice\Service\AuthService'));

        return $ctr;
    }
}