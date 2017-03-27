<?php namespace AppBundle\Entity\Listeners;

use AppBundle\Entity\Rapport;
use Doctrine\ORM\Event\LifecycleEventArgs;

class RapportListener
{

    public function prePersist(Rapport $rapport, LifecycleEventArgs $event)
    {
        $rapport->setDateCreated(new \DateTime());
        $rapport->setDateUpdated(new \DateTime());
    }
}