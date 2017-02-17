<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Action
 *
 * @ORM\Table(name="action")
 * @ORM\Entity
 */
class Action
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="libelle", type="string", length=150, nullable=false)
     */
    private $libelle;

    /**
     * @var integer
     *
     * @ORM\Column(name="affectation", type="integer", nullable=false)
     */
    private $affectation = 0;

    /**
     * @var Etape
     *
     * @ORM\ManyToOne(targetEntity="Etape")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="etape_destination_id", referencedColumnName="id")
     * })
     */
    private $etapeDestination;

    /**
     * @var \Etape
     *
     * @ORM\ManyToOne(targetEntity="Etape", inversedBy="actions")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="etape_source_id", referencedColumnName="id")
     * })
     */
    private $etapeSource;


}
