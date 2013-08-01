<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Conversion
 *
 * @ORM\Table(name="conversion")
 * @ORM\Entity
 */
class Conversion
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
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }
}