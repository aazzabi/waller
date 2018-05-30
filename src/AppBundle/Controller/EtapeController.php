<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Action;
use AppBundle\Entity\Etape;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Finder\Exception\AccessDeniedException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * Etape controller.
 *
 * @Route("etape")
 */
class EtapeController extends Controller
{
    /**
     * Lists all etape entities.
     *
     * @Route("/", name="etape_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        if (!$this->get('security.authorization_checker')->isGranted('ROLE_ADMIN')) {
            throw new AccessDeniedException("Vous n'êtes pas autorisés à accéder à cette page!", Response::HTTP_FORBIDDEN);
        }

        $etapes = $this->get('model_manager.etape')->retrieveAllEtapes();

        return $this->render('etape/index.html.twig', array(
            'etapes' => $etapes,
        ));
    }

    /**
     * Creates a new etape entity.
     *
     * @Route("/new", name="etape_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        if (!$this->get('security.authorization_checker')->isGranted('ROLE_ADMIN')) {
            throw new AccessDeniedException("Vous n'êtes pas autorisés à accéder à cette page!", Response::HTTP_FORBIDDEN);
        }
        $etape = new Etape();
        $form = $this->createForm('AppBundle\Form\EtapeType', $etape);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($etape);
            $em->flush($etape);

            $etapeAdded = $form->getData();
            $etapes = $this->get('model_manager.etape')->retrieveAllEtapes();

            foreach ($etapes as $etape)
            {
                if ($etape != $etapeAdded) {
                    $this->createActionsForNewEtape($etapeAdded,$etape);
                    $this->createActionsForNewEtape($etape,$etapeAdded);
                }
            }
            return $this->redirectToRoute('etape_index', array('id' => $etape->getId()));
        }

        return $this->render('etape/new.html.twig', array(
            'etape' => $etape,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a etape entity.
     *
     * @Route("/{id}", name="etape_show")
     * @Method("GET")
     */
    public function showAction(Etape $etape)
    {
        if (!$this->get('security.authorization_checker')->isGranted('ROLE_ADMIN')) {
            throw new AccessDeniedException("Vous n'êtes pas autorisés à accéder à cette page!", Response::HTTP_FORBIDDEN);
        }
        $deleteForm = $this->createDeleteForm($etape);

        return $this->render('etape/show.html.twig', array(
            'etape' => $etape,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing etape entity.
     *
     * @Route("/{id}/edit", name="etape_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Etape $etape)
    {
        if (!$this->get('security.authorization_checker')->isGranted('ROLE_ADMIN')) {
            throw new AccessDeniedException("Vous n'êtes pas autorisés à accéder à cette page!", Response::HTTP_FORBIDDEN);
        }
        $deleteForm = $this->createDeleteForm($etape);
        $editForm = $this->createForm('AppBundle\Form\EtapeType', $etape);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('etape_edit', array('id' => $etape->getId()));
        }

        return $this->render('etape/edit.html.twig', array(
            'etape' => $etape,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a etape entity.
     *
     * @Route("/{id}", name="etape_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Etape $etape)
    {
        if (!$this->get('security.authorization_checker')->isGranted('ROLE_ADMIN')) {
            throw new AccessDeniedException("Vous n'êtes pas autorisés à accéder à cette page!", Response::HTTP_FORBIDDEN);
        }

        $em = $this->getDoctrine()->getManager();

        $form = $this->createDeleteForm($etape);
        $form->handleRequest($request);

        $candidatures = $this->get('model_manager.candidature')->retrieveAllCandidatures();
        $etapeNouveau = $this->get('model_manager.etape')->retrieveEtapeById(1);
        foreach ($candidatures as $candidature)
        {
            if($candidature->getCurrentEtape() == $etape )
            {
                $candidature->setCurrentEtape($etapeNouveau);
                $em->persist($candidature);
                $em->flush();
            }
        }

        if ($form->isSubmitted() && $form->isValid()) {
            $em->remove($etape);
            $em->flush($etape);
        }

        return $this->redirectToRoute('etape_index');
    }

    /**
     * Creates a form to delete a etape entity.
     *
     * @param Etape $etape The etape entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Etape $etape)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('etape_delete', array('id' => $etape->getId())))
            ->setMethod('DELETE')
            ->getForm();
    }

    private function createActionsForNewEtape(Etape $etapeSource, Etape $etapeDestination)
    {
        $action = new Action();
        $action->setEtapeSource($etapeSource);
        $action->setEtapeDestination($etapeDestination);
        $libelle = $etapeSource.' to '.$etapeDestination;
        $action->setLibelle($libelle);

        $em = $this->getDoctrine()->getManager();
        $em->persist($action);
        $em->flush($action);
    }
}
