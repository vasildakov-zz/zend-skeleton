<?php

return array(
   'router' => array(
        'routes' => array(
            'api' => array(
                'type' => 'hostname',
                'options' => array(
                    #'route' => '/api[/:controller][/:action][/:id]',
                    'route' => 'api.zend-skeleton.dev',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id' => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Api\Controller\Index',
                        'action' => 'index',
                    ),
                ),
            ),
            'api-album' => array(
                'type' => 'Literal',
                'options' => array(
                    // 'route' => '/api/key[/:key]/album/id[/:id]',
                    'route' => '/api/album?id[/:id]',
                    'constraints' => array(
                        //'id' => '[0-9]+',
                        //'key' => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Api\Controller\AlbumRest',
                    ),
                ),
                'may_terminate' => true,
                'child_routes'  => array(
                    'query' => array(
                        'type' => 'Query',
                    )
                ),
            ),
        ),
    ),    
);