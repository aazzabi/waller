<?php  namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Candidature
 *
 * @ORM\Table(name="candidature")
 * @ORM\Entity
 */
class Candidature
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
     * @var Etape
     *
     * @ORM\ManyToOne(targetEntity="Etape")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="current_etape_id", referencedColumnName="id", nullable=false)
     * })
     */
    private $currentEtape;

    /**
     * @var Group
     *
     * @ORM\ManyToOne(targetEntity="Group")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="group_id", referencedColumnName="id")
     * })
     */
    private $group;

    /**
     * @var Poste
     *
     * @ORM\ManyToOne(targetEntity="Poste", inversedBy="candidatures")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="poste_id", referencedColumnName="id", onDelete="CASCADE")
     * })
     */
    private $poste;

    /**
     * @var Profile
     *
     * @ORM\ManyToOne(targetEntity="Profile")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="profile_id", referencedColumnName="id", onDelete="CASCADE")
     * })
     */
    private $profile;

    /**
     * @var Workflow
     *
     * @ORM\ManyToOne(targetEntity="Workflow")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="workflow_id", referencedColumnName="id")
     * })
     */
    private $workflow;

    /**
     *
     * @var string
     *
     *
     * @ORM\Column(name="commentaire", type="text", length=65535, nullable=true)
     *
     */
    private $commentaire;

    /**
     * @var Rapport
     *
     * @ORM\OneToMany(targetEntity="Rapport", mappedBy="candidature")
     * @ORM\JoinColumn(name="rapport_id", referencedColumnName="id")
     * })
     */
    private $rapport;

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
     * Set currentEtape
     *
     * @param \AppBundle\Entity\Etape $currentEtape
     *
     * @return Candidature
     */
    public function setCurrentEtape(Etape $currentEtape = null)
    {
        $this->currentEtape = $currentEtape;

        return $this;
    }

    /**
     * Get currentEtape
     *
     * @return \AppBundle\Entity\Etape
     */
    public function getCurrentEtape()
    {
        return $this->currentEtape;
    }

    /**
     * Set group
     *
     * @param \AppBundle\Entity\Group $group
     *
     * @return Candidature
     */
    public function setGroup(Group $group = null)
    {
        $this->group = $group;

        return $this;
    }

    /**
     * Get group
     *
     * @return \AppBundle\Entity\Group
     */
    public function getGroup()
    {
        return $this->group;
    }

    /**
     * Set poste
     *
     * @param \AppBundle\Entity\Poste $poste
     *
     * @return Candidature
     */
    public function setPoste(Poste $poste = null)
    {
        $this->poste = $poste;

        return $this;
    }

    /**
     * Get poste
     *
     * @return \AppBundle\Entity\Poste
     */
    public function getPoste()
    {
        return $this->poste;
    }

    /**
     * Set profile
     *
     * @param \AppBundle\Entity\Profile $profile
     *
     * @return Candidature
     */
    public function setProfile(Profile $profile = null)
    {
        $this->profile = $profile;

        return $this;
    }

    /**
     * Get profile
     *
     * @return \AppBundle\Entity\Profile
     */
    public function getProfile()
    {
        return $this->profile;
    }

    /**
     * Set workflow
     *
     * @param \AppBundle\Entity\Workflow $workflow
     *
     * @return Candidature
     */
    public function setWorkflow(Workflow $workflow = null)
    {
        $this->workflow = $workflow;

        return $this;
    }

    /**
     * Get workflow
     *
     * @return \AppBundle\Entity\Workflow
     */
    public function getWorkflow()
    {
        return $this->workflow;
    }

    /**
     * Set commentaire
     *
     * @param string $commentaire
     *
     * @return Candidature
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

    function __toString()
    {
        return $this->getProfile() . " - qui est : " . $this->getCurrentEtape() . " pour (" . $this->getGroup() . ")";
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->rapport = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add rapport
     *
     * @param \AppBundle\Entity\Rapport $rapport
     *
     * @return Candidature
     */
    public function addRapport(\AppBundle\Entity\Rapport $rapport)
    {
        $this->rapport[] = $rapport;

        return $this;
    }

    /**
     * Remove rapport
     *
     * @param \AppBundle\Entity\Rapport $rapport
     */
    public function removeRapport(Rapport $rapport)
    {
        $this->rapport->removeElement($rapport);
    }

    /**
     * Get rapport
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getRapport()
    {
        return $this->rapport;
    }
}
