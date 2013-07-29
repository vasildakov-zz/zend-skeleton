<?php

return array(
    'router' => array(
        'routes' => array(
            'admin' => array(
                'type' => 'hostname',
                'options' => array(
                    #'route' => '/api[/:controller][/:action][/:id]',
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
            ),
        ),
    ),
);