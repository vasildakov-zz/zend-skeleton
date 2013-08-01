<?php
// module/Api/src/Api/Controller/IndexController.php

namespace Api\Controller;

use Zend\Mvc\Controller\AbstractRestfulController;
#use Album\Model\Album;
#use Album\Form\AlbumForm;
#use Album\Model\AlbumTable;
use Zend\View\Model\JsonModel;
use Zend\Http\Request;

class IndexController extends AbstractRestfulController
{
    
    
    public function indexAction()
    {   
        // http://zend-skeleton/api?table=album&bar=foo&dir=yes&slug=123
        
        $plugin = $this->plugin('MyFirstPlugin');
        $test = $plugin->doSomething();     

        
        return new JsonModel(
            array(
                'table' => $this->params()->fromQuery('table', null),
                'bar' => $this->params()->fromQuery('bar', null),
                ) 
            );    
    }
    
    public function getList() {}
    
    public function get($id) {}
    
    public function create($data) {}
    
    public function update($id, $data) {}
    
    public function delete($id) {}
    
    
            
    
}