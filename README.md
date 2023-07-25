# DEV'PARTY

* Coblentz Robin
* Rémili Rédouane
* Salvi Coline
* Krifah Amel

### Le Projet

DEV'Party est une application web destiné aux étudiants de SCIENCES-U sur laquelle les membres du BDE peuvent créer des événements.
Gestion des évènements et des utilisateurs.

### Les Utilisateurs

1) L'étudiant du BDE (peut créer un compte et/ ou se connecter, peut voir et participer à des événements)
2) Le membre du BDE (mêmes droits qu’un étudiant, peut ajouter des événements et voir la liste des événements et les modifier ou supprimer)
3) L'administrateur (tout + ajouter de nouvelles catégories d’événements)

### Les Evénements

Présente un certain nombre d'information : 
titre, description, une image, catégorie, nbr de participants, le créateur, le prix et une date.

Les événements sont crées par les membres du BDE et sont répartis en catégories.

L'utilisateur pourra participer a cet événement en s'inscrivant depuis la liste.

### Le Site

Le site regroupe dès sa page d’accueil (page vitrine responsive) la liste des événements, du plus proche au plus lointain, de plus un formulaire de connexion / inscription.

### Technologies

* php / MySQL
* html / css / Js
* Adobe XD
* GitHub / Trello

### L'intégration de la maquette

Répartition des éléments : 

* navigation et footer : Coline 
* Page d'accueil : Amel
* Page des évènements : Coline 
* Page Administration : Coline 

---
## Back-End
**Creation d'un MVC from scratch pour apprendre**

![devparty](/view/src/images/devparty.png)

### Base De Données

* 5 tables, notion d'unicité, clé étrangère et liens
* Base de donnée simple et évolutive
* Implémentation possible
* Fichier .sql prsésent dans projet 

### La Création des classes

Dans un dossier Model : 
* On créer les classes  (tables)  
* Attribut les (champs)
* Le Constructeur 
* Les getter/setter

### Le Création des Repository

* Permet la connection  à la BDD
* Permet au Class de communiquer à la BDD
* Définir les différentes Méthode CRUD

### Controller et Les vues

* Le Controller vérifier si les conditions sont remplis (Ex : ajout evenement => verifer que tous les champs sont remplis) 
* Lance les methode CRUD 
* Redirige vers le front


---
Thank you !


DEV'PARTY




