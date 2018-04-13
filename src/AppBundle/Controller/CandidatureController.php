<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Candidature;
use AppBundle\Entity\Note;
use AppBundle\Form\CandidatureEditType;
use AppBundle\Form\ProfileEditType;
use AppBundle\Form\ProfileType;
use Doctrine\DBAL\Schema\View;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Finder\Exception\AccessDeniedException;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;

/**
 * Candidature controller.
 *
 * @Route("candidature")
 */
class CandidatureController extends Controller
{
    /**
     * Lists all candidature entities.
     *
     * @Route("/", name="candidature_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $user = $this-> get('security.token_storage')->getToken()->getUser();
        $groupId = $user->getGroup()->getId();
        $candidatures = $this->get('model_manager.candidature')->retrieveCandidaturesByGroupId($groupId);

        return $this->render('candidature/index.html.twig', array(
            'candidatures' => $candidatures,
        ));
    }

    /**
     * Creates a new candidature entity.
     *
     * @Route("/new", name="candidature_new")
     * @Method({"GET", "POST"})
     * @param Request $request
     *
     * @return Response|RedirectResponse A Response instance
     */
    public function newAction(Request $request)
    {
        if ($this->get('security.authorization_checker')->isGranted('ROLE_CONSULT')) {
            throw new AccessDeniedException("Vous n'êtes pas autorisés à accéder à cette page!", Response::HTTP_FORBIDDEN);
        }
        $id = $request->query->get('id');
        $profileService = $this->get('model_manager.profile');
        $candidatureService = $this->get('model_manager.candidature');
        $profiles = $profileService->retrieveAllProfiles();

        if (isset($id) && $id) {
            $profileSelected = $profileService->retreiveProfileById($id);
        }

        $form = $candidatureService->createCandidature($profileSelected);

        if ($form instanceof RedirectResponse) {
            return $form;
        }

        return $this->render('candidature/new.html.twig', array(
            'form' => $form->createView(),
            'profiles' => $profiles,
            'profileSelected' => isset($profileSelected) ? $profileSelected : null,

        ));
    }


    /**
     * Finds and displays a candidature entity.
     *
     * @Route("/{id}", name="candidature_show")
     * @Method("GET")
     */
    public function showAction(Candidature $candidature)
    {
        $user = $this->get('security.token_storage')->getToken()->getUser();
        if ($user->getGroup() != $candidature->getGroup() &&
            $user->getGroup() != $candidature->getPoste()->getGroup() &&
            $user->getGroup() != $candidature->getPoste()->getCreatedByGroup()
        ) {
            throw new AccessDeniedException("Vous n'êtes pas autorisés à accéder à cette page!", Response::HTTP_FORBIDDEN);
        }
        $deleteForm = $this->createDeleteForm($candidature);
        return $this->render('candidature/show.html.twig', array(
            'candidature' => $candidature,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing candidature entity.
     *
     * @Route("/{id}/edit", name="candidature_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Candidature $candidature)
    {
        if ($this->get('security.authorization_checker')->isGranted('ROLE_CONSULT')) {
            throw new AccessDeniedException("Vous n'êtes pas autorisés à accéder à cette page!", Response::HTTP_FORBIDDEN);
        }
        $user = $this->get('security.token_storage')->getToken()->getUser();
        if ($user->getGroup() != $candidature->getGroup() &&
            $user->getGroup() != $candidature->getPoste()->getGroup() &&
            $user->getGroup() != $candidature->getPoste()->getCreatedByGroup()
        ) {
            throw new AccessDeniedException("Vous n'êtes pas autorisés à accéder à cette page!", Response::HTTP_FORBIDDEN);
        }
        $em = $this->getDoctrine()->getManager();
        $candidatureRepository = $em->getRepository(Candidature::class);

        $etapeCourante = $candidature->getCurrentEtape();
        $idSource = $etapeCourante->getId();
        $notes = $candidature->getNote();
        $rapports = $candidature->getRapport();
        $profile = $candidature->getProfile();

        $deleteForm = $this->createDeleteForm($candidature);
        $candidatureForm = $this->createForm(CandidatureEditType::class, $candidature);
        $candidatureForm->handleRequest($request);

        $etapeDestination = $candidature->getCurrentEtape();
        $idDestination = $etapeDestination->getId();
        //  $idCandidature = $candidature->getId();

        if ($request->isMethod('GET')) {
            $candidatureRepository->setData($candidatureForm, $candidature);
        }

        $profileForm = $this->createForm(ProfileType::class, $profile);
        $profileForm->handleRequest($request);

        if ($candidatureForm->isSubmitted() && $candidatureForm->isValid()) {

            $this->get('app.candidature_service')->bindCompetences($profile);

            $noteId = $request->request
                ->get('appbundle_candidature')['noteId'];
            $noteCommentaire = $request->request
                ->get('appbundle_candidature')['noteCommentaire'];
            $noteEvaluation = $request->request
                ->get('appbundle_candidature')['noteEvaluation'];
            $rapportCommentaire = $request->request
                ->get('appbundle_candidature')['rapportCommentaire'];

            if ($rapportCommentaire && $idSource !== $idDestination) {
                $candidatureRepository->bindData($idSource, $idDestination, $rapportCommentaire, $candidature);
            }

            $candidatureRepository->updateNote($noteId, $noteCommentaire, $noteEvaluation);

            $this->getDoctrine()->getManager()->flush();

            $request->getSession()
                ->getFlashBag()
                ->add('success', 'Candidature modifié avec succès!');
            return $this->redirectToRoute('candidature_edit', array('id' => $candidature->getId()));
        }

        return $this->render('candidature/edit.html.twig', array(
            'candidature' => $candidature,
            'profile' => $profile,
            'notes' => $notes,
            'rapports' => $rapports,
            'form' => $profileForm->createView(),
            'edit_form' => $candidatureForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a candidature entity.
     *
     * @Route("/{id}", name="candidature_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Candidature $candidature)
    {
        $user = $this->get('security.token_storage')->getToken()->getUser();
        if ($user->getGroup() != $candidature->getGroup() &&
            $user->getGroup() != $candidature->getPoste()->getGroup() &&
            $user->getGroup() != $candidature->getPoste()->getCreatedByGroup()
        ) {
            throw new AccessDeniedException("Vous n'êtes pas autorisés à accéder à cette page!", Response::HTTP_FORBIDDEN);
        }
        $form = $this->createDeleteForm($candidature);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($candidature);
            $em->flush($candidature);
        }

        return $this->redirectToRoute('candidature_index');
    }

    /**
     * Creates a form to delete a candidature entity.
     *
     * @param Candidature $candidature The candidature entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Candidature $candidature)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('candidature_delete', array('id' => $candidature->getId())))
            ->setMethod('DELETE')
            ->getForm();
    }
}
