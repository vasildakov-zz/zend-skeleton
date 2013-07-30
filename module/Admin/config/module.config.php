<?php
namespace Admin;

return array( 
    'console' => array(
        'router' => array(),
    ),
    'controllers' => array(
        'invokables' => array(
            'Admin\Controller\Index' => 'Admin\Controller\IndexController',
            'Admin\Controller\System' => 'Admin\Controller\SystemController',
            'Admin\Controller\User' => 'Admin\Controller\UserController',
            'Admin\Controller\Theme' => 'Admin\Controller\ThemeController',
        ),
    ),  
    'view_manager' => array(
        'template_path_stack' => array(
            'admin' => __DIR__ . '/../view',
        ),
    ),
);
