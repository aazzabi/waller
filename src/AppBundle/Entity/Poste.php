<?php namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * Poste
 *
 * @ORM\Table(name="poste")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PosteRepository")
 * @ORM\EntityListeners({"AppBundle\Entity\Listeners\PosteListener"})
 */
class Poste
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
     * @Assert\NotBlank()
     * @ORM\Column(name="libelle", type="string", length=150, nullable=false)
     */
    private $libelle;

    /**
     * @var string
     * @Assert\NotBlank()
     * @ORM\Column(name="description", type="text", length=65535, nullable=true)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="profile_demande", type="text", length=65535, nullable=true)
     */
    private $profileDemande;

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
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="Lien", mappedBy="poste", cascade={"persist"})
     * @ORM\JoinColumn(name="lien_id", referencedColumnName="id")
     * })
     */
    private $liens;

    /**
     *
     * var Candidature
     *
     * @ORM\OneToMany(targetEntity="Candidature", mappedBy="poste")
     * @ORM\JoinColumn(name="candidature_id", referencedColumnName="id")
     * })
     *
     */
    private $candidatures;

    /**
     * @var Group
     *
     * @ORM\ManyToOne(targetEntity="Group")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="created_by_group", referencedColumnName="id")
     * })
     */
    private $createdByGroup;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=150, nullable=true)
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="nbPostes", type="string", length=150, nullable=true)
     */
    private $nbPostes = 1;

    /**
     * @ORM\Column(name="dateEcheance", type="datetime", nullable=true)
     * @Assert\Range(
     *      min = "now")
     * @Assert\DateTime()
     * @var \DateTime
     */
    private $dateEcheance;

    /**
     * @var string
     *
     * @ORM\Column(name="responsable", type="string", length=150, nullable=true)
     */
    private $responsable;

    /**
     * @var string
     *
     * @ORM\Column(name="localisation", type="string", length=150, nullable=true)
     */
    private $localisation;

    /**
     * @var string
     *
     * @ORM\Column(name="tjm", type="string", length=150, nullable=true)
     */
    private $tjm;

    /**
     * @var string
     *
     * @ORM\Column(name="primeCoptation", type="string", length=150, nullable=true)
     */
    private $primeCoptation;

    /**
     * @var string
     *
     * @ORM\Column(name="etat", type="string", length=150, nullable=true)
     */
    private $etat;

    /**
     * Poste constructor.
     *
     */
    public function __construct()
    {
        $this->liens = new ArrayCollection();

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


    function __toString()
    {
        return $this->getLibelle();
    }

    /**
     * Set libelle
     *
     * @param string $libelle
     *
     * @return Poste
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
     * Set description
     *
     * @param string $description
     *
     * @return Poste
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set profileDemande
     *
     * @param string $profileDemande
     *
     * @return Poste
     */
    public function setProfileDemande($profileDemande)
    {
        $this->profileDemande = $profileDemande;

        return $this;
    }

    /**
     * Get profileDemande
     *
     * @return string
     */
    public function getProfileDemande()
    {
        return $this->profileDemande;
    }

    /**
     * Set group
     *
     * @param \AppBundle\Entity\Group $group
     *
     * @return Poste
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
     * Add lien
     *
     * @param \AppBundle\Entity\Lien $lien
     *
     * @return Poste
     */
    public function addLien(Lien $lien)
    {
        $lien->setPoste($this);
        $this->liens->add($lien);

        return $this;
    }

    /**
     * Remove lien
     *
     * @param \AppBundle\Entity\Lien $lien
     */
    public function removeLien(Lien $lien)
    {
        $this->liens->removeElement($lien);
    }

    /**
     * Get liens
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getLiens()
    {
        return $this->liens;
    }

    /**
     * Add candidature
     *
     * @param \AppBundle\Entity\Candidature $candidature
     *
     * @return Poste
     */
    public function addCandidature(Candidature $candidature)
    {
        $this->candidatures[] = $candidature;

        return $this;
    }

    /**
     * Remove candidature
     *
     * @param \AppBundle\Entity\Candidature $candidature
     */
    public function removeCandidature(Candidature $candidature)
    {
        $this->candidatures->removeElement($candidature);
    }

    /**
     * Get candidatures
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCandidatures()
    {
        return $this->candidatures;
    }

    /**
     * Set group
     *
     * @param \AppBundle\Entity\Group $group
     *
     * @return Poste
     */
    public function setCreatedByGroup(Group $group = null)
    {
        $this->createdByGroup = $group;

        return $this;
    }

    /**
     * Get group
     *
     * @return \AppBundle\Entity\Group
     */
    public function getCreatedByGroup()
    {
        return $this->createdByGroup;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return int
     */
    public function getNbPostes()
    {
        return $this->nbPostes;
    }

    /**
     * @param int $nbPostes
     */
    public function setNbPostes($nbPostes)
    {
        $this->nbPostes = $nbPostes;
    }

    /**
     * @return \DateTime
     */
    public function getDateEcheance()
    {
        return $this->dateEcheance;
    }

    /**
     * @param \DateTime $dateEcheance
     */
    public function setDateEcheance($dateEcheance)
    {
        $this->dateEcheance = $dateEcheance;
    }

    /**
     * @return string
     */
    public function getResponsable()
    {
        return $this->responsable;
    }

    /**
     * @param string $responsable
     */
    public function setResponsable($responsable)
    {
        $this->responsable = $responsable;
    }

    /**
     * @return string
     */
    public function getLocalisation()
    {
        return $this->localisation;
    }

    /**
     * @param string $localisation
     */
    public function setLocalisation($localisation)
    {
        $this->localisation = $localisation;
    }

    /**
     * @return string
     */
    public function getTjm()
    {
        return $this->tjm;
    }

    /**
     * @param string $tjm
     */
    public function setTjm($tjm)
    {
        $this->tjm = $tjm;
    }

    /**
     * @return string
     */
    public function getPrimeCoptation()
    {
        return $this->primeCoptation;
    }

    /**
     * @param string $primeCoptation
     */
    public function setPrimeCoptation($primeCoptation)
    {
        $this->primeCoptation = $primeCoptation;
    }

    /**
     * @return string
     */
    public function getEtat()
    {
        return $this->etat;
    }

    /**
     * @param string $etat
     */
    public function setEtat($etat)
    {
        $this->etat = $etat;
    }
}
