<?php
namespace Album;

return array(
    'controllers' => array(
        'invokables' => array(
            'Album\Controller\Album' => 'Album\Controller\IndexController',
        ),
    ),   
    'service_manager' => array(
        'nav' => 'Zend\Navigation\Service\DefaultNavigationFactory',
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            'album' => __DIR__ . '/../view',
        ),
    ),   
);