<p align="center"><a href="" target="_blank"><img src="https://nkinformatique.com/src/assets/img/logo-NK-informatique-bc.svg" width="200" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

<h1 align="center">Connectify</h1>
  <p align="center">
Connectify est une solution CRM. Un outil de gestion de contacts et d'actions destiné aux professionnels.
Elle permet de gérer des contacts, comptes utilisateurs, de planifier des actions et de gérer leurs informations relatives.
    <br />
    <a href="https://github.com/"><strong>Documentation détaillée »</strong></a>
    <br />
    <br />
    <a href="https://github.com/github_username/repo_name">View Demo</a>
    ·
    <a href="https://github.com/github_username/repo_name/issues">Report Bug</a>
    ·
    <a href="https://github.com/github_username/repo_name/issues">Request Feature</a>
  </p>
</div>

## Table des matières


## Fonctionnalités

* Page d'authentification : permet de se connecter à l'application.
* Page Dashboard : affichage des statistiques et des graphiques concernant les contacts et les actions ainsi que la liste ToDo permettant d'effectuer certaines actions.
* Page Contacts : affichage des contacts, possibilité de les filtrer, de les trier, de les exporter, de les ajouter, de les modifier et de les supprimer.
  * Détail d'un contact : affichage des informations relatives au contact, possibilité de les modifier, de les supprimer et d'ajouter des actions.
* Page Comptes : affichage des comptes utilisateurs, possibilité de les filtrer, de les trier, de les exporter, de les ajouter, de les modifier et de les supprimer.


## Prérequis

* PHP >= 7.3
* Composer
    `composer install`
* Apache
* MySQL
* NPM 
  `npm install`

Nous recommandons d'utiliser [Laragon](https://laragon.org/), [Xampp](https://www.apachefriends.org/fr/index.html) ou [MAMP](https://www.mamp.info/en/) afin d'avoir un environnement de développement avec les prérequis nécessaires.


## Installation

1. Clonez le dépôt GitHub :

    ```git clone https://github.com/PaixHaine/team10_workshop_2023.git```

    
1.1. Si vous utilisez Laragon, placez le dossier dans le répertoire www (faire de même avec les dossiers correspondants dans les autres serveurs de développement).

2. Installez les dépendances :

    ```composer install```
3. Installez les paquets NPM :

    ```npm install```
4. Importez la base de données dans MySQL via le fichier database.sql.gz :

    ```mysql -u root -p < database.sql```

Vous pouvez aussi l'importer en utilisant une interface graphique comme [phpMyAdmin](https://www.phpmyadmin.net/) si vous utilisez un serveur local comme Xampp.

5. Exécuter le compilateur de développement :

    ```npm run dev```
6. Exécuter le seveur de développement :

    ```php artisan serve```
7. Vous pouvez maintenant accéder à l'application via l'URL suivante :

    
    http://localhost/
N'oubliez pas d'ajouter un port spéficique (localhost:8000) si vous utilisez un environnement local et que vous avez spéficifié un port particulier dans leur ocnfiguration.

## Auteurs

- **[Pierre-Nicolas ZINSOU](https://github.com/PaixHaine)**
- **[Rémy THIBAUDEAU](https://github.com/Remy-thibaudeau)**
- **[Enzo VISCONTI]()**

## Licence

Connectify utilise la licence [MIT](https://opensource.org/licenses/MIT).
