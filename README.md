# CLD1 — SharedHosting

Ce projet, consiste en la création d'un serveur linux pouvant héberger plusieurs clients. Pour chaque clients, il est
mis à leur disposition une base de donnée, un accès SSH ainsi qu'un hébérgement pour une application PHP sur un domaine.

### Instructions

Les instructions pour ce travail, figurent dans le fichier ([SharedHosting.md](instructions/SharedHosting.md))

## Auteurs

- [@noe-zwissig](https://github.com/Witex15)
- [@dimitri-rutz](https://github.com/drutz-cpnv)

## Technologies

**Client CLI:** Bash

**Server OS:** Debian 12

## Installation

Installation de Debian 12 :

#### Téléchargement de l'image

Vous pouvez vous procurer la version de Debian utilisée pour le développement est sur le serveur de fichier de l'État de
Vaud ([fichiers.edu-vaud.ch](https://fichiers.edu-vaud.ch/Handlers/Download.ashx?file=Lecteur%20N%2FCommun%2FELEVE%2FINFO%2FSI-T1a%2F11_CLD%2FDEPOT_ETUDIANTS%2Fdebian-12.1.0-amd64-netinst.iso&action=download))

#### Configuration de Debian

- Sélectionner `Install`
- Sélectionner votre langue favorite (anglais dans notre cas)
- Sélectionner `switzerland`
- Sélectionner votre disposition de clavier
- Insérer le nom de la machine: `sharedhosting`
- Laisser le domaine vide
- Insérer votre mdp pour root: `votreMDP`
- Confirmé votre mdp `votreMDP`
- Créer un nouvel utilisateur: `votreNomComplet`
- Insérer le nom d'utilisateur: `votreNomUtilisateur`
- Insérer un mdp pour votre utilisateur: `votreMDPUtilisateur`
- Confirmé votre mdp `votreMDPUtilisateur`
- Sélectionner `Guided - use entire disk`
- Sélectionner votre disque dur
- Sélectionner `All files in one partition`
- Sélectionner `Finish partitioning and write changes to disk`
- Sélectionner `Yes`
- Sélectionner `No`
- Sélectionner votre pays le plus proche
- Sélectionner `deb.debian.org`
- Sélectionner `continue`
- Sélectionner `No`
- Désélectionner `Debian desktop environment`
- Désélectionner `GNOME`
- Sélectionner `ssh server`
- Sélectionner `continue`
- Sélectionner `Yes`
- Sélectionner `/dev/sda`
- Sélectionner `continue`

## Configuration

### Environment

```bash
# as root
# add mask to bash configuration and profile configuration
echo "umask 0027" >> /etc/skel/.profile
echo "umask 0027" >> /etc/skel/.bashrc
```

### PHP FPM

```shell
# as root
apt update && apt upgrade
```

```shell
# as root
apt install php8.2-fpm
```

Une fois instalé, modifier la configuration de PHP en modifiant le fichier `/etc/php/8.2/fpm/php.ini`

Le but étant d'activé les extentions PHP `pdo_mysql` ainsi que `mysqli` pour ce faire, décommenter les lignes `940`
et `946`.

Pour finir, il vous faudra installer le package `php8.2-mysql` afin de fournir à PHP le driver de mysql/mariaDB.

```bash
# as root
apt install php8.2-mysql
```

### NGINX

```shell
# as root
apt install nginx
```

### MariaDB

```shell
# as root
apt install mariadb-server -y
```

```shell
# as root
mariadb-secure-installation

> Enter current password for root (enter for none) — Enter
> Switch to unix_socket authentication [Y/n] — Y
> Change the root password? [Y/n] — Y
> Remove anonymous users? [Y/n] — Y
> Disallow root login remotely? [Y/n] — Y
> Remove test database and access to it? [Y/n] — Y
> Reload privilege tables now? [Y/n] — Y
```

# Création d'un nouveau client

## Ajout du script au serveur

Pour ce faire copier le contenu du fichier new_client de ce dépôt dans un nouveau fichier dans le répértoire `/root` à l'aide de la commande `nano`

```bash
# as root
nano /root/new_client
# coller le code copié depuis la machine hôte
# faire de ce fichier un executable
chmod +x /root/new_client
```

## Création

En utilisant le script via la commande :

```bash
~/new_client
```

Puis suivez les étapes...