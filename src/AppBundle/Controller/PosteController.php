<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Lien;
use AppBundle\Entity\Poste;
use AppBundle\Form\LienType;
use AppBundle\Form\PosteType;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Finder\Exception\AccessDeniedException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\HttpException;

/**
 * Poste controller.
 *
 * @Route("poste")
 */
class PosteController extends Controller
{
    /**
     * Lists all poste entities.
     *
     * @Route("/", name="poste_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $user = $this->get('security.token_storage')->getToken()->getUser();
        $groupId = $user->getGroup()->getId();

        $postes = $this->get('model_manager.poste')->retrievePostesByGroupId($groupId);

        return $this->render('poste/index.html.twig', array(
            'postes' => $postes,
        ));
    }

    /**
     * Creates a new poste entity.
     *
     * @Route("/new", name="poste_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        if ($this->get('security.authorization_checker')->isGranted('ROLE_CONSULT')) {
            throw new AccessDeniedException("Vous n'êtes pas autorisés à accéder à cette page!", Response::HTTP_FORBIDDEN);
        }
        $poste = new Poste();
        $form = $this->createForm(PosteType::class, $poste);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($poste);
            $em->flush($poste);


            return $this->redirectToRoute('poste_show', array('id' => $poste->getId()));
        }

        return $this->render('poste/new.html.twig', array(
            'poste' => $poste,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a poste entity.
     *
     * @Route("/{id}", name="poste_show")
     * @Method("GET")
     */
    public function showAction(Poste $poste)
    {
        $user = $this->get('security.token_storage')->getToken()->getUser();
        if ($user->getGroup() != $poste->getGroup() &&
            $user->getGroup() != $poste->getCreatedByGroup()
        ) {
            throw new AccessDeniedException("Vous n'êtes pas autorisés à accéder à cette page!", Response::HTTP_FORBIDDEN);
        }
        $deleteForm = $this->createDeleteForm($poste);

        return $this->render('poste/show.html.twig', array(
            'poste' => $poste,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing poste entity.
     *
     * @Route("/{id}/edit", name="poste_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Poste $poste)
    {
        if ($this->get('security.authorization_checker')->isGranted('ROLE_CONSULT')) {
            throw new AccessDeniedException("Vous n'êtes pas autorisés à accéder à cette page!", Response::HTTP_FORBIDDEN);
        }
        $user = $this->get('security.token_storage')->getToken()->getUser();
        if ($user->getGroup() != $poste->getGroup() && $user->getGroup() != $poste->getCreatedByGroup()) {
            throw new AccessDeniedException("Vous n'êtes pas autorisés à accéder à cette page!", Response::HTTP_FORBIDDEN);
        }
        $em = $this->getDoctrine()->getManager();

        $originalLiens = new ArrayCollection();
        foreach ($poste->getLiens() as $lien) {
            $originalLiens->add($lien);
        }

        $deleteForm = $this->createDeleteForm($poste);
        $editForm = $this->createForm(PosteType::class, $poste);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            foreach ($originalLiens as $lien) {
                if ($poste->getLiens()->contains($lien) === false) {
                    $poste->removeLien($lien);
                    $em->remove($lien);
                }
            }

            $em->persist($poste);
            $em->flush();
            $request->getSession()
                ->getFlashBag()
                ->add('success', 'Poste modifié avec succès!');
            return $this->redirectToRoute('poste_edit', array('id' => $poste->getId()));
        }

        return $this->render('poste/edit.html.twig', array(
            'poste' => $poste,
            'form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a poste entity.
     *
     * @Route("/{id}", name="poste_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, poste $poste)
    {
        $user = $this->get('security.token_storage')->getToken()->getUser();
        if ($user->getGroup() != $poste->getGroup() && $user->getGroup() != $poste->getCreatedByGroup()) {
            throw new AccessDeniedException("Vous n'êtes pas autorisés à accéder à cette page!", Response::HTTP_FORBIDDEN);
        }
        $form = $this->createDeleteForm($poste);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($poste);
            $em->flush($poste);
        }

        return $this->redirectToRoute('poste_index');
    }

    /**
     * Creates a form to delete a poste entity.
     *
     * @param Poste $poste The poste entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Poste $poste)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('poste_delete', array('id' => $poste->getId())))
            ->setMethod('DELETE')
            ->getForm();
    }
}
