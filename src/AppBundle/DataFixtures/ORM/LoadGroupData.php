<?php
namespace AppBundle\DataFixtures\ORM;


use AppBundle\Entity\Group;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Faker;

class LoadGroupData
    extends AbstractFixture
    implements OrderedFixtureInterface, ContainerAwareInterface
{

    /**
     * @var ContainerInterface
     */
    private $container;

    /**
     * Load data fixtures with the passed EntityManager
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        //*
        $faker= Faker\Factory::create();
        for ($i=0;$i<5;$i++){
            $group = new Group();
            $group->setName($faker->company);
            $group->setRoles(array($this->getRandomRole()));
            $manager->persist($group);
        }
        $manager->flush();
        //*/
    }

    /**
     * Sets the container.
     * @param ContainerInterface|null $container A ContainerInterface instance or null
     */
    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    public function getRandomRole(){
        $roles  = array('ROLE_ADMIN', 'ROLE_USER', 'ROLE_SUPER_ADMIN' );
        return $roles[array_rand($roles)];
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