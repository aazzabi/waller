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


}

