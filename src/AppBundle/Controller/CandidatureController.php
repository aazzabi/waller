<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Action;
use AppBundle\Entity\Candidature;
use AppBundle\Entity\Note;
use AppBundle\Entity\Rapport;
use AppBundle\Form\CandidatureEditType;
use AppBundle\Form\ProfileEditType;
use AppBundle\Form\ProfileType;
use AppBundle\Controller\ProfileController;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

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
        $em = $this->getDoctrine()->getManager();
        $candidatures = $em->getRepository('AppBundle:Candidature')->findAll();

        return $this->render('candidature/index.html.twig', array(
            'candidatures' => $candidatures,
        ));
    }

    /**
     * Creates a new candidature entity.
     *
     * @Route("/new", name="candidature_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $id = $request->query->get('id');

        $profiles = $em->getRepository('AppBundle:Profile')->findAll();
        $candidature = new Candidature();

        if (isset($id) && $id) {
            $profileSelected = $em->getRepository('AppBundle:Profile')->find($id);
            $candidature->setProfile($profileSelected);
        }

        $form = $this->createForm('AppBundle\Form\CandidatureType', $candidature);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($candidature);
            $em->flush($candidature);

            $note = new Note();
            $note->setCandidature($candidature);
            $note->setEtape($candidature->getCurrentEtape());
            $em->persist($note);
            $em->flush($note);

            return $this->redirectToRoute('candidature_edit', array('id' => $candidature->getId()));
        }

        return $this->render('candidature/new.html.twig', array(
            'candidature' => $candidature,
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
