## Installation du projet
Afin de faire fonctionner le projet, nous devions d'abord le cloner de git, supposons que nous allons tout installer sous /var/www, les commandes que nous aurons à éxecuter serons les suivantes:

```shell 
cd /var/www
git clone git@bitbucket.org:smart-team-tn/gestion-candidatures.git
```
PS: Il est préférable de mettre une clé ssh pour l'authentification de GIT afin de ne pas avoir à retaper les identifiants à chaque commande

Ceci fait, nous nous plaçons dans le projet en question et initialisons les variables de deploiment à la main. Dans le fichier **.env** modifiez le `PROJECT_PATH`


De meme pour la configuration du serveur Nginx, modifiant dans **nginx/waller.conf** le `sever_name` en local.waller.smart-team.tn

Entre autre si nous travaillons en local, il faudra rajouter une entrée dans `/etc/hosts` comme suit:

```shell
sudo -s
echo '127.0.0.1 local.waller.smart-team.tn' >> /etc/hosts
```

PS: `local.waller.smart-team.tn` est le servername `server_name` dans le fichier nginx/waller.conf

Finalement nous déployons le projet tout simplement avec la suite de commandes qui suit:

```shell 
cd /var/www/gestion-candidatures
docker-compose up -d
```

Vérifier que les conteneurs waller_php, waller_ngnix et waller_mysql sont bien montés:

```shell
docker ps
```

##Initialiser la base de données
#####Création de la base de données
```shell
docker exec waller_php bin/console doctrine:database:create
```

#####Création de la structure
```shell
docker exec waller_php bin/console doctrine:schema:update --force
```
#####Executer la migration des données initiales: 
```shell
docker exec waller_php bin/console doctrine:migration:migrate
```

##Rajouter des migrations :
#####Création d'une nouvelle version de migration :
```shell
docker exec waller_php bin/console doctrine:migrations:generate
```
Cela va créer un nouveau fichier sous `app/DoctrineMigrations` . 
```php
<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

class Version2018XXXXXXXXXX extends AbstractMigration
{
    public function up(Schema $schema)
    {
        
    }

    public function down(Schema $schema)
    {
        
    }
}
```

#####Modification fichier de migration
Maintenant on pourra rajouter les nouveaux données en appliquant des requests SQL avec `$this->addSql()` :

```php
    public function up(Schema $schema)
    {
        $this->addSql('INSERT INTO `groupe` (`id`, `name`, `roles`) VALUES ()');
    }

    public function down(Schema $schema)
    {
        $this->addSql('DELETE * FROM `groupe` WHERE ...');
    } 
```
#####Exécution de la derniére migration crée
Une fois ceci est fait, on peut appliquer la nouvelle migration :
```bash
docker exec waller_php bin/console doctrine:migrations:migrate
```

#####Execution up et down seulement
Pour exécuter la methode **down** (respectivement **up**) d'une version donné (exemple : Version20180328133156 ), exécutez la commande suivante :
```bash
docker exec waller_php bin/console doctrine:migrations:execute Version20180328133156 --down
```