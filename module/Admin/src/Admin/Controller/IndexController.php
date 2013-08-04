<?php
// module/Admin/src/Admin/Controller/IndexController.php

namespace Admin\Controller;

require_once 'vendor/geoip/geoip/geoip.php';
require_once 'vendor/geoip/geoip/geoipcity.php';
require_once 'vendor/geoip/geoip/geoipregionvars.php';

        
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\Session\Container;

use GoogleMaps;
use GoogleMaps\Request;
use GoogleMaps\Response;
use GoogleMaps\Geocoder;

use Zend\Db\Sql\Sql;
use Zend\Db\Sql\Query;
use Zend\Db\Adapter\Adapter;
use Zend\Db\Adapter\Driver\ResultInterface;
use Zend\Db\ResultSet\ResultSet;

use Admin\Model\Test;

use Zend\Permissions\Acl\Acl;
use Zend\Permissions\Acl\Role\GenericRole as Role;
use Zend\Permissions\Acl\Resource\GenericResource as Resource;


class IndexController extends AbstractActionController
{
    #protected $albumTable;
    
    #private $greetingService;
    
    #private $authService;


    private function getUserSearchForm() 
    {
        return new \Application\Form\User\Search();
    }


    public function indexAction()
    {   
        // http://framework.zend.com/manual/2.0/en/modules/zend.permissions.acl.intro.html
        $acl = new Acl();

        $acl->addRole(new Role('guest'))
            ->addRole(new Role('manager'))
            ->addRole(new Role('affiliate'))
            ->addRole(new Role('owner'))
            ->addRole(new Role('admin'));

        $acl->addResource(new Resource('someResource'));

        $controller = $this->params()->fromRoute('controller');
        $action = $this->params()->fromRoute('action');

        echo '<h3>Controller: '; print_r($controller); echo '</h3>';
        echo '<h3>Action: '; print_r($action); echo '</h3>';

        
        $acl->allow('admin', null, 'index');
        $acl->deny('guest', null, array('index', 'edit'));

        // $acl->isAllowed(role, controller, action)        
        echo '<p>Admin: '; echo $acl->isAllowed('admin', null, 'index') ? "allowed" : "denied";             
        echo '<p>Guest: '; echo $acl->isAllowed('guest', null, 'index') ? "allowed" : "denied";





        #print_r($form);

        #$dbModel = new Test;
        #print_r( $dbModel->doSomething() );
        


        // see Admin/config/module.config.php
        #$config = $this->getServiceLocator()->get('Config');
        #$pwht = $config['auth']['password_hash_type'];
        #print_r($config['db']);
        
        
        
        #$address = '1600 Amphitheatre Parkway, Mountain View, CA';
        #$request = new Request();
        #$request->setAddress($address);
        #$proxy = new Geocoder();
        #$response = $proxy->geocode($request);
        #echo '<pre>'; var_dump($response); echo '</pre>';     
        
        
        #$entityManager = $this->getServiceLocator()->get('doctrine.entitymanager.orm.default');
        #$repository = $entityManager->getRepository('Application\Entity\User');
        #$adapter = new DoctrineAdapter(new ORMPaginator($repository->createQueryBuilder('user')));
        
        $view = new ViewModel(array(
            'message' => 'Admin/Index',
            'test' => '',
            'form' => $this->getUserSearchForm()
        ));
        
        return $view;
    }


    public function testSql() {
        $config = array(
            'host' => 'localhost',
            'driver'   => 'Pdo_Mysql',
            'database' => 'test',
            'username' => 'root',
            'password' => '1'
        );

        $adapter = new Adapter($config);
        $sql = new Sql($adapter);
        $query = $sql->select()->from('view_user')->where(array('id' => 58));

        $statement = $sql->prepareStatementForSqlObject($query);
        $results = $statement->execute();
        foreach ($results as $row) {
            echo '<pre>'; print_r($row); echo '</pre>';
        }
    }


    public function testGeoIp() {
        // just a geoip test
        $ip = "213.165.176.146";
        $gi = geoip_open("data/GeoIP.dat", GEOIP_STANDARD);
        $gc = geoip_open("data/GeoLiteCity.dat", GEOIP_STANDARD);     
        #print_r(geoip_record_by_addr($gc, $ip) );
        #echo geoip_country_code_by_addr($gi, $ip) . "\t";        
    }


}
