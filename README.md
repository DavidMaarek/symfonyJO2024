JO2024
======

## Consignes

Vous devez créer un nouveau projet sur Symfony sur le thème des Jeux Olympiques de Paris
2024.

Vous devez également créer un bundle avec votre prénom (exemple YoannBundle pour moi)
et vos URL doivent être préfixées par votre prénom (exemple 127.0.0.1:8000/yoann pour la
page d’accueil de mon bundle). Tout votre PHP doit se trouver dans ce bundle.

L’objectif est de recenser les athlètes par pays et discipline.
Vous devez donc créer trois entités :

- Athlete : id, nom, prénom, date_naissance, photo
- Discipline : id, nom
- Pays : id, nom, drapeau

Ces entités doivent être liées par des jointures :

- un athlète possède un pays, et un pays possède plusieurs athlètes
- un athlète possède une discipline, et une discipline possède plusieurs athlètes.


## Liste des pages

**Page pays**
Cette page doit lister tous les pays stockés en base de données, en affichant :

- Le nom du pays et son drapeau.

Elle doit également permettre :

- D’ajouter un nouveau pays. Lors de l’ajout d’un pays, il doit être possible d’uploader son
    drapeau,
- De supprimer un pays. Lors de la suppression d’un pays, il faut automatiquement que son
    drapeaux soit supprimé du serveur,
- D’accéder à une page d’édition, permettant de modifier un pays.

**Page discipline**
Cette page doit lister toutes les disciplines stockées en base de données, en affichant :

- Le nom de la discipline,
- Le nombre de candidats dans la discipline

Elle doit également permettre :

- D’ajouter une nouvelle discipline,
- De supprimer une discipline. Lors de la suppression d’une discipline, il faut
    automatiquement supprimer tous les athlètes de cette discipline,
- D’accéder à une page d’édition permettant de modifier le nom de la discipline.

**Page athlète**
Cette page doit lister tous les athlètes stockés en base de données, en affichant :

- Le nom, prénom, date de naissance et photo de l’athlète,
- Le nom de sa discipline,
- Le drapeau de son pays.

Elle doit également permettre :

- D’ajouter un athlète. Lors de l’ajout d’un athlète, il doit être possible d’uploader sa photo,
    de choisir son pays dans une liste déroulante. Idem pour le choix de sa discipline,
- De supprimer un athlète. Lors de la suppression d’un athlète, il faut automatiquement que
    sa photo soit supprimée du serveur,
- D’accéder à une page d’édition, permettant de modifier un athlète.


Pour toutes les pages, l’ajout, la modification ou la suppression doivent faire l’objet d’un
message flash indiquant le résultat de l’action (succès ou détail de l’échec).

Tous les textes du site doivent être traduits en français et en anglais (sauf les éléments stockés
en base de données).

Les drapeaux sont fournis dans le dossier "drapeaux".
Aucune sécurité des URL n’est demandée.


