<?php

namespace Admin\Model;

class Test {

	private $customer;





	public function setConfig() 
	{
		$this->config = array(
            'host' => 'localhost', 
            'driver' => 'Pdo_Mysql', 
            'database' => 'test',
            'username' => 'root',
            'password' => '1'
        );
	}


	public function getConfig() 
	{
		return $this->config;
	}



	public function createDatabase($customer) 
	{
		$sql = "CREATE DATABASE customer_db";
	}



	public function createDatabaseUser($database) 
	{
		$sql = "CREATE USER 'user_name'@'%' IDENTIFIED BY 'pass_word'";
	}


	public function grandDatabasePrivileges($database, $user) 
	{
		$sql = "GRANT ALL PRIVILEGES on `new_db`.* TO 'user_name'@'%'";
	}



	public function testDatabase() 
	{
		$config = array(
            'host' => 'localhost', 
            'driver' => 'Pdo_Mysql', 
            'database' => 'test',
            'username' => 'root',
            'password' => '1'
        );

        $adapter = new Adapter($config);
        # $sql = "SHOW COLUMNS FROM view_user";
        # http://stackoverflow.com/questions/6960630/php-script-automatically-creating-mysql-database
        $sql = "CREATE DATABASE customer_db";
        #$pdo->query("CREATE USER 'user_name'@'%' IDENTIFIED BY 'pass_word';");
        #$pdo->query("CREATE DATABASE `new_db`;");
        #$pdo->query("GRANT ALL PRIVILEGES on `new_db`.* TO 'user_name'@'%';");

        $statement = $adapter->query($sql);
        $results = $statement->execute();
        foreach ($results as $row) {
            echo '<pre>'; print_r($row); echo '</pre>';
        }			
	}

	public function doSomething() 
	{
		return 'Test::doSomething';
	}

}