<?php
namespace Backoffice;

return array(
    'navigation' => array(
        'secondary' => array(
            array(
                'label' => 'Dashboard',
                'route' => 'backoffice',
                'pages' => array(
                    array(
                        'label' => 'User',
                        'route' => 'user', 
                        'pages' => array(
                            array(
                                'label' => 'Edit',
                                'controller' => 'user',
                                'action' => 'edit',
                                'route' => 'edit', 
                            ),
                        ),
                    ),
                    array(
                        'label' => 'Site',
                        'route' => 'site',                        
                    )
                ),
            )
        ),
    ),
);