<?php

/**
 * @author  Rokbani Ghayth
 */

namespace AppBundle\ModelManager;

use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Bridge\Doctrine\RegistryInterface;
use Symfony\Component\Form\FormFactory;
use Symfony\Component\Routing\Router;
use AppBundle\Entity\Candidature;
use AppBundle\Entity\Note;

/**
 * Manager of the entity Candidature.
 */
class CandidatureManager
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
     * @var FormFactory
     */
    protected $formFactory;
    /**
     * @var Router
     */
    protected $router;
    /**
     * @var RequestStack
     */
    protected $requestStack;
    /**
     * Constructor class.
     *
     * @param RegistryInterface $doctrine Instance of doctrine.
     * @param FormFactory $formFactory Instance of FormFactory.
     * @param Router $router Instance of Router.
     * @param RequestStack $requestStack Instance of RequestStack.

     */
    public function __construct(RegistryInterface $doctrine, FormFactory $formFactory, Router $router, RequestStack $requestStack)
    {
        $this->doctrine              = $doctrine;
        $this->entityManager         = $this->doctrine->getManager();
        $this->candidatureRepository = $this->entityManager->getRepository("AppBundle:Candidature");
        $this->formFactory           = $formFactory;
        $this->router                = $router;
        $this->requestStack          = $requestStack;
    }

    public function retrieveCandidaturesByGroupId($groupId)
    {
        return $this->candidatureRepository->getCandidaturesByGroupId($groupId);
    }

    public function retrieveAllCandidatures()
    {
        return $this->candidatureRepository->findAll();
    }

    public function createCandidature($profileSelected)
    {
        $candidature = new Candidature();
        $formBuilder = $this->formFactory->createBuilder('AppBundle\Form\CandidatureType', $candidature);
        $form = $formBuilder->getForm();

        if ($this->requestStack->getCurrentRequest()->isMethod('POST')) {
            $form->handleRequest($this->requestStack->getCurrentRequest());
            if (isset($profileSelected) && $profileSelected) {
                $candidature->setProfile($profileSelected);
            }
            if ($form->isSubmitted() && $form->isValid()) {
                $this->entityManager->persist($candidature);
                $this->entityManager->flush($candidature);
                $this->createNote($candidature);
                return new RedirectResponse ($this->router->generate('candidature_edit', array('id' => $candidature->getId())));
            }
        }

        return $form;
    }

    private function createNote($candidature)
    {
        $note = new Note();
        $note->setCandidature($candidature);
        $note->setEtape($candidature->getCurrentEtape());
        $this->entityManager->persist($note);
        $this->entityManager->flush($note);
    }
}
