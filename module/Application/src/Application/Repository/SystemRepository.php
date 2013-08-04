<?php
// Repository/SystemRepository.php
namespace Application\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Tools\Pagination\Paginator;

class SystemRepository extends EntityRepository
{
	#private $offset;

	#private $limit;

	public function getAllOwners() {}

	public function getAllUsers() {}
	

    public function getPaginator($offset, $limit)
    {
    	$dql = "SELECT s FROM Application\Entity\System s";
    	$query = $this->_em->createQuery($dql)
    	->setFirstResult($offset)->setMaxResults($limit);

    	$paginator = new Paginator($query);;
    	return $paginator;

    	#return $query->getResult();
	    #$paginator = new Paginator($query);

	    #return $query->getResult();

    	/* $q = $this->_em->createQuery()
				    	->setFirstResult(0)
				    	->setMaxResults(5)
				    	->getResult(); */
    }

    public function getOwner() {
    	//return $this->getId();
    }
}
