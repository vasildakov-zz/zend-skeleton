<?php

namespace ApplicationTest\Controller;

use Zend\Test\PHPUnit\Controller\AbstractHttpControllerTestCase;

class IndexControllerTest extends AbstractHttpControllerTestCase
{
    public function setUp()
    {
        $this->setApplicationConfig(
            include '/path/to/application/config/test/application.config.php'
        );
        parent::setUp();
    }
	
	public function testIndexActionCanBeAccessed()
	{
		$this->dispatch('/');
		$this->assertResponseStatusCode(200);

		$this->assertModule('application');
		$this->assertControllerName('application_index');
		$this->assertControllerClass('IndexController');
		$this->assertMatchedRouteName('home');
	}	
}
