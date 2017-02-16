<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProfileCompetence
 *
 * @ORM\Table(name="profile_competence", indexes={@ORM\Index(name="fk_profile_competence_competence1_idx", columns={"competence_id"}), @ORM\Index(name="fk_profile_competence_profile1_idx", columns={"profile_id"})})
 * @ORM\Entity
 */
class ProfileCompetence
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
     * @var \Competence
     *
     * @ORM\ManyToOne(targetEntity="Competence")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="competence_id", referencedColumnName="id")
     * })
     */
    private $competence;

    /**
     * @var \Profile
     *
     * @ORM\ManyToOne(targetEntity="Profile")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="profile_id", referencedColumnName="id")
     * })
     */
    private $profile;



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
     * Set competence
     *
     * @param \AppBundle\Entity\Competence $competence
     *
     * @return ProfileCompetence
     */
    public function setCompetence(\AppBundle\Entity\Competence $competence = null)
    {
        $this->competence = $competence;

        return $this;
    }

    /**
     * Get competence
     *
     * @return \AppBundle\Entity\Competence
     */
    public function getCompetence()
    {
        return $this->competence;
    }

    /**
     * Set profile
     *
     * @param \AppBundle\Entity\Profile $profile
     *
     * @return ProfileCompetence
     */
    public function setProfile(\AppBundle\Entity\Profile $profile = null)
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
}
