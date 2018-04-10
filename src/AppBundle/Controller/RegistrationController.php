<?php

namespace AppBundle\Controller;

use FOS\UserBundle\Controller\RegistrationController as baseRegistration;
use Symfony\Component\Finder\Exception\AccessDeniedException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class RegistrationController extends baseRegistration
{
    public function registerAction(Request $request)
    {
        if (!$this->get('security.authorization_checker')->isGranted('ROLE_ADMIN')) {
            throw new AccessDeniedException("Vous n'êtes pas autorisés à accéder à cette page!", Response::HTTP_FORBIDDEN);
        }

        return parent::registerAction($request);
    }
    public function confirmedAction()
    {
        return $this->redirect($this->generateUrl('poste_index'));
    }
}
