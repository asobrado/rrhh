<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Provincia
 *
 * @ORM\Table(name="subsidios")
 * @ORM\Entity()
 */
class Subsidio
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
     * @ORM\OneToMany(targetEntity="Movimiento", mappedBy="subsidio")
     */
    private $movimientos;

    /**
     * @var Cargo
     * @ORM\ManyToOne(targetEntity="Institucion", inversedBy="subdisios")
     * @ORM\JoinColumn(name="institucion_id", nullable=true)
     */
    private $institucion;


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
        $this->movimientos = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add movimiento
     *
     * @param \AppBundle\Entity\Movimiento $movimiento
     *
     * @return Subsidio
     */
    public function addMovimiento(\AppBundle\Entity\Movimiento $movimiento)
    {
        $this->movimientos[] = $movimiento;

        return $this;
    }

    /**
     * Remove movimiento
     *
     * @param \AppBundle\Entity\Movimiento $movimiento
     */
    public function removeMovimiento(\AppBundle\Entity\Movimiento $movimiento)
    {
        $this->movimientos->removeElement($movimiento);
    }

    /**
     * Get movimientos
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMovimientos()
    {
        return $this->movimientos;
    }
}
