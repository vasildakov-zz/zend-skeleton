<?php
namespace Backoffice;

return array(
    // The following section is new and should be added to your file
    'router' => array(
        'routes' => array(
            /* 'bwin' => array(
                'type'    => 'hostname',
                'options' => array(
                    'route' => ':zend-skeleton.dev',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id' => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Backoffice\Controller\Index',
                        'action'     => 'index',
                    ),                    
                ),
            ), */
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
);