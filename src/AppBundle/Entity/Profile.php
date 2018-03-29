<?php namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Validator\Constraints as Assert;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * Profile
 *
 * @ORM\Table(name="profile")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ProfileRepository")
 * @Vich\Uploadable
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
     * @Assert\NotBlank()
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
     * @ORM\Column(name="ville", type="string", length=150, nullable=false)
     */
    private $ville;

    /**
     * @var string
     *
     * @ORM\Column(name="societeActuel", type="string", length=150, nullable=false)
     */
    private $societeActuel;

    /**
     * @var string
     *
     * @ORM\Column(name="telephone", type="string", length=150, nullable=true)
     */
    private $telephone;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, nullable=true)
     */
    private $email;

    /**
     * @Vich\UploadableField(mapping="cv_file", fileNameProperty="cv")
     *
     * @var File
     */
    private $cvFile;

    /**
     * @ORM\Column(name="cv", type="string", length=255, nullable=true)
     *
     * @var string
     */
    private $cv;

    /**
     * @ORM\Column(type="datetime",nullable=true)
     *
     * @var \DateTime
     */
    private $cvUpdatedAt;

    /**
     * @var integer
     *
     * @ORM\Column(name="experience", type="integer",  nullable=true)
     */
    private $experience;

    /**
     * @var string
     *
     * @ORM\Column(name="niveau", type="string", length=150, nullable=false)
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
     * @ORM\Column(name="salaireActuel", type="string", length=150, nullable=true)
     */
    private $salaireActuel;

    /**
     * @var string
     *
     * @ORM\Column(name="ambition", type="string", length=150, nullable=true)
     */
    private $ambition;


    /**
     * @var string
     *
     * @ORM\Column(name="diplome", type="string", length=150, nullable=true)
     */
    private $diplome;


    /**
     * @var string
     *
     * @ORM\Column(name="postBac", type="string", length=150, nullable=true)
     */
    private $postBac;


    /**
     * @var string
     *
     * @ORM\Column(name="institut", type="string", length=150, nullable=true)
     */
    private $institut;

    /**
     * @Vich\UploadableField(mapping="photo_file", fileNameProperty="photo")
     *
     * @var File
     */
    private $photoFile;

    /**
     * @ORM\Column(name="photo", type="string", length=255, nullable=true)
     *
     * @var string
     */
    private $photo;

    /**
     * @ORM\Column(type="datetime",nullable=true)
     *
     * @var \DateTime
     */
    private $photoUpdatedAt;


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
     * @var Candidature
     *
     * @ORM\OneToMany(targetEntity="Candidature", mappedBy="profile")
     * @ORM\JoinColumn(name="candidature_id", referencedColumnName="id")
     * })
     */
    private $candidature;

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
     * @var string
     */
    private $competencesTags;

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
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile $image
     *
     * @return Profile
     */
    public function setCvFile(File $cvFile = null)
    {
        $this->cvFile = $cvFile;

        if ($cvFile) {
            $this->cvUpdatedAt = new \DateTimeImmutable();
        }

        return $this;
    }

    /**
     * @return File|null
     */
    public function getCvFile()
    {
        return $this->cvFile;
    }

    /**
     * @param string $cv
     *
     * @return Product
     */
    public function setCv($cv)
    {
        $this->cv = $cv;

        return $this;
    }

    /**
     * @return string|null
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
     * @return string
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * @param string $ville
     */
    public function setVille($ville)
    {
        $this->ville = $ville;
    }

    /**
     * @return string
     */
    public function getSocieteActuel()
    {
        return $this->societeActuel;
    }

    /**
     * @param string $societeActuel
     */
    public function setSocieteActuel($societeActuel)
    {
        $this->societeActuel = $societeActuel;
    }

    /**
     * @return string
     */
    public function getSalaireActuel()
    {
        return $this->salaireActuel;
    }

    /**
     * @param string $salaireActuel
     */
    public function setSalaireActuel($salaireActuel)
    {
        $this->salaireActuel = $salaireActuel;
    }

    /**
     * @return string
     */
    public function getAmbition()
    {
        return $this->ambition;
    }

    /**
     * @param string $ambition
     */
    public function setAmbition($ambition)
    {
        $this->ambition = $ambition;
    }

    /**
     * @return string
     */
    public function getDiplome()
    {
        return $this->diplome;
    }

    /**
     * @param string $diplome
     */
    public function setDiplome($diplome)
    {
        $this->diplome = $diplome;
    }

    /**
     * @return string
     */
    public function getPostBac()
    {
        return $this->postBac;
    }

    /**
     * @param string $postBac
     */
    public function setPostBac($postBac)
    {
        $this->postBac = $postBac;
    }

    /**
     * @return string
     */
    public function getInstitut()
    {
        return $this->institut;
    }

    /**
     * @param string $institut
     */
    public function setInstitut($institut)
    {
        $this->institut = $institut;
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
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile $image
     *
     * @return Profile
     */
    public function setPhotoFile(File $photoFile = null)
    {
        $this->photoFile = $photoFile;

        if ($photoFile) {
            $this->photoUpdatedAt = new \DateTimeImmutable();
        }

        return $this;
    }

    /**
     * @return File|null
     */
    public function getPhotoFile()
    {
        return $this->photoFile;
    }

    /**
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
     * @return string|null
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

    /**
     * @return string
     */
    public function getCompetencesTags()
    {
        if ($this->competencesTags == "") {
            $array = [];
            foreach ($this->getCompetences() as $competence) {
                $array[] = $competence->getLibelle();
            }
            $this->competencesTags = implode(' , ', $array);
        }
        return $this->competencesTags;
    }

    /**
     * @param string $competencesTags
     */
    public function setCompetencesTags($competencesTags)
    {
        $this->competencesTags = $competencesTags;

        return $this;
    }


    function __toString()
    {
        return $this->getPrenom() . " " . $this->getNom() . " (" . $this->getExperience() . " d'an(s) expérience )" ;
    }

    /**
     * Set cvUpdatedAt
     *
     * @param \DateTime $cvUpdatedAt
     *
     * @return Profile
     */
    public function setCvUpdatedAt($cvUpdatedAt)
    {
        $this->cvUpdatedAt = $cvUpdatedAt;

        return $this;
    }

    /**
     * Get cvUpdatedAt
     *
     * @return \DateTime
     */
    public function getCvUpdatedAt()
    {
        return $this->cvUpdatedAt;
    }

    /**
     * Set photoUpdatedAt
     *
     * @param \DateTime $photoUpdatedAt
     *
     * @return Profile
     */
    public function setPhotoUpdatedAt($photoUpdatedAt)
    {
        $this->photoUpdatedAt = $photoUpdatedAt;

        return $this;
    }

    /**
     * Get photoUpdatedAt
     *
     * @return \DateTime
     */
    public function getPhotoUpdatedAt()
    {
        return $this->photoUpdatedAt;
    }



    /**
     * Add candidature
     *
     * @param \AppBundle\Entity\Candidature $candidature
     *
     * @return Profile
     */
    public function addCandidature(\AppBundle\Entity\Candidature $candidature)
    {
        $this->candidature[] = $candidature;

        return $this;
    }

    /**
     * Remove candidature
     *
     * @param \AppBundle\Entity\Candidature $candidature
     */
    public function removeCandidature(\AppBundle\Entity\Candidature $candidature)
    {
        $this->candidature->removeElement($candidature);
    }

    /**
     * Get candidatures
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCandidature()
    {
        return $this->candidature;
    }
}
