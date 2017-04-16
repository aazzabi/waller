<?php namespace AppBundle\Entity\Listeners;

use AppBundle\Entity\Poste;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorage;

class PosteListener
{
    private $tokenStorage;

    function __construct(TokenStorage $tokenStorage)
    {
        $this->tokenStorage = $tokenStorage;
    }


    public function prePersist(Poste $poste, LifecycleEventArgs $event)
    {
        $user = $this->tokenStorage->getToken()->getUser();
        $poste->setCreatedByGroup($user->getGroup());
    }
}