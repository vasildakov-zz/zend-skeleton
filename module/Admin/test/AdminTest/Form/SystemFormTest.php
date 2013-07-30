<?php
// http://simpletest.org/api/SimpleTest/tutorial_FormTesting.pkg.html
// https://github.com/zendframework/zf2/blob/master/tests/ZendTest/Form/FormTest.php
// http://zf2.readthedocs.org/en/latest/tutorials/unittesting.html

namespace AdminTest\Form;

use AdminTest\Bootstrap;

use Zend\Mvc\Router\Http\TreeRouteStack as HttpRouter;

use Admin\Form\SystemForm;

use Zend\Http\Request;
use Zend\Http\Response;

use Zend\Mvc\MvcEvent;
use Zend\Mvc\Router\RouteMatch;
use PHPUnit_Framework_TestCase;

class SystemFormTest extends \PHPUnit_Framework_TestCase {
    
    protected $form;
    
    protected function setUp()
    {
         $this->form = new SystemForm();
    }
    
    public function testSystemFormCanBeAccessed() {
        
        $this->assertTrue($this->form instanceof SystemForm);
    }
    
    public function testA() 
    {
        #$this->assertFalse($this->setField('type', 'Superuser'));
        #$this->assertEquals(1, 1);
    }
}