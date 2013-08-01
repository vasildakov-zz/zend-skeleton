<?php

namespace Backoffice;

return array(
    'session' => array(
       'config'     => array(
            'class'   => 'Zend\Session\Config\SessionConfig',
            'options' => array(
                'name'            => 'backoffice',
                'save_path'       => __DIR__ . '/../../data/session',
                'use_cookies'     => false,
                'cookie_lifetime' => 0,
                'cookie_httponly' => true,
                'cookie_secure'   => false,
                'remember_me_seconds' => 1800,
                'gc_maxlifetime'  => 3600,
            )
        ),
        'storage'    => 'Zend\Session\Storage\SessionArrayStorage',
        'validators' => array(
            array(
                'Zend\Session\Validator\RemoteAddr',
                'Zend\Session\Validator\HttpUserAgent'
            ),
        ),
    ),
);