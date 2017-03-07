<?php namespace AppBundle\Entity;

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
     * @ORM\OneToMany(targetEntity="Lien", mappedBy="poste")
     * @ORM\JoinColumn(name="lien_id", referencedColumnName="id")
     * })
     */
    private $liens;

    /**
     * Poste constructor.
     * @param int $id
     * @param string $libelle
     * @param string $description
     * @param string $profileDemande
     * @param Group $group
     */
    public function __construct($id, $libelle, $description, $profileDemande, Group $group)
    {
        $this->id = $id;
        $this->libelle = $libelle;
        $this->description = $description;
        $this->profileDemande = $profileDemande;
        $this->group = $group;
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
}
