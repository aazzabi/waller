<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Action
 *
 * @ORM\Table(name="action", indexes={@ORM\Index(name="fk_action_etape_source_idx", columns={"etape_source_id"}), @ORM\Index(name="fk_action_etape_destination_idx", columns={"etape_destination_id"})})
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
    private $affectation = '0';

    /**
     * @var \Etape
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
     * @ORM\ManyToOne(targetEntity="Etape")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="etape_source_id", referencedColumnName="id")
     * })
     */
    private $etapeSource;


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
     * Set libelle
     *
     * @param string $libelle
     *
     * @return Action
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * Get libelle
     *
     * @return string
     */
    public function getLibelle()
    {
        return $this->libelle;
    }

    /**
     * Set affectation
     *
     * @param integer $affectation
     *
     * @return Action
     */
    public function setAffectation($affectation)
    {
        $this->affectation = $affectation;

        return $this;
    }

    /**
     * Get affectation
     *
     * @return integer
     */
    public function getAffectation()
    {
        return $this->affectation;
    }

    /**
     * Set etapeDestination
     *
     * @param \AppBundle\Entity\Etape $etapeDestination
     *
     * @return Action
     */
    public function setEtapeDestination(\AppBundle\Entity\Etape $etapeDestination = null)
    {
        $this->etapeDestination = $etapeDestination;

        return $this;
    }

    /**
     * Get etapeDestination
     *
     * @return \AppBundle\Entity\Etape
     */
    public function getEtapeDestination()
    {
        return $this->etapeDestination;
    }

    /**
     * Set etapeSource
     *
     * @param \AppBundle\Entity\Etape $etapeSource
     *
     * @return Action
     */
    public function setEtapeSource(\AppBundle\Entity\Etape $etapeSource = null)
    {
        $this->etapeSource = $etapeSource;

        return $this;
    }

    /**
     * Get etapeSource
     *
     * @return \AppBundle\Entity\Etape
     */
    public function getEtapeSource()
    {
        return $this->etapeSource;
    }
}
