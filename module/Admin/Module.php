<?php
namespace Admin;

use Zend\ModuleManager\ModuleManager;

use Zend\Log\Logger;
use Zend\Log\Writer\Stream as LogWriterStream;

use Zend\Session\Config\SessionConfig;
use Zend\Session\SessionManager;
use Zend\Session\Container;

class Module
{
    
    public function init(ModuleManager $moduleManager)
    {
        $sharedEvents = $moduleManager->getEventManager()->getSharedManager();
        $sharedEvents->attach(__NAMESPACE__, 'dispatch', function($e) {
            // This event will only be fired when an ActionController under the Backoffice namespace is dispatched.
            $controller = $e->getTarget();
            // $controller->layout('layout/admin');
            $controller->layout('layout/bootstrap3');
        }, 100);
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
                    'geoip' => __DIR__ . '/../../vendor/geoip/geoip',
                ),                
            ),          
        );
    }

    public function getConfig()
    {
        $config = array();
        $configFiles = array(
                __DIR__ . '/config/module.config.php',
                __DIR__ . '/config/module.config.routes.php', // Routes
                __DIR__ . '/config/module.config.navigation.php', // Navigation
            );

            // Merge all module config options
            foreach ($configFiles as $configFile) {
                $config = \Zend\Stdlib\ArrayUtils::merge($config, include $configFile);
            }

            return $config;        
    } 
}
