<?php
// https://github.com/doctrine/DoctrineORMModule/blob/master/docs/configuration.md
// https://github.com/doctrine/DoctrineORMModule/issues/122
// http://symfony.com/doc/current/cookbook/doctrine/multiple_entity_managers.html
// http://dan-homorodean.blogspot.com/2013/03/zf2-with-doctrineormmodule-using.html
return array(
    'doctrine' => array(
        'connection' => array(
            'orm_default' => array(
                'driverClass' => 'Doctrine\DBAL\Driver\PDOMySql\Driver',
                'params' => array(
                    'host' => 'localhost',
                    'port' => '3306',
                    'user' => 'root',
                    'password' => '1',
                    'dbname' => 'zf2tutorial',
                )
            ),
            'orm_customer' => array(
                'driverClass' => 'Doctrine\DBAL\Driver\PDOMySql\Driver',
                'params' => array(
                    'host' => 'localhost',
                    'port' => '3306',
                    'user' => 'root',
                    'password' => '1',
                    'dbname' => 'customer',
                )
            ),                
        )
    )
);