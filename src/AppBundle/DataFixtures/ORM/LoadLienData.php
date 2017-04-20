<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Lien;
use Faker;

class LoadLienData
    extends AbstractFixture
    implements OrderedFixtureInterface
{

    /**
     * @var postes
     */
    private $postes;

    /**
     * @var jobSearchSites
     */
    private $jobSearchSites = array(
        0 => "http://www.keejob.com/",
        1 => "http://www.tanitjobs.com/",
        2 => "http://www.farojob.com/"
    );

    public function load(ObjectManager $manager)
    {
        /*
        $faker = Faker\Factory::create();
        for ($i = 0; $i < 5; $i++) {
            $obj = new Lien();
            $obj->setLibelle($faker->jobTitle);
            $obj->setUrl($this->getRandomLink() . $faker->text(10));
            $obj->setPoste($this->getRandomPoste($manager));

            $manager->persist($obj);
        }

        $manager->flush();
        //*/
    }

    public function getRandomPoste(ObjectManager $manager)
    {
        if ($this->postes == null) {
            $this->postes = $manager->getRepository('AppBundle:Poste')->findAll();
        }
        return $this->postes[array_rand($this->postes)];
    }

    public function getRandomLink()
    {
        return $this->jobSearchSites[array_rand($this->jobSearchSites)];
    }

    /**
     * Get the order of this fixture
     * @return integer
     */
    public function getOrder()
    {
        return 4;
    }
}