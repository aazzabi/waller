<?php namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Poste
 *
 * @ORM\Table(name="poste")
 * @ORM\Entity
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
     *
     * @ORM\Column(name="libelle", type="string", length=150, nullable=false)
     */
    private $libelle;

    /**
     * @var string
     *
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

        $this->liens[] = $lien;

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
}
