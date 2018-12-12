<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Provincia
 *
 * @ORM\Table(name="archivos")
 * @ORM\Entity()
 */
class Archivo
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
     * @ORM\ManyToOne(targetEntity="TipoArchivoDocumento", inversedBy="archivos")
     * @ORM\JoinColumn(name="tipo_archivo_documento_id", nullable=true)
     */
    private $tipoArchivoDocumento;


    /**
     * @var Cargo
     * @ORM\ManyToOne(targetEntity="Empleado", inversedBy="archivos")
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
     * Set tipoArchivoDocumento
     *
     * @param \AppBundle\Entity\TipoArchivoDocumento $tipoArchivoDocumento
     *
     * @return Archivo
     */
    public function setTipoArchivoDocumento(\AppBundle\Entity\TipoArchivoDocumento $tipoArchivoDocumento = null)
    {
        $this->tipoArchivoDocumento = $tipoArchivoDocumento;

        return $this;
    }

    /**
     * Get tipoArchivoDocumento
     *
     * @return \AppBundle\Entity\TipoArchivoDocumento
     */
    public function getTipoArchivoDocumento()
    {
        return $this->tipoArchivoDocumento;
    }

    /**
     * Set empleado
     *
     * @param \AppBundle\Entity\Empleado $empleado
     *
     * @return Archivo
     */
    public function setEmpleado(\AppBundle\Entity\Empleado $empleado = null)
    {
        $this->empleado = $empleado;

        return $this;
    }

    /**
     * Get empleado
     *
     * @return \AppBundle\Entity\Empleado
     */
    public function getEmpleado()
    {
        return $this->empleado;
    }
}
