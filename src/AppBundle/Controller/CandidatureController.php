<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Action;
use AppBundle\Entity\Candidature;
use AppBundle\Entity\Note;
use AppBundle\Entity\Rapport;
use AppBundle\Form\CandidatureEditType;
use AppBundle\Form\ProfileEditType;
use AppBundle\Form\ProfileType;
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
        $candidature = new Candidature();
        $form = $this->createForm('AppBundle\Form\CandidatureType', $candidature);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($candidature);
            $em->flush($candidature);

            $note = new Note();
            $note->setCandidature($candidature);
            $note->setEtape($candidature->getCurrentEtape());
            $em->persist($note);
            $em->flush($note);

            return $this->redirectToRoute('candidature_index', array('id' => $candidature->getId()));
        }

        return $this->render('candidature/new.html.twig', array(
            'candidature' => $candidature,
            'form' => $form->createView(),
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
        $etapeCourante = $candidature->getCurrentEtape();
        $idSource = $etapeCourante->getId();

        $em = $this->getDoctrine()->getManager();
        $notes = $em->getRepository('AppBundle:Note')->findAll();
        $rapports = $em->getRepository('AppBundle:Rapport')->findAll();

        $profile = $candidature->getProfile();
        $deleteForm = $this->createDeleteForm($candidature);
        $candidatureForm = $this->createForm(CandidatureEditType::class, $candidature);
        $candidatureForm->handleRequest($request);

        $etapeDestination = $candidature->getCurrentEtape();
        $idDestination = $etapeDestination->getId();
        //  $idCandidature = $candidature->getId();

        if ($request->isMethod('GET')) {
            $this->setData($candidatureForm, $candidature);
        }
        $profileForm = $this->createForm(ProfileType::class, $profile);
        $profileForm->handleRequest($request);

        if ($candidatureForm->isSubmitted() && $candidatureForm->isValid()) {
            $noteId = $request->request
                ->get('appbundle_candidature')['noteId'];
            $noteCommentaire = $request->request
                ->get('appbundle_candidature')['noteCommentaire'];
            $noteEvaluation = $request->request
                ->get('appbundle_candidature')['noteEvaluation'];
            $rapportCommentaire = $request->request
                ->get('appbundle_candidature')['rapportCommentaire'];

            $this->bindData($noteId, $noteCommentaire, $noteEvaluation, $idSource, $idDestination, $rapportCommentaire, $candidature);

            $this->getDoctrine()->getManager()->flush();
            return $this->redirectToRoute('candidature_edit', array('id' => $candidature->getId()));
        }

        return $this->render('candidature/edit.html.twig', array(
            'candidature' => $candidature,
            'profile' => $profile,
            'notes'=>$notes,
            'rapports'=>$rapports,
            'form' => $profileForm->createView(),
            'edit_form' => $candidatureForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    private function bindData($noteId, $noteCommentaire, $noteEvaluation, $idSource, $idDestination, $rapportCommentaire, $candidature)
    {
        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('AppBundle:Note');

        $actionRepo = $em->getRepository('AppBundle:Action');

        if ($rapportCommentaire && $idSource !== $idDestination) {
            $action = $actionRepo->createQueryBuilder('a')
                ->where('a.etapeSource = :source and a.etapeDestination = :destination')
                ->setParameter('source', $idSource)
                ->setParameter('destination', $idDestination)
                ->getQuery()
                ->getOneOrNullResult();
            $rapport = new Rapport();

            $rapport->setCandidature($candidature);
            $rapport->setAction($action);
            $rapport->setLibelle($rapportCommentaire);

            $em->persist($rapport);
        }
        $note = $repository->find($noteId);
        $note->setCommentaire($noteCommentaire)
            ->setEvaluation($noteEvaluation);
        $em->persist($note);
    }

    private function setData(Form $form, Candidature $candidature)
    {
        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('AppBundle:Note');
        $note = $repository->createQueryBuilder('n')
            ->where('n.candidature = :candidature')
            ->setParameter('candidature', $candidature->getId())
            ->orderBy('n.id', 'desc')
            ->setMaxResults(1)
            ->getQuery()
            ->getOneOrNullResult();

        if ($note == null ||
            $note->getEtape()->getId() != $candidature->getCurrentEtape()->getId()
        ) {
            $note = new Note();
            $note->setCandidature($candidature)
                ->setEtape($candidature->getCurrentEtape());
            $em->persist($note);
            $em->flush();
        }

        $form->get('noteId')->setData($note->getId());
        $form->get('noteCommentaire')->setData($note->getCommentaire());
        $form->get('noteEvaluation')->setData($note->getEvaluation());


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
