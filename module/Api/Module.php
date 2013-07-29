<?php

namespace Api;

use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;

use Zend\Mvc\Router\Http\TreeRouteStack;
use Zend\Http\Request;
use Zend\Mvc\Router\Http\RouteMatch;

class Module
{
    
    
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
    
    
    public function getConfig()
    {
        #return include __DIR__ . '/config/module.config.php';
        $config = array();
        $configFiles = array(
                __DIR__ . '/config/module.config.php',
                __DIR__ . '/config/module.config.routes.php', // Routes
                __DIR__ . '/config/module.config.plugins.php', // Plugins
            );

            // Merge all module config options
            foreach ($configFiles as $configFile) {
                $config = \Zend\Stdlib\ArrayUtils::merge($config, include $configFile);
            }

            return $config;        
    }    
    
    
    public function onBootstrap(MvcEvent $mvcEvent) {
        // http://blog.mrezekiel.com/2012/11/zend-framework-2-rest-api.html
        // http://samsonasik.wordpress.com/2012/10/31/zend-framework-2-step-by-step-create-restful-application/
        
        $serviceManager = $mvcEvent->getApplication()->getServiceManager();
        $sharedEvents = $mvcEvent->getApplication()->getEventManager()->getSharedManager(); 
        
        $sharedEvents->attach(__NAMESPACE__, 'dispatch', function(MvcEvent $mvcEvent) use ($serviceManager) {
            $id = $mvcEvent->getRouteMatch()->getParam('id', null);
            $key = $mvcEvent->getRouteMatch()->getParam('key', null);
            $app = $mvcEvent->getRouteMatch()->getParam('app', null); 
            #print_r($id); exit();
         });
    
        #$response = $e->getResponse();
         #if (!$key || !$app)
             #return $response;
        #$response->setStatusCode(403);

    }
    
}