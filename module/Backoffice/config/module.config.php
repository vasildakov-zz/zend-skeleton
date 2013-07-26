<?php
namespace Backoffice;

return array(
    'controllers' => array(
        'invokables' => array(
            'Backoffice\Controller\Index' => 'Backoffice\Controller\IndexController',
            'Backoffice\Controller\User' => 'Backoffice\Controller\UserController',
            'Backoffice\Controller\Site' => 'Backoffice\Controller\SiteController',
            'Backoffice\Controller\Auth' => 'Backoffice\Controller\AuthController',
        ),
    ),
    // The following section is new and should be added to your file
    'router' => array(
        'routes' => array(
            'backoffice' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/backoffice[/:controller][/:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Backoffice\Controller\Index',
                        'action'     => 'index',
                    ),
                ),
            ),
            'login' => array(
                'type'    => 'Literal',
                'options' => array(
                    'route'    => '/backoffice/auth/login',
                    'defaults' => array(
                        'controller'    => 'Backoffice\Controller\Auth',
                        'action'        => 'login',
                    ),
                ),
            ),
            'logout' => array(
                'type'    => 'Literal',
                'options' => array(
                    'route'    => '/backoffice/auth/logout',
                    'defaults' => array(
                        'controller'    => 'Backoffice\Controller\Auth',
                        'action'        => 'logout',
                    ),
                ),
            ),            
            'user' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/backoffice/user[/:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Backoffice\Controller\User',
                        'action'     => 'index',
                    ),
                ),                
            ),
            'site' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/backoffice/site[/:action][/:id]',
                    'defaults' => array(
                        'controller'    => 'Backoffice\Controller\Site',
                        'action'        => 'index',
                    ),
                ),
            ),             
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
            'greetingService' => 'Backoffice\Service\GreetingServiceFactory',
            'authService' => 'Backoffice\Service\AuthServiceFactory',
            'Zend\Db\Adapter\Adapter' => function ($sm) {
                $config = $sm->get('Config');
                $dbParams = $config['dbParams'];
                return new Zend\Db\Adapter\Adapter(array(
                    'driver'    => 'pdo',
                    'dsn' =>
                        'mysql:dbname='.$dbParams['database']
                        .';host='.$dbParams['hostname'],
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
            __NAMESPACE__ . '_driver' => array(
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                'paths' => array(__DIR__ . '/../src/' . __NAMESPACE__ . '/Entity')
            ),
            'orm_default' => array(
                'drivers' => array(
                    __NAMESPACE__ . '\Entity' => __NAMESPACE__ . '_driver'
                )
            )
        )
    )     
);