<?php

/**
 * @author  Rokbani Ghayth
 */

namespace AppBundle\ModelManager;

use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * Manager of the entity Etape.
 */
class EtapeManager
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
        $this->doctrine        = $doctrine;
        $this->entityManager   = $this->doctrine->getManager();
        $this->etapeRepository = $this->entityManager->getRepository("AppBundle:Etape");
    }

    public function retrieveAllEtapes()
    {
        return $this->etapeRepository->findAll();
    }

}
