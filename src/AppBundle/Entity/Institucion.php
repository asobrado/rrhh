<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Pais
 *
 * @ORM\Table(name="institucion")
 * @ORM\Entity()
 */
class Institucion
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
     * @ORM\Column(name="nombre", type="string", length=100, unique=true)
     */
    private $nombre;

    /**
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="Subsidio", mappedBy="institucion")
     */
    private $subsidios;

    /**
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="DependenciaCobro", mappedBy="institucion")
     */
    private $depedencias;

    public function __construct(){

    }
    
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
     * @return Pais
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
     * Add subsidio
     *
     * @param \AppBundle\Entity\Subsidio $subsidio
     *
     * @return Institucion
     */
    public function addSubsidio(\AppBundle\Entity\Subsidio $subsidio)
    {
        $this->subsidios[] = $subsidio;

        return $this;
    }

    /**
     * Remove subsidio
     *
     * @param \AppBundle\Entity\Subsidio $subsidio
     */
    public function removeSubsidio(\AppBundle\Entity\Subsidio $subsidio)
    {
        $this->subsidios->removeElement($subsidio);
    }

    /**
     * Get subsidios
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSubsidios()
    {
        return $this->subsidios;
    }

    /**
     * Add depedencia
     *
     * @param \AppBundle\Entity\DependenciaCobro $depedencia
     *
     * @return Institucion
     */
    public function addDepedencia(\AppBundle\Entity\DependenciaCobro $depedencia)
    {
        $this->depedencias[] = $depedencia;

        return $this;
    }

    /**
     * Remove depedencia
     *
     * @param \AppBundle\Entity\DependenciaCobro $depedencia
     */
    public function removeDepedencia(\AppBundle\Entity\DependenciaCobro $depedencia)
    {
        $this->depedencias->removeElement($depedencia);
    }

    /**
     * Get depedencias
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDepedencias()
    {
        return $this->depedencias;
    }
    public function __toString()
    {
        return $this->getNombre();
    }
}
