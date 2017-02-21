<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Profile
 *
 * @ORM\Table(name="profile")
 * @ORM\Entity
 */
class Profile
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
     * @ORM\Column(name="nom", type="string", length=150, nullable=false)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=150, nullable=false)
     */
    private $prenom;

    /**
     * @var string
     *
     * @ORM\Column(name="telephone", type="string", length=150, nullable=false)
     */
    private $telephone;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, nullable=false)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="cv", type="string", length=255, nullable=false)
     */
    private $cv;

    /**
     * @var integer
     *
     * @ORM\Column(name="experience", type="string", length=150, nullable=false)
     */
    private $experience;

    /**
     * @var string
     *
     * @ORM\Column(name="niveau", type="string", length=150, nullable=true)
     */
    private $niveau;

    /**
     * @var string
     *
     * @ORM\Column(name="skype", type="string", length=255, nullable=true)
     */
    private $skype;

    /**
     * @var string
     *
     * @ORM\Column(name="linkedin", type="string", length=255, nullable=true)
     */
    private $linkedin;

    /**
     * @var string
     *
     * @ORM\Column(name="facebook", type="string", length=255, nullable=true)
     */
    private $facebook;

    /**
     * @var string
     *
     * @ORM\Column(name="github", type="string", length=255, nullable=true)
     */
    private $github;

    /**
     * @var boolean
     *
     * @ORM\Column(name="sivp", type="boolean")
     */
    private $sivp;

    /**
     * @var string
     *
     * @ORM\Column(name="prestationSalariale", type="string", length=150, nullable=true)
     */
    private $prestationsalariale;

    /**
     * @var string
     *
     * @ORM\Column(name="photo", type="string", length=255, nullable=true)
     */
    private $photo;

    /**
     * @var Disponibilite
     *
     * @ORM\ManyToOne(targetEntity="Disponibilite")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="disponibilite_id", referencedColumnName="id")
     * })
     */
    private $disponibilite;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Competence", inversedBy="profiles")
     * @ORM\JoinTable(name="profile_competence",
     *   joinColumns={
     *     @ORM\JoinColumn(name="profile_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="competence_id", referencedColumnName="id")
     *   }
     * )
     */
    private $competences;



    /**
     * Constructor
     */
    public function __construct()
    {
        $this->competences = new ArrayCollection();
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
     * Set nom
     *
     * @param string $nom
     *
     * @return Profile
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set prenom
     *
     * @param string $prenom
     *
     * @return Profile
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set telephone
     *
     * @param string $telephone
     *
     * @return Profile
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;

        return $this;
    }

    /**
     * Get telephone
     *
     * @return string
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Profile
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set cv
     *
     * @param string $cv
     *
     * @return Profile
     */
    public function setCv($cv)
    {
        $this->cv = $cv;

        return $this;
    }

    /**
     * Get cv
     *
     * @return string
     */
    public function getCv()
    {
        return $this->cv;
    }

    /**
     * Set experience
     *
     * @param string $experience
     *
     * @return Profile
     */
    public function setExperience($experience)
    {
        $this->experience = $experience;

        return $this;
    }

    /**
     * Get experience
     *
     * @return string
     */
    public function getExperience()
    {
        return $this->experience;
    }

    /**
     * Set niveau
     *
     * @param string $niveau
     *
     * @return Profile
     */
    public function setNiveau($niveau)
    {
        $this->niveau = $niveau;

        return $this;
    }

    /**
     * Get niveau
     *
     * @return string
     */
    public function getNiveau()
    {
        return $this->niveau;
    }

    /**
     * Set skype
     *
     * @param string $skype
     *
     * @return Profile
     */
    public function setSkype($skype)
    {
        $this->skype = $skype;

        return $this;
    }

    /**
     * Get skype
     *
     * @return string
     */
    public function getSkype()
    {
        return $this->skype;
    }

    /**
     * Set linkedin
     *
     * @param string $linkedin
     *
     * @return Profile
     */
    public function setLinkedin($linkedin)
    {
        $this->linkedin = $linkedin;

        return $this;
    }

    /**
     * Get linkedin
     *
     * @return string
     */
    public function getLinkedin()
    {
        return $this->linkedin;
    }

    /**
     * Set facebook
     *
     * @param string $facebook
     *
     * @return Profile
     */
    public function setFacebook($facebook)
    {
        $this->facebook = $facebook;

        return $this;
    }

    /**
     * Get facebook
     *
     * @return string
     */
    public function getFacebook()
    {
        return $this->facebook;
    }

    /**
     * Set github
     *
     * @param string $github
     *
     * @return Profile
     */
    public function setGithub($github)
    {
        $this->github = $github;

        return $this;
    }

    /**
     * Get github
     *
     * @return string
     */
    public function getGithub()
    {
        return $this->github;
    }

    /**
     * Set sivp
     *
     * @param boolean $sivp
     *
     * @return Profile
     */
    public function setSivp($sivp)
    {
        $this->sivp = $sivp;

        return $this;
    }

    /**
     * Get sivp
     *
     * @return boolean
     */
    public function getSivp()
    {
        return $this->sivp;
    }

    /**
     * Set prestationsalariale
     *
     * @param string $prestationsalariale
     *
     * @return Profile
     */
    public function setPrestationsalariale($prestationsalariale)
    {
        $this->prestationsalariale = $prestationsalariale;

        return $this;
    }

    /**
     * Get prestationsalariale
     *
     * @return string
     */
    public function getPrestationsalariale()
    {
        return $this->prestationsalariale;
    }

    /**
     * Set photo
     *
     * @param string $photo
     *
     * @return Profile
     */
    public function setPhoto($photo)
    {
        $this->photo = $photo;

        return $this;
    }

    /**
     * Get photo
     *
     * @return string
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * Set disponibilite
     *
     * @param \AppBundle\Entity\Disponibilite $disponibilite
     *
     * @return Profile
     */
    public function setDisponibilite(Disponibilite $disponibilite = null)
    {
        $this->disponibilite = $disponibilite;

        return $this;
    }

    /**
     * Get disponibilite
     *
     * @return \AppBundle\Entity\Disponibilite
     */
    public function getDisponibilite()
    {
        return $this->disponibilite;
    }

    /**
     * Add competence
     *
     * @param \AppBundle\Entity\Competence $competence
     *
     * @return Profile
     */
    public function addCompetence(Competence $competence)
    {
        $this->competences[] = $competence;

        return $this;
    }

    /**
     * Remove competence
     *
     * @param \AppBundle\Entity\Competence $competence
     */
    public function removeCompetence(Competence $competence)
    {
        $this->competences->removeElement($competence);
    }

    /**
     * Get competences
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCompetences()
    {
        return $this->competences;
    }
}
