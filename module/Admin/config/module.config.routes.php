<?php
/**
 * Subdomain based route with child routes
 * See: A complex example with child routes
 * http://framework.zend.com/manual/2.0/en/modules/zend.mvc.routing.html
 */
namespace Admin;

return array(
    'router' => array(
        'routes' => array(
            'admin' => array(
                'type' => 'hostname',
                'options' => array(
                    'route' => 'admin.zend-skeleton.dev',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id' => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Admin\Controller\Index',
                        'action' => 'index',
                    ),
                ),
                'child_routes' => array(
                    'home' => array(
                        'type' => 'segment',
                        'options' => array(
                            'route' => '/',
                            'defaults' => array(
                                'controller' => 'Admin\Controller\Index',
                                'action' => 'index'
                            )
                        ),                    
                    ),  
                    'system' => array(
                        'type' => 'segment',
                        'options' => array(
                            'route' => '/system[/:action][/:id]',
                            'defaults' => array(
                                'controller' => 'Admin\Controller\System',
                                'action' => 'index'
                            )
                        ),                    
                    ),   
                    'user' => array(
                        'type' => 'segment',
                        'options' => array(
                            'route' => '/user[/:action][/:id]',
                            'defaults' => array(
                                'controller' => 'Admin\Controller\User',
                                'action' => 'index'
                            )
                        ),                    
                    ),                       
                    'theme' => array(
                        'type' => 'segment',
                        'options' => array(
                            'route' => '/theme[/:action][/:id]',
                            'defaults' => array(
                                'controller' => 'Admin\Controller\Theme',
                                'action' => 'index'
                            )
                        ),                    
                    ),                    
                ),
            ),    
        ),
    ),
);