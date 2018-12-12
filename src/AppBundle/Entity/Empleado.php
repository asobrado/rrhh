<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Participante
 *
 * @ORM\Table(name="empleados")
 * @ORM\Entity()
 */
class Empleado extends User
{
    /**
     * @var string
     *
     * @ORM\Column(name="telefono", type="string", length=30, nullable=true)
     */
    private $telefono;

    /**
     * @var string
     *
     * @ORM\Column(name="apellido", type="string", length=30, nullable=true)
     */
    private $apellido;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fechaNacimiento", type="string", length=10, nullable=true)
     */
    private $fechaNacimiento;

    /**
     * @var Cargo
     * @ORM\ManyToOne(targetEntity="Cargo", inversedBy="cargos")
     * @ORM\JoinColumn(name="cargo_id", nullable=true)
     */
    private $cargo;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_ingreso", type="datetime", nullable=true)
     */
    private $fecha_ingreso;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_retiro", type="datetime", nullable=true)
     */
    private $finRetiro;

    /**
     * Many Users have Many Groups.
     * @ORM\ManyToMany(targetEntity="DependenciaCobro", inversedBy="empleados")
     * @ORM\JoinTable(name="empleados_dependencias_cobro")
     */
    private $dependencias;


    /**
     * Many Users have Many Groups.
     * @ORM\ManyToMany(targetEntity="Proyecto", inversedBy="empleados")
     * @ORM\JoinTable(name="empleados_proyectos")
     */
    private $proyectos;


    /**
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="Archivo", mappedBy="empleado")
     */
    private $archivos;

    public function __construct()
    {
        parent::__construct();
        $this->roles = array('ROLE_EMPLEADO');
    }

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
     * Set telefono
     *
     * @param string $telefono
     *
     * @return Empleado
     */
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;

        return $this;
    }

    /**
     * Get telefono
     *
     * @return string
     */
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * Set apellido
     *
     * @param string $apellido
     *
     * @return Empleado
     */
    public function setApellido($apellido)
    {
        $this->apellido = $apellido;

        return $this;
    }

    /**
     * Get apellido
     *
     * @return string
     */
    public function getApellido()
    {
        return $this->apellido;
    }

    /**
     * Set fechaNacimiento
     *
     * @param string $fechaNacimiento
     *
     * @return Empleado
     */
    public function setFechaNacimiento($fechaNacimiento)
    {
        $this->fechaNacimiento = $fechaNacimiento;

        return $this;
    }

    /**
     * Get fechaNacimiento
     *
     * @return string
     */
    public function getFechaNacimiento()
    {
        return $this->fechaNacimiento;
    }

    /**
     * Set fechaIngreso
     *
     * @param \DateTime $fechaIngreso
     *
     * @return Empleado
     */
    public function setFechaIngreso($fechaIngreso)
    {
        $this->fecha_ingreso = $fechaIngreso;

        return $this;
    }

    /**
     * Get fechaIngreso
     *
     * @return \DateTime
     */
    public function getFechaIngreso()
    {
        return $this->fecha_ingreso;
    }

    /**
     * Set finRetiro
     *
     * @param \DateTime $finRetiro
     *
     * @return Empleado
     */
    public function setFinRetiro($finRetiro)
    {
        $this->finRetiro = $finRetiro;

        return $this;
    }

    /**
     * Get finRetiro
     *
     * @return \DateTime
     */
    public function getFinRetiro()
    {
        return $this->finRetiro;
    }

    /**
     * Set cargo
     *
     * @param \AppBundle\Entity\Cargo $cargo
     *
     * @return Empleado
     */
    public function setCargo(\AppBundle\Entity\Cargo $cargo = null)
    {
        $this->cargo = $cargo;

        return $this;
    }

    /**
     * Get cargo
     *
     * @return \AppBundle\Entity\Cargo
     */
    public function getCargo()
    {
        return $this->cargo;
    }

    /**
     * Add archivo
     *
     * @param \AppBundle\Entity\Archivo $archivo
     *
     * @return Empleado
     */
    public function addArchivo(\AppBundle\Entity\Archivo $archivo)
    {
        $this->archivos[] = $archivo;

        return $this;
    }

    /**
     * Remove archivo
     *
     * @param \AppBundle\Entity\Archivo $archivo
     */
    public function removeArchivo(\AppBundle\Entity\Archivo $archivo)
    {
        $this->archivos->removeElement($archivo);
    }

    /**
     * Get archivos
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getArchivos()
    {
        return $this->archivos;
    }
}
