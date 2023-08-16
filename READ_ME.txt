Environnement de travail : 

Appli :
    PHP 7.4.26
    Wamp 3.2.6
    phpMyAdmin 5.1.1

Api :
    Python 3.9.12


Installation pour le fonctionnement de l'api:

    Installer Python            => https://www.python.org/downloads/release/python-3912/ 
    Penser à cocher "Add Python 3.9 to path"

    Ensuite windows+r tapper "cmd" et copier les commandes suivantes :

            pip install pickle
            pip install pandas
            pip install flask
            pip install flask_restx



Installation pour le fonctionnement de l'appli :

    Installer Wamp 3.2.6        => https://sourceforge.net/projects/wampserver/
    Si Wamp ne fonctionne pas   => https://www.clubic.com/telecharger-fiche27009-wampserver.html

    Ensuite bien mettre le dossier dans la ou est installer Wamp "path/to/folder/www" (Il n'est pas obligatoire de tout mettre car l'Api tourne sur son propre serveur.)

    Si vous rencontrez toujours des difficultés cette appli devrait fonctionner avec tout autre serveur comme Wamp et base de données MySQL.



Lancement de l'api :

    Dans l'invite de commande tapper :

        cd path/to/folder
        python api/app.py

Lancement de l'appli :

    Création de la base de données grace au fichier "create_db.sql" dans le dossier "appli"
    Dans "/appli/script/common/conf.php" changer les identifiant pour la base de données : USER et PASS


    Sur un navigateur web tapper l'url => "http://localhost/priceProjectPhp/appli/" et utilisez l'app Web