<?php

/**
 * @author  Rokbani Ghayth
 */

namespace AppBundle\ModelManager;

use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * Manager of the entity Profile.
 */
class ProfileManager
{
    /**
     *
     * @var RegistryInterface
     */
    protected $doctrine;

    /**
     * @var EntityManager
     */
    protected $entityManager;

    /**
     * Constructor class.
     *
     * @param RegistryInterface $doctrine Instance of doctrine.

     */
    public function __construct(RegistryInterface $doctrine)
    {
        $this->doctrine             = $doctrine;
        $this->entityManager        = $this->doctrine->getManager();
        $this->profileRepository = $this->entityManager->getRepository("AppBundle:Profile");
    }

}
