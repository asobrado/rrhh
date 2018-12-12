<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Provincia
 *
 * @ORM\Table(name="cargos")
 * @ORM\Entity()
 */
class Cargo
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
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="Empleado", mappedBy="cargo")
     */
    private $cargos;

    
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
     * Constructor
     */
    public function __construct()
    {
        $this->cargos = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add cargo
     *
     * @param \AppBundle\Entity\Empleado $cargo
     *
     * @return Cargo
     */
    public function addCargo(\AppBundle\Entity\Empleado $cargo)
    {
        $this->cargos[] = $cargo;

        return $this;
    }

    /**
     * Remove cargo
     *
     * @param \AppBundle\Entity\Empleado $cargo
     */
    public function removeCargo(\AppBundle\Entity\Empleado $cargo)
    {
        $this->cargos->removeElement($cargo);
    }

    /**
     * Get cargos
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCargos()
    {
        return $this->cargos;
    }

    public function __toString()
    {
      return $this->getNombre();
    }
}
