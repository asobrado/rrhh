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
     * @var \DateTime $fecha
     *
     * @ORM\Column(name="fecha_inicio", type="datetime", nullable=true)
     */
    private $fechaInicio;

    /**
     * @var \DateTime $fecha
     *
     * @ORM\Column(name="fecha_fin", type="datetime", nullable=true)
     */
    private $fechaFin;


    /**
     * @var decimal $monto
     *
     * @ORM\Column(name="monto", type="decimal", scale=2, precision=15, nullable=false)
     */
    private $monto;

    /**
     * @var decimal $base_amount
     *
     * @ORM\Column(name="resta", type="decimal", scale=2, precision=15, nullable=true)
     */
    private $resta;

    /**
     * @var Cargo
     * @ORM\ManyToOne(targetEntity="Institucion", inversedBy="subdisios")
     * @ORM\JoinColumn(name="institucion_id", nullable=true)
     */
    private $institucion;


    /**
     * @var Cargo
     * @ORM\ManyToOne(targetEntity="empleado", inversedBy="subsidios")
     * @ORM\JoinColumn(name="empleado_id", nullable=true)
     */
    private $empleado;

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

    /**
     * Set institucion
     *
     * @param \AppBundle\Entity\Institucion $institucion
     *
     * @return Subsidio
     */
    public function setInstitucion(\AppBundle\Entity\Institucion $institucion = null)
    {
        $this->institucion = $institucion;

        return $this;
    }

    /**
     * Get institucion
     *
     * @return \AppBundle\Entity\Institucion
     */
    public function getInstitucion()
    {
        return $this->institucion;
    }

    /**
     * Set fechaInicio
     *
     * @param \DateTime $fechaInicio
     *
     * @return Subsidio
     */
    public function setFechaInicio($fechaInicio)
    {
        $this->fechaInicio = $fechaInicio;

        return $this;
    }

    /**
     * Get fechaInicio
     *
     * @return \DateTime
     */
    public function getFechaInicio()
    {
        return $this->fechaInicio;
    }

    /**
     * Set fechaFin
     *
     * @param \DateTime $fechaFin
     *
     * @return Subsidio
     */
    public function setFechaFin($fechaFin)
    {
        $this->fechaFin = $fechaFin;

        return $this;
    }

    /**
     * Get fechaFin
     *
     * @return \DateTime
     */
    public function getFechaFin()
    {
        return $this->fechaFin;
    }

    /**
     * Set monto
     *
     * @param string $monto
     *
     * @return Subsidio
     */
    public function setMonto($monto)
    {
        $this->monto = $monto;

        return $this;
    }

    /**
     * Get monto
     *
     * @return string
     */
    public function getMonto()
    {
        return $this->monto;
    }

    /**
     * Set resta
     *
     * @param string $resta
     *
     * @return Subsidio
     */
    public function setResta($resta)
    {
        $this->resta = $resta;

        return $this;
    }

    /**
     * Get resta
     *
     * @return string
     */
    public function getResta()
    {
        return $this->resta;
    }

    /**
     * Set empleado
     *
     * @param \AppBundle\Entity\empleado $empleado
     *
     * @return Subsidio
     */
    public function setEmpleado(\AppBundle\Entity\empleado $empleado = null)
    {
        $this->empleado = $empleado;

        return $this;
    }

    /**
     * Get empleado
     *
     * @return \AppBundle\Entity\empleado
     */
    public function getEmpleado()
    {
        return $this->empleado;
    }
}
