<?php
namespace Admin;

return array( 
    'console' => array(
        'router' => array(),
    ),
    'session' => array(
        'remember_me_seconds' => 2419200,
        'use_cookies' => true,
        'cookie_httponly' => true,        
    ),
    'controllers' => array(
        'invokables' => array(
            'Admin\Controller\Index' => 'Admin\Controller\IndexController',
            'Admin\Controller\System' => 'Admin\Controller\SystemController',
            'Admin\Controller\User' => 'Admin\Controller\UserController',
            'Admin\Controller\Theme' => 'Admin\Controller\ThemeController',
        ),
    ),  
    'service_manager' => array(
        'services' => array(
        ),
    ),    
    'view_manager' => array(
        'template_path_stack' => array(
            'admin' => __DIR__ . '/../view',
        ),
    ),
    
    'maxmind' => array(
        'database' => array(
            'source' => 'http://geolite.maxmind.com/download/geoip/database/GeoLiteCity.dat.gz',
            'destination' => __DIR__ . '/../data/',
            'filename' => 'GeoLiteCity.dat',
            'flag' => 'GEOIP_STANDARD',
            'regionvars' => __DIR__ .'/../../../vendor/geoip/geoip/geoipregionvars.php',
        ),
    ),        
);
