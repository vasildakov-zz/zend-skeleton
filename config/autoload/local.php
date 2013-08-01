<?php
$dbParams = array(
    'database'  => 'zf2tutorial',
    'username'  => 'root',
    'password'  => '1',
    'hostname'  => 'localhost',
    'port'      => '3306',
    // buffer_results - only for mysqli buffered queries, skip for others
    'options' => array(
        'buffer_results' => true
        )
);

return array(
    'service_manager' => array(
        'factories' => array(
            'Zend\Db\Adapter\Adapter' => function ($sm) use ($dbParams) {
                $adapter = new BjyProfiler\Db\Adapter\ProfilingAdapter(array(
                    'driver'    => 'pdo',
                    'dsn'       => 'mysql:dbname='.$dbParams['database'].';host='.$dbParams['hostname'],
                    'database'  => $dbParams['database'],
                    'username'  => $dbParams['username'],
                    'password'  => $dbParams['password'],
                    'hostname'  => $dbParams['hostname'],
                ));

                $adapter->setProfiler(new BjyProfiler\Db\Profiler\Profiler);
                if (isset($dbParams['options']) && is_array($dbParams['options'])) {
                    $options = $dbParams['options'];
                } else {
                    $options = array();
                }
                $adapter->injectProfilingStatementPrototype($options);
                return $adapter;
            },
        ),
    ),    
    'doctrine' => array(
        'connection' => array(
            'orm' => array(
                'default' => array(
                    'driverClass' => 'Doctrine\DBAL\Driver\PDOMySql\Driver',
                    'params' => array(
                        'host'     => $dbParams['hostname'],
                        'port'     => $dbParams['port'],
                        'user'     => $dbParams['username'],
                        'password' => $dbParams['password'],
                        'dbname'   => $dbParams['database'],
                    )
                )
            )
        )
    ),   
    'db' => array(
        'username' => 'root',
        'password' => '2',
    ),
);

