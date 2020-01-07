Installation
========================

composer install

Database
========================

Create file .env and configure access to the database
* DATABASE_URL=mysql://username:password@127.0.0.1:3306/db_name
--------
* php app/console doctrine:database:create
* php app/console doctrine:schema:update --force

Usage
=====

* L'import en base des commandes se fait via la commande : php bin/console app:get-orders-list
* Et dès le lancement du serveur web: php -S 127.0.0.1:8000 -t public
* L'url pour ajouté une commande : http://127.0.0.1:8000/admin
