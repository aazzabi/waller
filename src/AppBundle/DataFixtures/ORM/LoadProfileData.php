<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Profile;
use Faker;

class LoadProfileData
    extends AbstractFixture
    implements OrderedFixtureInterface
{

    /**
     * @var dispobilites
     */
    private $dispobilites;

    /**
     * @var dispobilites
     */
    private $competences;

    public function load(ObjectManager $manager)
    {
        //*
        $faker = Faker\Factory::create();
        for ($i = 0; $i < 5; $i++) {
            $obj = new Profile();
            $obj->setEmail($faker->email);
            $obj->setExperience($faker->numberBetween(0, 15));
            $obj->setNom($faker->lastName);
            $obj->setPrenom($faker->firstName);
            $obj->setNiveau($this->getRandomNiveau());
            $obj->setPrestationsalariale($faker->numberBetween(1000, 3000));
            $obj->setDisponibilite($this->getRandomDisponibilite($manager));
            $username = $faker->userName;
            $obj->setTelephone($faker->phoneNumber);
            $obj->setFacebook('http://www.facebook.com/' . $username);
            $obj->setGithub('http://www.github.com/' . $username);
            $obj->setLinkedin('http://www.linkedin.com/' . $username);
            $obj->setSkype($username);
            $obj->setSivp($faker->boolean);
            $nbrCompetences = $faker->numberBetween(2, 10);
            for ($i = 0; $i < $nbrCompetences; $i++) {
                $competence = $this->getRandomCompetence($manager);
                if ($obj->getCompetences()->contains($competence)) {
                    $obj->addCompetence();
                }
            }

            $manager->persist($obj);
        }

        $manager->flush();
        //*/
    }

    private function getRandomNiveau()
    {
        $niveaux = array('SENIOR', 'JUNIOR', 'CONFIRMED', 'EXPERT', 'HERO');
        return $niveaux[array_rand($niveaux)];
    }

    private function getRandomDisponibilite(ObjectManager $manager)
    {
        if ($this->dispobilites == null) {
            $this->dispobilites = $manager->getRepository('AppBundle:Disponibilite')->findAll();
        }
        return $this->dispobilites[array_rand($this->dispobilites)];
    }

    private function getRandomCompetence(ObjectManager $manager)
    {
        if ($this->competences == null) {
            $this->competences = $manager->getRepository('AppBundle:Competence')->findAll();
        }
        return $this->competences[array_rand($this->competences)];
    }

    /**
     * Get the order of this fixture
     * @return integer
     */
    public function getOrder()
    {
        return 2;
    }
}