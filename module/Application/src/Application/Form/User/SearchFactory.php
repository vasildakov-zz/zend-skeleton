<?php
// Application/Form/User/SearchFactory.php
// Test
namespace Application\Form\User;
 
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

use Application\Form\User\Search;
 
class SearchFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $form = new Search;
        $form->setServiceLocator($serviceLocator->getServiceLocator());
 
        #EXAMPLE
        #$config = $form->getServiceLocator()->get('Config');
        #$form->get('email')->setValue($config['email']);
 
        return $form;
    }
}