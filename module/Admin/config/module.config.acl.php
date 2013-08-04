<?php
// Admin/config/module.config.acl.php
// The ACL for Module Admin

return array(
    'acl' => array(
        'roles' => array(
            'guest'   => null,
            'member'  => 'guest'
        ),
        'resources' => array(
            'allow' => array(
                'user' => array(
                    'login' => 'guest',
                    'all'   => 'member'
                )
            )
        )
    )
);
