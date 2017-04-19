<?php
namespace AppBundle\DataFixtures\ORM;


use AppBundle\Entity\User;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Faker;

class LoadUserData
    extends AbstractFixture
    implements OrderedFixtureInterface, ContainerAwareInterface
{

    /**
     * @var ContainerInterface
     */
    private $container;

    /**
     * @var groups
     */
    private $groups;

    /**
     * Load data fixtures with the passed EntityManager
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $faker= Faker\Factory::create();
        $userManager = $this->container->get('fos_user.user_manager');
        for ($i=0;$i<20;$i++){
            $user = $userManager->createUser();
            $user->setUserName($faker->userName);
            $user->setNom($faker->firstName);
            $user->setPrenom($faker->lastName);
            $user->setEmail($faker->email);
            $user->setPlainPassword('123456');
            $user->setEnabled(true);
            $user->setGroup($this->getRandomGoup($manager));
            $userManager->updateUser($user);
        }
    }

    /**
     * Sets the container.
     * @param ContainerInterface|null $container A ContainerInterface instance or null
     */
    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    public function getRandomGoup(ObjectManager $manager){
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
        return 2;
    }


}