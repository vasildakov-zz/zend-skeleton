<?php
// Application/Form/User/SearchService.php
// Test
namespace Application\Form\User;
 
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

use Application\Form\User\Search;
 
class SearchService
{
    public function getForm()
    {
        $form = new Search;
        return $form;
    }
}