<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use Gedmo\Mapping\Annotation as Gedmo;

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
     * @var decimal $monto
     *
     * @ORM\Column(name="monto", type="decimal", scale=2, precision=15, nullable=false)
     */
    private $monto;



    /**
     * @var Cargo
     * @ORM\ManyToOne(targetEntity="subsidio", inversedBy="movimientos")
     * @ORM\JoinColumn(name="subsidio_id", nullable=true)
     */
    private $subsidio;


    /**
     * @var \DateTime $createdAt
     *
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(name="created_at", type="datetime")
     */
    private $createdAt;

    /**
     * @var \DateTime $updatedAt
     *
     * @Gedmo\Timestampable(on="update")
     * @ORM\Column(name="updated_at", type="datetime")
     */
    private $updatedAt;


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
