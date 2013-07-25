<?php
namespace Backoffice;

return array(
    'controllers' => array(
        'invokables' => array(
            'Backoffice\Controller\Index' => 'Backoffice\Controller\IndexController',
        ),
    ),
    // The following section is new and should be added to your file
    'router' => array(
        'routes' => array(
            'backoffice' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/backoffice[/:action][/:id]',
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
        ),
    ),    
    'view_manager' => array(
        'template_path_stack' => array(
            'backoffice' => __DIR__ . '/../view',
        ),
    ),
);