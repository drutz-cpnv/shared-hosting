# SharedHosting

L'objectif est de créer une machine permettant l'hébérgement de plusieurs sites web.
Cette machine tournera sous Linux, l'installation et la configuration se fait "from scratch"
et sans interface graphique.

## Organisation

La classe se divise en groupes de 2 ou 3 élèves. Chaque groupe est indépendant des autres.

## Logiciels & services:

  1. Linux de base (vous avez le choix de la distribution)
  2. Service SSH
  3. Serveur Web Nginx
  4. PHP-FPM
  5. MariaDB

Chaque utilisateur du système aura donc:

 - accès SSH
 - son site web (un seul)
 - sa base de donnée

Il n'y aura pas de console d'administration pour les utilisateurs.
Le transfert de fichier se fait par SSH (scp)

Tous les utilisateurs sont isolés des autres, impossible d'accéder aux fichiers et bases de données des autres.

Lorsqu'un nouveau client demande un espace, vous devez lui donner les indications suivantes:

 - `username` et `password` pour l'accès SSH
 - `username`, `password` et `dbname` pour sa base de donnée
 - Le nom de domaine pour son site web
 - Le chemin (path) correspondant au _document root_ de son site web

## Configuration

Les clients doivent depuis leur code PHP pouvoir utiliser toutes les fonctions sans restrictions, ceci inclus donc:

 - system()
 - shell_exec()

Il n'y aura pas de `chroot` car sinon il est impossible d'utiliser des outils installés dans le système.

## Rendu

Le groupe réalisera un rapport d'installation expliquant chaque étape avec les commandes réalisées. Ceci afin de pouvoir suivre
le rapport pour re-créer la machine complète.

Il contiendra également:

 - un chapitre décrivant _comment_ l'isolation des utilisateurs a été réalisée.
 - un chapitre décrivant les opérations à effectuer lorsqu'un nouveau client demande un espace


Ce rapport sera écrit en markdown comme cette donnée!
