<?php namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Note
 *
 * @ORM\Table(name="note")
 * @ORM\Entity
 */
class Note
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
     * @ORM\Column(name="commentaire", type="text", length=65535, nullable=false)
     */
    private $commentaire;

    /**
     * @var integer
     *
     * @ORM\Column(name="evaluation", type="integer", nullable=true)
     */
    private $evaluation = 0;

    /**
     * @var Candidature
     *
     * @ORM\ManyToOne(targetEntity="Candidature")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="candidature_id", referencedColumnName="id")
     * })
     */
    private $candidature;

    /**
     * @var Etape
     *
     * @ORM\ManyToOne(targetEntity="Etape")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="etape_id", referencedColumnName="id")
     * })
     */
    private $etape;

    /**
     * Note constructor.
     * @param int $id
     * @param string $commentaire
     * @param int $evaluation
     * @param Candidature $candidature
     * @param Etape $etape
     */
    public function __construct($id, $commentaire, $evaluation, Candidature $candidature, Etape $etape)
    {
        $this->id = $id;
        $this->commentaire = $commentaire;
        $this->evaluation = $evaluation;
        $this->candidature = $candidature;
        $this->etape = $etape;
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
     * Set commentaire
     *
     * @param string $commentaire
     *
     * @return Note
     */
    public function setCommentaire($commentaire)
    {
        $this->commentaire = $commentaire;

        return $this;
    }

    /**
     * Get commentaire
     *
     * @return string
     */
    public function getCommentaire()
    {
        return $this->commentaire;
    }

    /**
     * Set evaluation
     *
     * @param integer $evaluation
     *
     * @return Note
     */
    public function setEvaluation($evaluation)
    {
        $this->evaluation = $evaluation;

        return $this;
    }

    /**
     * Get evaluation
     *
     * @return integer
     */
    public function getEvaluation()
    {
        return $this->evaluation;
    }

    /**
     * Set candidature
     *
     * @param \AppBundle\Entity\Candidature $candidature
     *
     * @return Note
     */
    public function setCandidature(Candidature $candidature = null)
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

    /**
     * Set etape
     *
     * @param \AppBundle\Entity\Etape $etape
     *
     * @return Note
     */
    public function setEtape(Etape $etape = null)
    {
        $this->etape = $etape;

        return $this;
    }

    /**
     * Get etape
     *
     * @return \AppBundle\Entity\Etape
     */
    public function getEtape()
    {
        return $this->etape;
    }
}
