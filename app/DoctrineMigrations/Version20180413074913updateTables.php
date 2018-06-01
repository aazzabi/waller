<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180413074913updateTables extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        $this->addSql('UPDATE `recrutement`.`user` SET `roles`=\'a:1:{i:0;s:10:\"ROLE_ADMIN\";}\' WHERE `id`=\'1\';
            UPDATE `recrutement`.`user` SET `roles`=\'a:1:{i:0;s:10:\"ROLE_ADMIN\";}\' WHERE `id`=\'2\';
            UPDATE `recrutement`.`user` SET `roles`=\'a:1:{i:0;s:10:\"ROLE_ADMIN\";}\' WHERE `id`=\'3\';');

        $this->addSql('INSERT INTO `user` (`id`, `username`, `username_canonical`, `email`, `email_canonical`, `enabled`, `salt`, `password`, `last_login`, `confirmation_token`, `password_requested_at`, `roles`, `group_id`, `nom`, `prenom`) VALUES
            (6, \'Rim\', \'rim\', \'rbader@smart-team.tn\', \'rbader@smart-team.tn\', 1, NULL, \'$2y$13$O6ZjRErD7E5a1RPqLCdiqeVgaYRWw/vipkXGIAqXW5Flw03lmshPm\', NULL, NULL, NULL, \'a:1:{i:0;s:11:\"ROLE_SAISIE\";}\', 1, \'Bader\', \'Rim\'),
            (7, \'Marcello\', \'marcello\', \'mbarille@smart-team.tn\', \'mbarille@smart-team.tn\', 1, NULL, \'$2y$13$OgIm.ESOnUKak190m.KpB.fagFrwzTmeFx3hGWNIzUa88EyrAuULa\', NULL, NULL, NULL, \'a:1:{i:0;s:11:\"ROLE_EXAMIN\";}\', 1, \'Barille\', \'Marcello\'),
            (8, \'Ghayth\', \'ghayth\', \'grokbani@smart-team.tn\', \'grokbani@smart-team.tn\', 1, NULL, \'$2y$13$ZTE6mVFRxOEY9URRe/SsM.VLp4W1rAog4hg5pFY/fRXJxZkwFr5Ke\', NULL, NULL, NULL, \'a:1:{i:0;s:11:\"ROLE_EXAMIN\";}\', 1, \'Rokbani\', \'Ghayth\'),
            (9, \'Sergio\', \'sergio\', \'sgazzo@smart-team.tn\', \'sgazzo@smart-team.tn\', 1, NULL, \'$2y$13$5zWN0H/kohqpZUBWjTKsluguplCFa4x.WYKbIfm70U3KRv72Hcv6m\', NULL, NULL, NULL, \'a:1:{i:0;s:12:\"ROLE_CONSULT\";}\', 1, \'Gazzo\', \'Sergio\');'
        );
    }


    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs

    }
}
