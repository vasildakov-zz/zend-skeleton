<?php
// ../module/Backoffice/Module.php

namespace Backoffice;

use Backoffice\Model\User;
use Backoffice\Model\UserTable;

use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;

use Zend\I18n\Translator\Translator;
use Zend\Validator\AbstractValidator;

use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;

use Zend\ModuleManager\ModuleManager;

class Module
{
    
    public function init(ModuleManager $moduleManager)
    {
        // http://blog.evan.pro/module-specific-layouts-in-zend-framework-2
        $sharedEvents = $moduleManager->getEventManager()->getSharedManager();
        $sharedEvents->attach(__NAMESPACE__, 'dispatch', function($e) {
            // This event will only be fired when an ActionController under the Backoffice namespace is dispatched.
            $controller = $e->getTarget();
            $controller->layout('layout/backoffice');
        }, 100);
    }
    
    
    public function onBootstrap(MvcEvent $e)
    {
        $application = $e->getApplication();
        $serviceManager = $application->getServiceManager();
        $translator = $serviceManager->get('translator');
        
        $eventManager        = $e->getApplication()->getEventManager();
        $moduleRouteListener = new ModuleRouteListener();
        $moduleRouteListener->attach($eventManager);
    }
    

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    
    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\ClassMapAutoloader' => array(
                __DIR__ . '/autoload_classmap.php',
            ),
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }
    
    
    public function getServiceConfig() {
        return array(
            'factories' => array(
                'Backoffice\Model\UserTable' =>  function($sm) {
                    $tableGateway = $sm->get('UserTableGateway');
                    $table = new UserTable($tableGateway);
                    return $table;
                },
                'UserTableGateway' => function ($sm) {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new User());
                    return new TableGateway('user', $dbAdapter, null, $resultSetPrototype);
                },
            ),
        );
        
    }

}
