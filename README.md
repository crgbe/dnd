DND AGENCY

1- Avoir docker d'installé sur sa machine
2- Se placer à la racine du projet et exécuter docker-compose up
3- Se connecter au conteneur php_apache en exécutant: docker exec -it dnd_server bash
4- Exécuter la commande développée pour effectuer des tests:

bin/console app:upload-file
ou
bin/console app:upload-file --extension=json
