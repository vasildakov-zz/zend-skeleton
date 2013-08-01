<?php

namespace Api;

return array(
    'console' => array(
        'router' => array(),
    ),
    'controllers' => array(
        'invokables' => array(
            'Api\Controller\Index' => 'Api\Controller\IndexController',
            'Api\Controller\AlbumRest' => 'Api\Controller\AlbumRestController',
        ),
    ),
    'view_manager' => array(
        'strategies' => array(
            'ViewJsonStrategy',
        ),
    ),
);