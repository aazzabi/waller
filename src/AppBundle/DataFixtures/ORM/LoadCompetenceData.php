<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Competence;

class LoadCompetenceData
    extends AbstractFixture
    implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        //*
        $competences = ['Symfony3', 'Java', 'CSS3', 'HTML5', 'Laravel', '.Net', 'JQuery', 'ReactJS', 'NodeJS'
            , 'Elastic search', 'Ruby', 'Django', ' CSS3', ' HTML5', 'Symfony', 'Php'];
        foreach ($competences as $competence) {
            $obj = new Competence();
            $obj->setLibelle($competence);
            $manager->persist($obj);
        }

        $manager->flush();
        //*/
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