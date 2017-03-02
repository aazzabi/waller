<?php namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;

/**
 * @Route("/fixtures")
 */
class FixturesController extends Controller
{
    /**
     * @Route("/users", name="fixtures_users")
     */
    public function usersAction()
    {
        //access user manager services
        $userManager = $this->get('fos_user.user_manager');

        $user = $userManager->createUser();
        $user->setUsername('Gabriele');
        $user->setEmail('gsantini@smart-team.tn');
        $user->setPlainPassword("111");
        $userManager->updateUser($user);

        $usera = $userManager->createUser();
        $usera->setUsername('Arafet');
        $usera->setEmail('aazzabi@smart-team.tn');
        $usera->setPlainPassword("222");
        $userManager->updateUser($usera);

        $usersy = $userManager->createUser();
        $usersy->setUsername('Syrine');
        $usersy->setEmail('scheikhrouhou@smart-team.tn');
        $usersy->setPlainPassword("333");
        $userManager->updateUser($usersy);

        $userse = $userManager->createUser();
        $userse->setUsername('Seifallah');
        $userse->setEmail('sazzabi@smart-team.tn');
        $userse->setPlainPassword("444");
        $userManager->updateUser($userse);

        $userseb = $userManager->createUser();
        $userseb->setUsername('Sebastien');
        $userseb->setEmail('sebastien@smart-team.tn');
        $userseb->setPlainPassword("555");
        $userManager->updateUser($userseb);


        return new Response("5 users added!");
    }
}