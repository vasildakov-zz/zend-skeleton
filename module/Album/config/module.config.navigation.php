<?php
namespace Album;

return array(
    'navigation' => array(
        'album_navigation' => array(
            array(
                'label' => 'Home',
                'route' => 'home',
            ),      
           array(
                'label' => 'Album',
                'route' => 'album',
                'pages' => array(
                    'index' => array(
                        'label' => 'Index',
                        'module' => 'album',
                        'controller' => 'album',
                        'action' => 'index',                        
                    ),
                    'edit' => array(
                        'label' => 'Edit',
                        'module' => 'album',
                        'controller' => 'album',
                        'action' => 'edit',                        
                    ),                    
                ),
            ),         
        ),
    ),  
);