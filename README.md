# Projet Nombre Mystère

## 1/ Présentation

- Membres du projet:

         PEYRATAUD Enzo
         MONTAGNIER Yrlan
         ABEILLE Paul-Antoine

- **Début du projet :** 22/03/2022

- **Fin du projet :** 15/05/2022

> **But du projet :** Créer un jeu 1 v 1 basé sur une combinaison de nombre a trouver, le nombre est généré aléatoirement par le programme , pousser le jeu avec d'autre fonctionnalités ( ajout d'objet qui vont interagir dans le jeu : bonus ou malus)

> **Langage** : C# / autres langages ( Python?)

> **BDD :** pour gestion profil joueur + bonus malus sous forme d'objet qui vont intéragir dans le jeu, en MySQL ( Wamp / XAMPP)

## 2/ Difficultés

Points difficulté : **30**

- Communication en réseau local entre deux machines : **6 points**
- Base de données : **3 points**

- Algorithme avancé : **3 points** ( peut être un algorithme de régération d'objet en fonction du jeu )

- Interaction (bouton etc) : **2 points**

- CRUD : _0 points_

- Connexion telnet en local ( en attente de connexion pour l'autre joueur, pseudo, date entrée file) : **1 points**

- Communication entre les deux joueurs ( chat écrit, le plateau de jeu
  si le match est fini, s'il y a eu victoire du joueur 1, du joueur 2 ou égalité ) : **1 points**
- Système de tour par tour : **1 points**

- le serveur de Matchmaking contient :
  le lien avec la base de données Difficulté : **3 points**
  un système de socket avec les actions suivantes : Difficulté : **5 points**
  arrivé d’un client dans la file d’attente (réception)
  début d’un match (envoie)
  réception d’un tour (réception puis envoie)
  fin d’un match (envoie)
- une vérification constante de la file d’attente et création de matchs en fonction
  Difficulté : _2 (pas faire)_

Une logique de jeu. Vous êtes libre quant au choix du jeu. Cela doit cependant
être un jeu de plateau au tour par tour (Ex : puissance 4, dames, morpion, ...)
Difficulté : **5 points**

- une partie de la logique du jeu choisis. Difficulté : **2 points ( pas faire )**
  soit : Difficulté : _3 points ( pas faire)_
  une IHM pour pouvoir jouer
  une CLI avec IA
