# Déploiement du projet en local

Ce projet est un site développé en **PHP**, sans framework, suivant une architecture de type MVC.

Ce README explique pas à pas comment **installer et lancer le projet en local** sur votre machine.

---

## Prérequis

Avant de commencer, assurez-vous d’avoir installé :

* **PHP** (version 8.0 ou supérieure recommandée)
* **MySQL** ou **MariaDB**
* Un serveur web local :

  * **XAMPP**, **WAMP**, **MAMP** *(recommandé pour débuter)*
  * ou **Apache / Nginx** configuré manuellement
* **Git** (optionnel, si le projet est récupéré via un dépôt)

---

## 1. Récupération du projet

### Option 1 : via Git

```bash
git clone https://github.com/benjaminMechenet/tomTroc.git
```

### Option 2 : via archive

* Télécharger le projet en `.zip`
* Extraire le dossier dans le répertoire du serveur local :

  * `htdocs` (XAMPP)
  * `www` (WAMP)

---

## 2. Configuration du serveur

### Point d’entrée

Le point d’entrée de l’application est :

```
index.php
```

Assurez-vous que le projet est accessible via :

```
http://localhost/tomTroc/
```

---

## 3. Configuration de la base de données

### Création de la base

1. Ouvrir **phpMyAdmin**
2. Créer une base de données (exemple) :

```
tom-troc
```

3. Importer le fichier SQL fourni dans le projet (`sql/database.sql`)

---

### Configuration de la connexion

Modifier le fichier de configuration de la base de données, situé dans :

```
/config/config.php
```
avec les informations de connexion à votre base de donnée.

Exemple :

```php
define('DB_HOST', '***');
define('DB_NAME', '***');
define('DB_USER', '***');
define('DB_PASS', '***');
```

---

## 4. Lancement du projet

### Via serveur local (XAMPP / WAMP)

1. Démarrer **Apache** et **MySQL**
2. Accéder au site via le navigateur :

```
http://localhost/tomTroc/
```

## 5. Structure du projet (exemple)

```
/tomTroc
│── index.php
│── config/
│── controllers/
│── models/
│── views/
│── services/
│── assets/
│── css/
│── js/
│── sql/
│── css/
```

* `index.php` : point d’entrée
* `controllers` : logique métier
* `models` : accès aux données
* `views` : affichage
* `assets` : images

---

## 6. Problèmes courants


### Erreur de connexion à la base

* Vérifier les identifiants
* Vérifier que MySQL est démarré

---

## 7. Environnement

Ce projet est prévu pour un **environnement local de développement**.

---

## Auteur

Projet développé par **Benjamin Mechenet**.
