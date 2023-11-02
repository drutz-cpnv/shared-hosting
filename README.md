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

TODO: Configuration de debian via l'interface

## Configuration

### Environment

```bash
# add mask to bash configuration and profile configuration
echo "umask 0027" >> /etc/skel/.profile
echo "umask 0027" >> /etc/skel/.bashrc
```

### PHP FPM

```shell
# as root
apt update && apt upgrade --show-upgradedd
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

