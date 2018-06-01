<?php
/**
 * Created by PhpStorm.
 * User: arafet
 * Date: 01/06/18
 * Time: 10:37 ص
 */

namespace AppBundle\ModelManager;

use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Bridge\Doctrine\RegistryInterface;
use Symfony\Component\Form\FormFactory;
use Symfony\Component\Routing\Router;
use AppBundle\Entity\Candidature;
use AppBundle\Entity\Note;

class UserManager
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
    public function __construct(RegistryInterface $doctrine)
    {
        $this->doctrine              = $doctrine;
        $this->entityManager         = $this->doctrine->getManager();
        $this->userRepository        = $this->entityManager->getRepository("AppBundle:User");
    }

    public function retrieveAllUsers()
    {
        return $this->userRepository->findAll();
    }

    public function retrieveUserById($id)
    {
        return $this->userRepository->find($id);
    }
}