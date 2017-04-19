<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Disponibilite;

class LoadDisponibiliteData
    extends AbstractFixture
    implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $disponibilites = ['Immédiatement', 'Dans une semaine', 'Dans un mois', 'Dans deux mois', 'Dans trois mois'];
        foreach ($disponibilites as $disponibilite) {
            $obj = new Disponibilite();
            $obj->setLibelle($disponibilite);
            $manager->persist($obj);
        }

        $manager->flush();
    }

    /**
     * Get the order of this fixture
     * @return integer
     */
    public function getOrder()
    {
        return 1;
    }
}