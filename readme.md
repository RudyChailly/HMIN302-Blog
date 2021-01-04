# Blog

Ce projet a été réalisé avec [Symfony](https://symfony.com/). Il est hébergé de manière gratuite sur [Heroku](https://www.heroku.com/). Les données se trouvent sur une base [postgreSQL](https://www.postgresql.org/) liée à notre serveur Heroku.
Le projet se trouve à l'adresse suivante : https://chailly-dejesusmartins-blog.herokuapp.com/

## API
Pour ce site, nous avons réalisé une [API](https://chailly-dejesusmartins-blog.herokuapp.com/api) grâce au module [API Platform](https://api-platform.com/) permettant de récupérer les articles de l'application.
Nous avons aussi utilisé l'API d'un autre blog accessible par le lien : [Articles partenaires](https://chailly-dejesusmartins-blog.herokuapp.com/article/partners) du site. Cette API a été réalisé par Didier Adrien et Martin Loïc et est accessible sur leur [site](https://didier-martin-blog.herokuapp.com/api).

## Utilisation de l'application
Ce site est un blog permettent à des utilisateurs de poster des articles sur des thèmes variés.
Trois types d'utilisateurs y sont répertoriés :

- Les utilisateurs non connectés (*Anonyme*)
- Les utilisateurs connectés (*User*)
- Les administrateurs (*Admin*)

La liste des utilisateurs du site (Users et Admins) se trouve sur un [tableur](https://docs.google.com/spreadsheets/d/1bDG_LahEpaoO8RE9biHUZoeTfJn7EjHAqyWRUUyM0kE/edit?usp=sharing).

### Anonyme
Les **utilisateurs non connectés** ont accès à la liste des articles, ainsi qu'au profil des utilisateurs ayant écrit un article.

### Users
Les **utilisateurs connectés** ont accès aux même fonctionnalités que les utilisateurs Anonymes.
De plus, ils peuvent :

- écrire un article
- commenter des articles
- éditer leur profil
- suivre un utilisateur
- signaler un article, un utilisateur et un commentaire

### Admin
Les **administrateurs** du site sont aussi des Users et peuvent donc réaliser les mêmes actions que ces derniers.
Ils peuvent aussi gérer la communauté et le contenu du site. Pour cela, ils ont accès à un tableau de bord leur permettant de :

- Voir tous les articles, leur nombres de signalement et ainsi pouvoir les supprimer
- Voir tous les utilisateurs, leur nombres de signalement et ainsi pouvoir les supprimer
- Voir tous les signalements, regroupés par : Articles, Utilisateur et Commentaires. Ils peuvent valider un signalement et ainsi supprimer l'élément signalé ou supprimer le signalement.
