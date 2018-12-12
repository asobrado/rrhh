<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Provincia
 *
 * @ORM\Table(name="tipo_archivo_documento")
 * @ORM\Entity()
 */
class TipoArchivoDocumento
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
     * @ORM\OneToMany(targetEntity="Archivo", mappedBy="tipoArchivoDocument")
     */
    private $archivos;
    
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
        $this->archivos = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add archivo
     *
     * @param \AppBundle\Entity\Archivo $archivo
     *
     * @return TipoArchivoDocumento
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
