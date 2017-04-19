<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Poste;
use Faker;

class LoadPosteData
    extends AbstractFixture
    implements OrderedFixtureInterface
{

    /**
     * @var groups
     */
    private $groups;

    /**
     * @var groups
     */
    private $liens;

    public function load(ObjectManager $manager)
    {   //*
        $faker= Faker\Factory::create();
        for ($i=0;$i<20;$i++){
            $obj = new Poste();
            $obj->setLibelle($faker->jobTitle);
            $obj->setDescription($faker->sentence(50));
            $obj->setCreatedByGroup($this->getRandomGroup($manager));
            $obj->setGroup($this->getRandomGroup($manager));
            $obj->setProfileDemande($faker->sentence(10));
            $manager->persist($obj);
        }

        $manager->flush();//*/
    }

    public function getRandomGroup(ObjectManager $manager){
        if($this->groups == null) {
            $this->groups = $manager->getRepository('AppBundle:Group')->findAll();
        }
        return $this->groups[array_rand($this->groups)];
    }

    /**
     * Get the order of this fixture
     * @return integer
     */
    public function getOrder()
    {
        return 3;
    }
}