<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Provincia
 *
 * @ORM\Table(name="movimientos")
 * @ORM\Entity()
 */
class Movimiento
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=100)
     */
    private $nombre;

    /**
     * @var Cargo
     * @ORM\ManyToOne(targetEntity="subsidio", inversedBy="movimientos")
     * @ORM\JoinColumn(name="subsidio_id", nullable=true)
     */
    private $subsidio;
    
    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     *
     * @return Provincia
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
    }



    /**
     * Set subsidio
     *
     * @param \AppBundle\Entity\subsidio $subsidio
     *
     * @return Movimiento
     */
    public function setSubsidio(\AppBundle\Entity\subsidio $subsidio = null)
    {
        $this->subsidio = $subsidio;

        return $this;
    }

    /**
     * Get subsidio
     *
     * @return \AppBundle\Entity\subsidio
     */
    public function getSubsidio()
    {
        return $this->subsidio;
    }
}
