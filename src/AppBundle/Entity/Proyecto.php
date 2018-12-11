<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Gedmo\Mapping\Annotation as Gedmo;
/**
 * Empresa
 *
 * @ORM\Table(name="proyectos")
 * @ORM\Entity()
 */
class Proyecto
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
     * @ORM\Column(name="nombre", type="text", nullable=true)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="text", nullable=true)
     */
    private $descripcion;

     /**
     * @Gedmo\Slug(fields={"nombre"})
     * @ORM\Column(length=128, unique=false)
     */
    protected $slug;

    
    /**
     * @var string
     *
     * @ORM\Column(name="logo", type="string", length=255, nullable=true)
     */
    private $logo;

    /**
     * @var File $logoArchivo
     */
    protected $logoArchivo;
        
    private $tempLogo;
    
    /**
     * @var string
     *
     * @ORM\Column(name="web", type="string", length=100, nullable=true)
     */
    private $web;

    /**
     * @var string
     *
     * @ORM\Column(name="facebook", type="string", length=100, nullable=true)
     */
    private $facebook;

    /**
     * @var string
     *
     * @ORM\Column(name="twitter", type="string", length=100, nullable=true)
     */
    private $twitter;

    /**
     * @var string
     *
     * @ORM\Column(name="youtube", type="string", length=100, nullable=true)
     */
    private $youtube;


    public function __construct(){
        parent::__construct(); 
    }
    

}
