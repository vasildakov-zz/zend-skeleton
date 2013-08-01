<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Campaign
 *
 * @ORM\Table(name="campaign")
 * @ORM\Entity
 */
class Campaign
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     */
    private $name;

    /**
     * @var integer
     *
     * @ORM\Column(name="system_id", type="integer", nullable=false)
     */
    private $systemId;



    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Campaign
     */
    public function setName($name)
    {
        $this->name = $name;
    
        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set systemId
     *
     * @param integer $systemId
     * @return Campaign
     */
    public function setSystemId($systemId)
    {
        $this->systemId = $systemId;
    
        return $this;
    }

    /**
     * Get systemId
     *
     * @return integer 
     */
    public function getSystemId()
    {
        return $this->systemId;
    }
}