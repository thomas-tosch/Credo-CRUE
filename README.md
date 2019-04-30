# Projet Credo-2F
Hello ! Bienvenue sur le projet Credo-2f ayant eu lieu durant la deuxieme période de projet de l'année 2018-2019.
Ce projet porte sur la mise a disposition d'un site permettant 
le recueil de témoignages autour des événements des tests nucléaires français en Polynésie française.
Une partie article ainsi que ressources permettent l'ajout d'information pertinente autour du sujet.

## Technologies

Credo est basé sur [Symfony 4](https://symfony.com) ainsi que [API Platform](https://api-platform.com) pour
la partie "back-end" du projet et dans l'objectif d'ouvrir une API Rest sur une base de donnée PostgreSQL.

Le "front-end" est divisé en sous-parties corréspondant aux sites du projet Credo (CEP, INOND, 2F) basé sur la technologie [Angular 7](http://angular.io).

La logique dèrriere ce choix de technologies est de permettre une interface dynamique avec la puissance de [Node.js](https://nodejs.org),
en attaquant une API Rest réalisé dans notre "back-end".
Cela permet de séparé notre "front-end" en 3 parties reliées au même "back-end", facilitant le developpement et la lisibilité du projet.

## Installation

Linux fortement recommandé (Windows Pro est une alternative) car Docker ne fonctionne pas sur les autres versions de Windows.

Le projet nécessite 2 packets d'installé :
+ Docker
+ Docker-compose

Une fois installé, lancer la commande suivante à la racine du projet :

```bash
docker-compose up -d
```
*Si cette commande retourne une erreur sur linux (Permission Denied ou similaire). [Solution içi](https://techoverflow.net/2017/03/01/solving-docker-permission-denied-while-trying-to-connect-to-the-docker-daemon-socket)*

L'option -d permet le lancement des containers Docker en mode Daemon (aussi appelé background).
Afin d'afficher le retour log des containers, il existe une commande :
```bash
docker-compose logs -f
```

Il est possible de vérifier l'état des containers lancé sur une machine à tout moment avec la commande :
```bash
docker ps
```

Les changements effectués sur le "front-end" ainsi que le "back-end" sont copié sur leurs containers respectifs,
via le systeme de volume de Docker. Ainsi une fois lancé il n'est pas nécessaire de procéder à un redémarage après chaque changement.
Cependant Angular possède une faiblesse si utilisé en developpement sur Docker : le temps de compilation est 4 à 6 fois plus long.
Pour résoudre à ce problème la meilleure solution sera de stopper le container du "front-end" afin de le lancer directement dans le dossier
du "front-end" :
```bash
docker stop nom_du_container_client_(cep,_crue_ou_2f)
```
Puis se placer dans le dossier du "front-end" concerné :
```bash
ng serve
```
Dorénavent le projet sera compilé très rapidement et sera toujours envoyé sur le Docker.

Finalement, pour stopper tout les containers il est recommandé de lancer la commande suivante dans la racine du projet :
```bash
docker-compose down
```

## Documentation

Le projet contient plusieurs containers dont voici la liste des ports exposé en sortie :

container | port | déscription
--- | --- | ---
php | X | commande Symfony
api | 8080 | API non caché nginx (SwaggerUI)
cache-proxy | 8081 | API caché varnish (SwaggerUI)
db | X | PostgreSQL
mercure | 1337 | Event Listener
h2-proxy | 443,444,8443,8444 | HTTPS
cep | 4200 | Angular

Il est possible d'intéragir avec un de ces container directement via 
```bash
docker exec -ti nom_du_container bash
```
Un bash s'ouvrira à la même manière d'un SSH permettant le débug du container.
