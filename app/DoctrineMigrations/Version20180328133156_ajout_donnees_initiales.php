<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180328133156_ajout_donnees_initiales extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
//        $this->addSql('INSERT INTO `user` (`id`, `username`, `username_canonical`, `email`, `email_canonical`, `enabled`, `salt`, `password`, `last_login`, `confirmation_token`, `password_requested_at`, `roles`, `group_id`, `nom`, `prenom`) VALUES
//              (\'1\', \'Gabriele\', \'gabriele\', \'gsantini@smart-team.tn\', \'gsantini@smart-team.tn\', \'1\', NULL, \'111\', NULL, NULL, NULL, \'a:1:{i:0;s:10:"ROLE_ADMIN";}\', \'1\', \'\', \'\'),
//              (\'2\', \'Arafet\', \'arafet\', \'aazzabi@smart-team.tn\', \'aazzabi@smart-team.tn\', \'1\', NULL, \'222\', NULL, NULL, NULL, \'a:1:{i:0;s:10:"ROLE_ADMIN";}\', \'1\', \'\', \'\'),
//              (\'3\', \'Amel\', \'amel\', \'abhar@smart-team.tn\', \'abhar@smart-team.tn\', \'1\', NULL, \'333\', NULL, NULL, NULL, \'\', \'2\', \'\', \'\'),
//              (\'4\', \'Walid\', \'walid\', \'wmnasri@smart-team.tn\', \'wmnasri@@smart-team.tn\', \'1\', NULL, \'444\', NULL, NULL, NULL, \'a:1:{i:0;s:10:"ROLE_ADMIN";}\', \'\', \'\', \'\'),
//              (\'5\', \'Cedric\', \'cedric\', \'cchalbi@smart-team.tn\', \'cchalbi@@smart-team.tn\', \'1\', NULL, \'555\', NULL, NULL, NULL, \'\', \'3\', \'\', \'\')'
//        );

        //adding groupes
        $this->addSql('INSERT INTO `groupe` (`id`, `name`, `roles`) VALUES
            (1, \'Smart Team\', \'a:1:{i:0;s:10:"ROLE_ADMIN";}\'),
            (2, \'Amocer\', \'a:0:{}\'),
            (3, \'Crossover\', \'a:0:{}\');'
        );

        //adding users
        $this->addSql('INSERT INTO `user` (`id`, `username`, `username_canonical`, `email`, `email_canonical`, `enabled`, `salt`, `password`, `last_login`, `confirmation_token`, `password_requested_at`, `roles`, `group_id`, `nom`, `prenom`) VALUES
            (1, \'Gabriele\', \'gabriele\', \'gsantini@smart-team.tn\', \'gsantini@smart-team.tn\', 1, NULL, \'$2y$13$SKYjSHauDA5QJs5hrcqi/.tpYWxSUEsh7v5VqRJqnRhXW66zhJMwO\', \'2018-03-21 15:02:21\', NULL, NULL, \'a:0:{}\', 1, \'\', \'\'),
            (2, \'Arafet\', \'arafet\', \'aazzabi@smart-team.tn\', \'aazzabi@smart-team.tn\', 1, NULL, \'$2y$13$gpgcdVKGl6PdsenBGcjOHejGom1lhlt6YXl0k5DCnCxD.YjN2MOIC\', NULL, NULL, NULL, \'a:0:{}\', 1, \'\', \'\'),
            (3, \'Amel\', \'amel\', \'abhar@smart-team.tn\', \'abhar@smart-team.tn\', 1, NULL, \'$2y$13$mHCL8Ri9oYR4alU1CwVzWOCEroDArEiGI8wjkXu0SqzM0Xibbre8u\', NULL, NULL, NULL, \'a:0:{}\', 1, \'\', \'\'),
            (4, \'François\', \'françois\', \'francois.jouffrey@amocer-idf.com \', \'francois.jouffrey@amocer-idf.com \', 1, NULL, \'$2y$13$IJIc9XVLcRUSm/5uEGGr3eEAzEZK2A8c6J3qHRXBBTHlwob8pTMCO\', NULL, NULL, NULL, \'a:0:{}\', 2, \'\', \'\'),
            (5, \'Cedric\', \'cedric\', \'cchalbi@smart-team.tn\', \'cchalbi@smart-team.tn\', 1, NULL, \'$2y$13$pW7wheSXDZ4h.nBBKwVsAukkqv4Yd6xa.3xW87v1Aa3acAV.5OSxy\', NULL, NULL, NULL, \'a:0:{}\', 3, \'\', \'\');'
        );

        $this->addSql('INSERT INTO `workflow` (`id`, `libelle`, `description`) VALUES
            (1, \'Standard Recruitment Workflow \', \'Standard Recruitment Workflow \')'
        );

        //adding etapes
        $this->addSql('INSERT INTO `etape` (`id`, `workflow_id`, `libelle`, `ordre`) VALUES 
            (\'1\', \'1\', \'Nouveau\', \'1\'),
            (\'2\', \'1\', \'Refusé\', \'2\'),
            (\'3\', \'1\', \'En attente\', \'3\'),
            (\'4\', \'1\', \'En attente d"entretien\', \'4\'),
            (\'5\', \'1\', \'Entretien programmé\', \'5\'),
            (\'6\', \'1\', \'Proposé au client\', \'6\'),
            (\'7\', \'1\', \'Recalé\', \'7\'),
            (\'8\', \'1\', \'CV proposé\', \'8\'),
            (\'9\', \'1\', \'Entretien programmé\', \'9\'),
            (\'10\', \'1\', \'CV interressant\', \'10\'),
            (\'11\', \'1\', \'Recrutement demandé\', \'11\'),
            (\'12\', \'1\', \'Proposition de recrutement\', \'12\'),
            (\'13\', \'1\', \'Recruté\', \'13\')'
        );

       //adding Actions
        $this->addSql('INSERT INTO `action` (`id`, `etape_destination_id`, `etape_source_id`, `libelle`, `affectation`) VALUES
(1, 2, 1, \'Nouveau to Refusé\', 0),
(2, 3, 1, \'Nouveau to En attente\', 0),
(3, 4, 1, \'Nouveau to En attente d entretien\', 0),
(4, 5, 1, \'Nouveau to Entretien programmé\', 0),
(5, 6, 1, \'Nouveau to Proposé au client\', 0),
(6, 7, 1, \'Nouveau to Recalé\', 0),
(7, 8, 1, \'Nouveau to CV proposé\', 0),
(8, 9, 1, \'Nouveau to Entretien programmé\', 0),
(9, 10, 1, \'Nouveau to CV interressant\', 0),
(10, 11, 1, \'Nouveau to Recrutement demandé\', 0),
(11, 12, 1, \'Nouveau to Proposition de recrutement\', 0),
(12, 13, 1, \'Nouveau to Recruté\', 0),
(13, 1, 2, \'Refusé to Nouveau\', 0),
(14, 3, 2, \'Refusé to En attente\', 0),
(15, 4, 2, \'Refusé to En attente d entretien\', 0),
(16, 5, 2, \'Refusé to Entretien programmé\', 0),
(17, 6, 2, \'Refusé to Proposé au client\', 0),
(18, 7, 2, \'Refusé to Recalé\', 0),
(19, 8, 2, \'Refusé to CV proposé\', 0),
(20, 9, 2, \'Refusé to Entretien programmé\', 0),
(21, 10, 2, \'Refusé to CV interressant\', 0),
(22, 11, 2, \'Refusé to Recrutement demandé\', 0),
(23, 12, 2, \'Refusé to Proposition de recrutement\', 0),
(24, 13, 2, \'Refusé to Recruté\', 0),
(25, 1, 3, \'En attente to Nouveau\', 0),
(26, 2, 3, \'En attente to Refusé\', 0),
(27, 4, 3, \'En attente to En attente d entretien\', 0),
(28, 5, 3, \'En attente to Entretien programmé\', 0),
(29, 6, 3, \'En attente to Proposé au client\', 0),
(30, 7, 3, \'En attente to Recalé\', 0),
(31, 8, 3, \'En attente to CV proposé\', 0),
(32, 9, 3, \'En attente to Entretien programmé\', 0),
(33, 10, 3, \'En attente to CV interressant\', 0),
(34, 11, 3, \'En attente to Recrutement demandé\', 0),
(35, 12, 3, \'En attente to Proposition de recrutement\', 0),
(36, 13, 3, \'En attente to Recruté\', 0),
(37, 1, 4, \'En attente d entretien to Nouveau\', 0),
(38, 2, 4, \'En attente d entretien to Refusé\', 0),
(39, 3, 4, \'En attente d entretien to En attente\', 0),
(40, 5, 4, \'En attente d entretien to Entretien programmé\', 0),
(41, 6, 4, \'En attente d entretien to Proposé au client\', 0),
(42, 7, 4, \'En attente d entretien to Recalé\', 0),
(43, 8, 4, \'En attente d entretien to CV proposé\', 0),
(44, 9, 4, \'En attente d entretien to Entretien programmé\', 0),
(45, 10, 4, \'En attente d entretien to CV interressant\', 0),
(46, 11, 4, \'En attente d"entretien to Recrutement demandé\', 0),
(47, 12, 4, \'En attente d entretien to Proposition de recrutement\', 0),
(48, 13, 4, \'En attente d entretien to Recruté\', 0),
(49, 1, 5, \'Entretien programmé to Nouveau\', 0),
(50, 2, 5, \'Entretien programmé to Refusé\', 0),
(51, 3, 5, \'Entretien programmé to En attente\', 0),
(52, 4, 5, \'Entretien programmé to En attente d entretien\', 0),
(53, 6, 5, \'Entretien programmé to Proposé au client\', 0),
(54, 7, 5, \'Entretien programmé to Recalé\', 0),
(55, 8, 5, \'Entretien programmé to CV proposé\', 0),
(56, 9, 5, \'Entretien programmé to Entretien programmé\', 0),
(57, 10, 5, \'Entretien programmé to CV interressant\', 0),
(58, 11, 5, \'Entretien programmé to Recrutement demandé\', 0),
(59, 12, 5, \'Entretien programmé to Proposition de recrutement\', 0),
(60, 13, 5, \'Entretien programmé to Recruté\', 0),
(61, 1, 6, \'Proposé au client to Nouveau\', 0),
(62, 2, 6, \'Proposé au client to Refusé\', 0),
(63, 3, 6, \'Proposé au client to En attente\', 0),
(64, 4, 6, \'Proposé au client to En attente d entretien\', 0),
(65, 5, 6, \'Proposé au client to Entretien programmé\', 0),
(66, 7, 6, \'Proposé au client to Recalé\', 0),
(67, 8, 6, \'Proposé au client to CV proposé\', 0),
(68, 9, 6, \'Proposé au client to Entretien programmé\', 0),
(69, 10, 6, \'Proposé au client to CV interressant\', 0),
(70, 11, 6, \'Proposé au client to Recrutement demandé\', 0),
(71, 12, 6, \'Proposé au client to Proposition de recrutement\', 0),
(72, 13, 6, \'Proposé au client to Recruté\', 0),
(73, 1, 7, \'Recalé to Nouveau\', 0),
(74, 2, 7, \'Recalé to Refusé\', 0),
(75, 3, 7, \'Recalé to En attente\', 0),
(76, 4, 7, \'Recalé to En attente d entretien\', 0),
(77, 5, 7, \'Recalé to Entretien programmé\', 0),
(78, 6, 7, \'Recalé to Proposé au client\', 0),
(79, 8, 7, \'Recalé to CV proposé\', 0),
(80, 9, 7, \'Recalé to Entretien programmé\', 0),
(81, 10, 7, \'Recalé to CV interressant\', 0),
(82, 11, 7, \'Recalé to Recrutement demandé\', 0),
(83, 12, 7, \'Recalé to Proposition de recrutement\', 0),
(84, 13, 7, \'Recalé to Recruté\', 0),
(85, 1, 8, \'CV proposé to Nouveau\', 0),
(86, 2, 8, \'CV proposé to Refusé\', 0),
(87, 3, 8, \'CV proposé to En attente\', 0),
(88, 4, 8, \'CV proposé to En attente d entretien\', 0),
(89, 5, 8, \'CV proposé to Entretien programmé\', 0),
(90, 6, 8, \'CV proposé to Proposé au client\', 0),
(91, 7, 8, \'CV proposé to Recalé\', 0),
(92, 9, 8, \'CV proposé to Entretien programmé\', 0),
(93, 10, 8, \'CV proposé to CV interressant\', 0),
(94, 11, 8, \'CV proposé to Recrutement demandé\', 0),
(95, 12, 8, \'CV proposé to Proposition de recrutement\', 0),
(96, 13, 8, \'CV proposé to Recruté\', 0),
(97, 1, 9, \'Entretien programmé to Nouveau\', 0),
(98, 2, 9, \'Entretien programmé to Refusé\', 0),
(99, 3, 9, \'Entretien programmé to En attente\', 0),
(100, 4, 9, \'Entretien programmé to En attente d entretien\', 0),
(101, 5, 9, \'Entretien programmé to Entretien programmé\', 0),
(102, 6, 9, \'Entretien programmé to Proposé au client\', 0),
(103, 7, 9, \'Entretien programmé to Recalé\', 0),
(104, 8, 9, \'Entretien programmé to CV proposé\', 0),
(105, 10, 9, \'Entretien programmé to CV interressant\', 0),
(106, 11, 9, \'Entretien programmé to Recrutement demandé\', 0),
(107, 12, 9, \'Entretien programmé to Proposition de recrutement\', 0),
(108, 13, 9, \'Entretien programmé to Recruté\', 0),
(109, 1, 10, \'CV interressant to Nouveau\', 0),
(110, 2, 10, \'CV interressant to Refusé\', 0),
(111, 3, 10, \'CV interressant to En attente\', 0),
(112, 4, 10, \'CV interressant to En attente d entretien\', 0),
(113, 5, 10, \'CV interressant to Entretien programmé\', 0),
(114, 6, 10, \'CV interressant to Proposé au client\', 0),
(115, 7, 10, \'CV interressant to Recalé\', 0),
(116, 8, 10, \'CV interressant to CV proposé\', 0),
(117, 9, 10, \'CV interressant to Entretien programmé\', 0),
(118, 11, 10, \'CV interressant to Recrutement demandé\', 0),
(119, 12, 10, \'CV interressant to Proposition de recrutement\', 0),
(120, 13, 10, \'CV interressant to Recruté\', 0),
(121, 1, 11, \'Recrutement demandé to Nouveau\', 0),
(122, 2, 11, \'Recrutement demandé to Refusé\', 0),
(123, 3, 11, \'Recrutement demandé to En attente\', 0),
(124, 4, 11, \'Recrutement demandé to En attente d entretien\', 0),
(125, 5, 11, \'Recrutement demandé to Entretien programmé\', 0),
(126, 6, 11, \'Recrutement demandé to Proposé au client\', 0),
(127, 7, 11, \'Recrutement demandé to Recalé\', 0),
(128, 8, 11, \'Recrutement demandé to CV proposé\', 0),
(129, 9, 11, \'Recrutement demandé to Entretien programmé\', 0),
(130, 10, 11, \'Recrutement demandé to CV interressant\', 0),
(131, 12, 11, \'Recrutement demandé to Proposition de recrutement\', 0),
(132, 13, 11, \'Recrutement demandé to Recruté\', 0),
(133, 1, 12, \'Proposition de recrutement to Nouveau\', 0),
(134, 2, 12, \'Proposition de recrutement to Refusé\', 0),
(135, 3, 12, \'Proposition de recrutement to En attente\', 0),
(136, 4, 12, \'Proposition de recrutement to En attente d entretien\', 0),
(137, 5, 12, \'Proposition de recrutement to Entretien programmé\', 0),
(138, 6, 12, \'Proposition de recrutement to Proposé au client\', 0),
(139, 7, 12, \'Proposition de recrutement to Recalé\', 0),
(140, 8, 12, \'Proposition de recrutement to CV proposé\', 0),
(141, 9, 12, \'Proposition de recrutement to Entretien programmé\', 0),
(142, 10, 12, \'Proposition de recrutement to CV interressant\', 0),
(143, 11, 12, \'Proposition de recrutement to Recrutement demandé\', 0),
(144, 13, 12, \'Proposition de recrutement to Recruté\', 0),
(145, 1, 13, \'Recruté to Nouveau\', 0),
(146, 2, 13, \'Recruté to Refusé\', 0),
(147, 3, 13, \'Recruté to En attente\', 0),
(148, 4, 13, \'Recruté to En attente d entretien\', 0),
(149, 5, 13, \'Recruté to Entretien programmé\', 0),
(150, 6, 13, \'Recruté to Proposé au client\', 0),
(151, 7, 13, \'Recruté to Recalé\', 0),
(152, 8, 13, \'Recruté to CV proposé\', 0),
(153, 9, 13, \'Recruté to Entretien programmé\', 0),
(154, 10, 13, \'Recruté to CV interressant\', 0),
(155, 11, 13, \'Recruté to Recrutement demandé\', 0),
(156, 12, 13, \'Recruté to Proposition de recrutement\', 0);');

        //adding competences
        $this->addSql('INSERT INTO `competence` (`id`, `libelle`) VALUES 
            (\'1\', \'Symfony\'),
            (\'2\', \'Zend\'),
            (\'3\', \'CakePHP\'),
            (\'4\', \'Laravel\'),
            (\'5\', \'Ajax\'),
            (\'6\', \'AngularJS\'),
            (\'7\', \'JQuery\'),
            (\'8\', \'ReactJS\'),
            (\'9\', \'React Native\')'
        );

        $this->addSql('INSERT INTO `disponibilite` (`id`, `libelle`) VALUES 
            (\'1\', \'Immédiatement\'),
            (\'2\', \'Dans une semaine\'),
            (\'3\', \'Dans un mois\'),
            (\'4\', \'Dans deux mois\'),
            (\'5\', \'Dans trois mois\')'
        );

    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        $this->addSql('DELETE * FROM `user`');
        $this->addSql('DELETE * FROM `groupe`');
        $this->addSql('DELETE * FROM `etape`');
        $this->addSql('DELETE * FROM `action`');
        $this->addSql('DELETE * FROM `competence`');
        $this->addSql('DELETE * FROM `disponibilite`');
        $this->addSql('DELETE * FROM `workflow`');
    }

//    public function newUsers()
//    {
//        return array(
//            'Gabriele' => array(
//                'username' => 'Gabriele',
//                'username_canonical' => 'gabriele',
//                'email' => 'gsantini@smart-team.tn',
//                'email_canonical' => 'gsantini@smart-team.tn',
//                'enabled' => '1',
//                'salt' => '',
//                'password' => '111',
//                'roles' => 'a:1:{i:0;s:10:"ROLE_ADMIN";}',
//                'group_id' => '1'
//            ),
//            'admin'     => array('code' => 'admin',
//                'email' => 'admin@amocer-idf.com',
//                'firstname' => 'super',
//                'lastname' => 'administrateur',
//                'password' => '@mocer!df2012',
//                'profile' => 'administrateur',
//                'organization' => 'dtu13-3'
//            ),
//        );
//    }
}
