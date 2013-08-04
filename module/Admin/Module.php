<?php
namespace Admin;

use Zend\ModuleManager\ModuleManager;

use Zend\Log\Logger;
use Zend\Log\Writer\Stream as LogWriterStream;

use Zend\Session\Config\SessionConfig;
use Zend\Session\SessionManager;
use Zend\Session\Container;

use Zend\Mvc\MvcEvent;

use Zend\ModuleManager\Feature\AutoloaderProviderInterface,
    Zend\ModuleManager\Feature\ConfigProviderInterface,
    Zend\ModuleManager\Feature\ViewHelperProviderInterface;


class Module implements AutoloaderProviderInterface, ConfigProviderInterface, ViewHelperProviderInterface
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
    

    public function onBootstrap(MvcEvent $e) 
    {
        #exit('onBootstrap');
        $eventManager = $e->getApplication()->getEventManager();
        $eventManager->attach(MvcEvent::EVENT_DISPATCH, array($this, 'preDispatch'),1);
    }


    // http://overmind.ws/blog/2013/05/20/zend-framework-2-predispatch/
    // http://4zend.com/zend-framework-2-module-predispatch-and-redirect-2/
    public function preDispatch(MvcEvent $e)
    {
        #exit('preDispatch');
    }


    public function getServiceConfig()
    {
        return array(
            'abstract_factories' => array(),
            'aliases' => array(),
            'factories' => array(
                
            ),
            'invokables' => array(
                'searchService' =>  'Application\Form\User\SearchService'
                ),
            'services' => array(),
            'shared' => array(),
        );

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
                __DIR__ . '/config/module.config.php', // Defaults
                __DIR__ . '/config/module.config.routes.php', // Routes
                __DIR__ . '/config/module.config.navigation.php', // Navigation
            );

        // Merge all module config options
        foreach ($configFiles as $configFile) {
            $config = \Zend\Stdlib\ArrayUtils::merge($config, include $configFile);
        }

        return $config;        
    } 



    public function getViewHelperConfig()
    {
        return array(
            'factories' => array(
                'TestHelper' => function($sm) {
                    $helper = new \Application\View\Helper\TestHelper();
                    return $helper;
                }
            )
        );  
    }

}
