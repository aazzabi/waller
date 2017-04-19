<?php namespace AppBundle\Controller;

use AppBundle\Entity\Profile;
use AppBundle\Form\ProfileType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;

/**
 * Profile controller.
 *
 * @Route("profile")
 */
class ProfileController extends Controller
{
    /**
     * Lists all profile entities.
     *
     * @Route("/", name="profile_index")
     * @Method("GET")
     */
    public function indexAction(Request $request)
    {
        $search = [];
        $search['disponibilite'] = $request->get('disponibilite', null);
        $search['experience'] = (int)$request->get('experience', null);
//        $search['competences'] = $request->get('competence', null);

        $em = $this->getDoctrine()->getManager();

        $disponiblites = $em->getRepository('AppBundle:Disponibilite')->findAll();
        $postes = $em->getRepository('AppBundle:Poste')->findAll();
        $groupes = $em->getRepository('AppBundle:Group')->findAll();
        $competences = $em->getRepository('AppBundle:Competence')->findAll();

        $profiles =  $em->getRepository('AppBundle:Profile')->search($search);

        return $this->render('profile/index.html.twig', array(
            'profiles' => $profiles,
            'disponibilites' => $disponiblites,
            'postes' => $postes,
            'groupes' => $groupes,
            'competences' => $competences,
        ));
    }

    /**
     * Lists all profile entities.
     *
     * @Route("/", name="profile_search")
     * @Method("POST")
     */
    public function searchAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $results = $em->getRepository(Profile::class)->search($request->request->all());
        print_r($results);
        die;
        return new JsonResponse($results);
    }

    /**
     * Creates a new profile entity.
     *
     * @Route("/new", name="profile_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $profile = new Profile();
        $form = $this->createForm('AppBundle\Form\ProfileType', $profile);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->get('app.candidature_service')->bindCompetences($profile);
            $em = $this->getDoctrine()->getManager();
            $em->persist($profile);
            $em->flush($profile);
            return $this->redirectToRoute('profile_show', array('id' => $profile->getId()));
        }

        return $this->render('profile/new.html.twig', array(
            'profile' => $profile,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a profile entity.
     *
     * @Route("/{id}", name="profile_show", requirements={"id": "\d+"})
     * @Method("GET")
     */
    public function showAction(Profile $profile)
    {
        $deleteForm = $this->createDeleteForm($profile);

        return $this->render('profile/show.html.twig', array(
            'profile' => $profile,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing profile entity.
     *
     * @Route("/{id}/edit", name="profile_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Profile $profile)
    {
        $deleteForm = $this->createDeleteForm($profile);
        $editForm = $this->createForm(ProfileType::class, $profile);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->get('app.candidature_service')->bindCompetences($profile);
            $this->getDoctrine()->getManager()->flush();

            $request->getSession()
                ->getFlashBag()
                ->add('success', 'Profile modifié avec succès!');
            return $this->redirectToRoute('profile_edit', array('id' => $profile->getId()));
        }

        return $this->render('profile/edit.html.twig', array(
            'profile' => $profile,
            'form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing profile entity.
     *
     * @Route("/competences",
     *     options = { "expose" = true },
     *     name="profile_competences"
     * )
     * @Method({"GET"})
     */
    public function competencesAction()
    {
        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('AppBundle:Competence');
        $competences = $repository->findAll();
        $json = [];
        foreach ($competences as $competence) {
            $json[] = $competence->getLibelle();
        }
        return new JsonResponse($json);
    }

    /**
     * Deletes a profile entity.
     *
     * @Route("/{id}", name="profile_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Profile $profile)
    {
        $form = $this->createDeleteForm($profile);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($profile);
            $em->flush($profile);
        }
        return $this->redirectToRoute('profile_index');
    }

    /**
     * Creates a form to delete a profile entity.
     *
     * @param Profile $profile The profile entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Profile $profile)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('profile_delete', array('id' => $profile->getId())))
            ->setMethod('DELETE')
            ->getForm();
    }


    public function findByAuthorAndDate()
    {

    }
}