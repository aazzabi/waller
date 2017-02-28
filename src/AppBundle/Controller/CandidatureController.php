<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Candidature;
use AppBundle\Entity\Profile;
use AppBundle\Form\CandidatureEditType;
use AppBundle\Form\ProfileEditType;
use AppBundle\Form\ProfileType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

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

            return $this->redirectToRoute('candidature_show', array('id' => $candidature->getId()));
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
        $profile = $candidature->getProfile();
        $deleteForm = $this->createDeleteForm($candidature);
        $editForm = $this->createForm(CandidatureEditType::class, $candidature);
        $editForm->handleRequest($request);

        $editProfileForm = $this->createForm(ProfileType::class, $profile);
        $editProfileForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('candidature_edit', array('id' => $candidature->getId()));
        }

        if ($editProfileForm->isSubmitted() && $editProfileForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('candidature_edit', array('id' => $candidature->getId()));
        }

        return $this->render('candidature/edit.html.twig', array(
            'candidature' => $candidature,
            'profile' => $profile,
            'form' => $editProfileForm->createView(),
            'edit_form' => $editForm->createView(),
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
