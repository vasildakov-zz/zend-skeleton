<?php
namespace Backoffice\Model;

use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Sql\Select;

use Zend\Paginator\Adapter\DbSelect;
use Zend\Paginator\Paginator;

class SiteTable
{
    protected $tableGateway;

    public function __construct(TableGateway $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }

    public function fetchAll($paginated = false)
    {
        if($paginated) {
            // create a new Select object for the table site
            $select = new Select('site');
            
            // create a new result set based on the Site entity
            $resultSetPrototype = new ResultSet();
            $resultSetPrototype->setArrayObjectPrototype(new Site());
            
            // create a new pagination adapter object
            $paginatorAdapter = new DbSelect(
                // our configured select object
                $select,
                // the adapter to run it against
                $this->tableGateway->getAdapter(),
                // the result set to hydrate
                $resultSetPrototype
            );
            $paginator = new Paginator($paginatorAdapter);
            return $paginator;            
        }
        $resultSet = $this->tableGateway->select();
        return $resultSet;
    }
    
}