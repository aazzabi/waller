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
//        $this->addSql('INSERT INTO `groupe` (`id`,`name`,`roles`,`logo`,`logo_updated_at`,`type`)
//VALUES (1,\'Smart Team\',\'a:0{}\',\'5acf4e20a4fce518768720.jpg\',\'2018-04-12 12:16:32\',\'recrutement\');
//INSERT INTO `groupe` (`id`,`name`,`roles`,`logo`,`logo_updated_at`,`type`) VALUES (2,\'Amocer\',\'a:0:{}\',\'5acf8df72dfd8870854690.jpeg\',\'2018-04-12 16:48:55\',\'externe\');
//INSERT INTO `groupe` (`id`,`name`,`roles`,`logo`,`logo_updated_at`,`type`) VALUES (3,\'Crossover\',\'a:0:{}\',\'5acf8e6d7019b098234377.jpg\',\'2018-04-12 16:50:53\',\'externe\');
//INSERT INTO `groupe` (`id`,`name`,`roles`,`logo`,`logo_updated_at`,`type`) VALUES (4,\'IT-Prospect\',\'N;\',\'5acf8efe4c96f740280251.png\',\'2018-04-12 16:53:18\',\'externe\');');
        $this->addSql('UPDATE `recrutement`.`groupe` SET `roles`=\'a:0:{}\', `logo`= \'5acf4e20a4fce518768720.jpeg\' WHERE `id`=\'1\';');
        $this->addSql('UPDATE `recrutement`.`groupe` SET `logo`= \'5acf8df72dfd8870854690.jpg\' WHERE `id`=\'2\';');
        $this->addSql('UPDATE `recrutement`.`groupe` SET `logo`= \'5acf8e6d7019b098234377.jpeg\' WHERE `id`=\'3\';');
        $this->addSql('UPDATE `recrutement`.`user` SET `roles`=\'a:1:{i:0;s:10:\"ROLE_ADMIN\";}\' WHERE `id`=\'1\';
                            UPDATE `recrutement`.`user` SET `roles`=\'a:1:{i:0;s:10:\"ROLE_ADMIN\";}\' WHERE `id`=\'2\';
                            UPDATE `recrutement`.`user` SET `roles`=\'a:1:{i:0;s:10:\"ROLE_ADMIN\";}\' WHERE `id`=\'3\';
                            ');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs

    }
}
