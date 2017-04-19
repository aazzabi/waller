<?php

namespace AppBundle\Repository;

use AppBundle\Entity\Candidature;
use AppBundle\Entity\Competence;
use AppBundle\Entity\Poste;
use AppBundle\Entity\Profile;
use Symfony\Component\HttpFoundation\Session\Session;

/**
 * ProfileRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ProfileRepository extends \Doctrine\ORM\EntityRepository
{
//    public function search($input)
//    {
//        $input['sivp'] = isset($input['sivp']) ? 1 : 0;
//
//        if ($input['competence'] && $input['poste']) {
//            $ids = array_intersect($this->searchByCompetence($input), $this->searchByPoste($input));
//        } elseif (!$input['competence'] && $input['poste']) {
//            $ids = $this->searchByPoste($input);
//        } elseif ($input['competence'] && !$input['poste']) {
//            $ids = $this->searchByCompetence($input);
//        }
//
//        $select = $this->createQueryBuilder('p');
//        $select->select('p, d');
//        $select->leftJoin('p.disponibilite', 'd');
//        $select->where('p.sivp = :sivp');
//        $select->setParameter('sivp', (int)$input['sivp']);
//        if ($input['experience']) {
//            $select->andWhere('p.experience = :experience');
//            $select->setParameter('experience', (int)$input['experience']);
//        }
//        if ($input['disponibilite']) {
//            $select->andWhere('d.libelle = :dispo');
//            $select->setParameter('dispo', $input['disponibilite']);
//        }
//
//        if (isset($ids)) {
//            $select->andWhere('p.id IN (:ids)');
//            $select->setParameter('ids', $ids);
//        }
//
//        return $select->distinct()
//            ->getQuery()
//            ->getArrayResult();
//    }

    public function search($search)
    {
        $session = new Session();
        $builder = $this->createQueryBuilder('p');

        // Disponibilité
        if ($search['disponibilite'] !== null) {
            $session->set('disponibilite', $search['disponibilite']);
        } else {
            $search['disponibilite'] = $session->get('disponibilite');
        }
        if ($search['disponibilite']) {
            $builder->andWhere('p.disponibilite = :disponibilite')
                ->setParameter('disponibilite', $search['disponibilite']);
        }

        // Expérience
        if ($search['experience'] !== null) {
            $session->set('experience', $search['experience']);
        } else {
            $search['experience'] = $session->get('experience');
        }
        if ($search['experience']) {
            $builder->andWhere('p.experience >= :experience')
                ->setParameter('experience', $search['experience']);
        }

        // sivp
        $session->set('sivp', $search['sivp']);
        $search['sivp'] = $session->get('sivp');
        if ($search['sivp'] != -1) {
            $builder->andWhere('p.sivp = :sivp')
                ->setParameter('sivp', (int) $search['sivp']);
        }

        // competence
        if ($search['competences'] !== null) {
            $session->set('competences', $search['competences']);
        } else {
            $search['competences'] = $session->get('competences');
        }
        if ($search['competences']) {
        $builder->innerJoin('p.competences', 'c', 'WITH', 'c.id = :competences')
                ->setParameter('competences', $search['competences']);
        }

//        // Poste
//        if ($search['poste'] !== null) {
//            $session->set('poste', $search['poste']);
//        } else {
//            $search['poste'] = $session->get('poste');
//        }
//        if ($search['poste']) {
//            $builder
//                ->innerJoin('p.candidature','c')
//                ->innerJoin('c.poste', 'pos', 'WITH', 'p.id = :poste')
//                ->setParameter('competences', $search['poste']);
//        }

        return $builder->getQuery()->getResult();
    }

    public function searchByCompetence($input)
    {
        $result = [];
        $competences = $this->_em
            ->getRepository(Competence::class)
            ->findBy(['libelle' => $input['competence']]);

        $resultProfiles = current($competences)->getProfiles();
        foreach ($resultProfiles as $profile) {
            $result[] = $profile->getId();
        }

        return $result;
    }

    public function searchByPoste($input)
    {
        $result = [];
        $postes = $this->_em->getRepository(Poste::class)->findBy(['libelle' => $input['poste']]);
        $resultCandidature = current($postes)->getCandidatures();
        foreach ($resultCandidature as $candidature) {
            $result[] = $candidature->getProfile()->getId();
        }

        return $result;
    }
}
