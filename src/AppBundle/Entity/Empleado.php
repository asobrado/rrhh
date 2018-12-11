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


}
