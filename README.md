# snowboard
[![Maintainability](https://api.codeclimate.com/v1/badges/9655c3ef05dcfc6cfc86/maintainability)](https://codeclimate.com/github/ZAmararene/snowboard/maintainability)

## Description du projet
L'on objectif est la création d'un site collaboratif pour faire connaitre le snowboard auprès du grand public et aider à l'apprentissage des figures (tricks).

## Pré-requis
* PHP >= 7.1
* MySQL > 5.7

## Installation
Récupérer les sources du projet :
```
$ git clone git@github.com:ZAmararene/snowboard.git
```

Installer les dépendances:
```
$ composer install
```

Configurer la connexion à la base de donnée dans le ficher :
```
$ .env
```

Créer la base de données :
```
$ php bin/console doctrine:database:create
```

Migrer les tables dans la base de données :
```
$ php bin/console doctrine:migrations:migrate
```

Charger les fixtures dans la base de données :
```
$ php bin/console doctrine:fixtures:load
```

Lancer le serveur :
```
$ php bin/console server:run
```
