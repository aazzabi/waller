<?php namespace AppBundle\Service;

use AppBundle\Entity\Competence;
use AppBundle\Entity\Profile;
use Doctrine\ORM\EntityManager;

class CompetenceService
{
    protected $em;

    public function __construct(EntityManager $entityManager)
    {
        $this->em = $entityManager;
    }

    public function bindCompetences(Profile $profile)
    {
        $array = explode(',', $profile->getCompetencesTags());
        $profile->getCompetences()->clear();
        $repository = $this->em->getRepository('AppBundle:Competence');
        foreach ($array as $item) {
            $competence = $repository->findOneBy(['libelle' => $item]);
            if ($competence == null) {
                $competence = new Competence();
                $competence->setLibelle($item);
                $this->em->persist($competence);
                $this->em->flush();
            }
            $profile->addCompetence($competence);
        }
    }
}