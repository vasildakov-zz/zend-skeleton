<?php
namespace Backoffice;

return array(
    /**
    * Remove this configuration once ZF 2.2.2 is released.
    * @See https://github.com/zendframework/zf2/pull/4652
    */    
    'console' => array(
        'router' => array(),
    ),
    'controllers' => array(
        'invokables' => array(
            'Backoffice\Controller\Index' => 'Backoffice\Controller\IndexController',
            'Backoffice\Controller\User' => 'Backoffice\Controller\UserController',
            'Backoffice\Controller\Site' => 'Backoffice\Controller\SiteController',
            'Backoffice\Controller\Auth' => 'Backoffice\Controller\AuthController',
        ),
    ),  
    'view_manager' => array(
        'template_path_stack' => array(
            'backoffice' => __DIR__ . '/../view',
        ),
    ),
    'service_manager' => array(
        'invokables' => array(
            #'greetingService' => 'Backoffice\Service\GreetingService',
            'loggingService'  => 'Backoffice\Service\LoggingService'
        ),
        'factories' => array(
            'translator' => 'Zend\I18n\Translator\TranslatorServiceFactory',
            'navigation' => 'Zend\Navigation\Service\DefaultNavigationFactory',
            'secondary_navigation' => 'Backoffice\Service\SecondaryNavigationFactory',
            'greetingService' => 'Backoffice\Service\GreetingServiceFactory',
            'authService' => 'Backoffice\Service\AuthServiceFactory',
            'Zend\Db\Adapter\Adapter' => function ($sm) {
                $config = $sm->get('Config');
                $dbParams = $config['dbParams'];
                return new Zend\Db\Adapter\Adapter(array(
                    'driver'    => 'pdo',
                    'dsn' =>
                        'mysql:dbname='.$dbParams['database'].';host='.$dbParams['hostname'],
                        'database' => $dbParams['database'],
                        'username' => $dbParams['username'],
                        'password' => $dbParams['password'],
                        'hostname' => $dbParams['hostname'],                    
                ));
            },
            'Backoffice\Mapper\Host' => function ($sm) {
                return new \Helloworld\Mapper\Host(
                    $sm->get('Zend\Db\Adapter\Adapter')
                );
            },
            'Backoffice\Service\AuthService' => 'Backoffice\Service\AuthServiceFactory'        
        ),        
    ),
    'translator' => array(
        'locale' => 'en',
        'translation_file_patterns' => array(
            
        )
    ),
    // Doctrine config
    'doctrine' => array(
        'driver' => array(
            // __NAMESPACE__ . '_driver' => array(
                'Backoffice_driver' => array(
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                // 'paths' => array(__DIR__ . '/../src/' . __NAMESPACE__ . '/Entity')
                'paths' => array(__DIR__ . '/../src/Backoffice/Entity')
            ),
            'orm_default' => array(
                'drivers' => array(
                    // __NAMESPACE__ . '\Entity' => __NAMESPACE__ . '_driver'
                    'Backoffice\Entity' => 'Backoffice_driver'
                ),
            ),
        ),
    ),
);