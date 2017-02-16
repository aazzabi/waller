<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Rapport
 *
 * @ORM\Table(name="rapport", indexes={@ORM\Index(name="fk_rapport_candidature1_idx", columns={"candidature_id"}), @ORM\Index(name="fk_rapport_action1_idx", columns={"action_id"})})
 * @ORM\Entity
 */
class Rapport
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
     * @var integer
     *
     * @ORM\Column(name="id_candidature", type="integer", nullable=false)
     */
    private $idCandidature;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_action", type="integer", nullable=false)
     */
    private $idAction;

    /**
     * @var string
     *
     * @ORM\Column(name="libelle", type="text", length=65535, nullable=false)
     */
    private $libelle;

    /**
     * @var \Action
     *
     * @ORM\ManyToOne(targetEntity="Action")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="action_id", referencedColumnName="id")
     * })
     */
    private $action;

    /**
     * @var \Candidature
     *
     * @ORM\ManyToOne(targetEntity="Candidature")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="candidature_id", referencedColumnName="id")
     * })
     */
    private $candidature;



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
     * Set idCandidature
     *
     * @param integer $idCandidature
     *
     * @return Rapport
     */
    public function setIdCandidature($idCandidature)
    {
        $this->idCandidature = $idCandidature;

        return $this;
    }

    /**
     * Get idCandidature
     *
     * @return integer
     */
    public function getIdCandidature()
    {
        return $this->idCandidature;
    }

    /**
     * Set idAction
     *
     * @param integer $idAction
     *
     * @return Rapport
     */
    public function setIdAction($idAction)
    {
        $this->idAction = $idAction;

        return $this;
    }

    /**
     * Get idAction
     *
     * @return integer
     */
    public function getIdAction()
    {
        return $this->idAction;
    }

    /**
     * Set libelle
     *
     * @param string $libelle
     *
     * @return Rapport
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
     * Set action
     *
     * @param \AppBundle\Entity\Action $action
     *
     * @return Rapport
     */
    public function setAction(\AppBundle\Entity\Action $action = null)
    {
        $this->action = $action;

        return $this;
    }

    /**
     * Get action
     *
     * @return \AppBundle\Entity\Action
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * Set candidature
     *
     * @param \AppBundle\Entity\Candidature $candidature
     *
     * @return Rapport
     */
    public function setCandidature(\AppBundle\Entity\Candidature $candidature = null)
    {
        $this->candidature = $candidature;

        return $this;
    }

    /**
     * Get candidature
     *
     * @return \AppBundle\Entity\Candidature
     */
    public function getCandidature()
    {
        return $this->candidature;
    }
}
