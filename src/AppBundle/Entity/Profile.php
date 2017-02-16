<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Profile
 *
 * @ORM\Table(name="profile", uniqueConstraints={@ORM\UniqueConstraint(name="id_profile", columns={"id"})}, indexes={@ORM\Index(name="fk_profile_disponibilite1_idx", columns={"disponibilite_id"})})
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
     * @ORM\Column(name="tel", type="string", length=150, nullable=false)
     */
    private $tel;

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
     * @ORM\Column(name="experience", type="integer", nullable=false)
     */
    private $experience;

    /**
     * @var string
     *
     * @ORM\Column(name="niveau", type="string", length=45, nullable=true)
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
     * @var string
     *
     * @ORM\Column(name="sivp", type="string", length=45, nullable=true)
     */
    private $sivp;

    /**
     * @var integer
     *
     * @ORM\Column(name="prestationSalarial", type="integer", nullable=true)
     */
    private $prestationsalarial;

    /**
     * @var string
     *
     * @ORM\Column(name="photo", type="string", length=45, nullable=true)
     */
    private $photo;

    /**
     * @var \Disponibilite
     *
     * @ORM\ManyToOne(targetEntity="Disponibilite")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="disponibilite_id", referencedColumnName="id")
     * })
     */
    private $disponibilite;



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
     * Set tel
     *
     * @param string $tel
     *
     * @return Profile
     */
    public function setTel($tel)
    {
        $this->tel = $tel;

        return $this;
    }

    /**
     * Get tel
     *
     * @return string
     */
    public function getTel()
    {
        return $this->tel;
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
     * @param integer $experience
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
     * @return integer
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
     * @param string $sivp
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
     * @return string
     */
    public function getSivp()
    {
        return $this->sivp;
    }

    /**
     * Set prestationsalarial
     *
     * @param integer $prestationsalarial
     *
     * @return Profile
     */
    public function setPrestationsalarial($prestationsalarial)
    {
        $this->prestationsalarial = $prestationsalarial;

        return $this;
    }

    /**
     * Get prestationsalarial
     *
     * @return integer
     */
    public function getPrestationsalarial()
    {
        return $this->prestationsalarial;
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
    public function setDisponibilite(\AppBundle\Entity\Disponibilite $disponibilite = null)
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
}
