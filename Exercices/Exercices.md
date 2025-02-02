# EXERCICES PHP

## Exercice 1

### Contexte
Vous travaillez sur un système de gestion de panier d'achat pour un site e-commerce. Le système doit afficher des messages personnalisés en fonction du montant total des achats d'un client et appliquer une réduction si certaines conditions sont remplies.

### Énoncé
Écrivez un script PHP qui :

1. Déclare une variable `$total_achats` représentant le montant total du panier.
    - Initialisez-la avec une valeur (par exemple, 120).

2. Vérifie le montant total du panier et effectue les actions suivantes :
    - Si le total des achats est inférieur à 50 € :
      - Affiche : "Ajoutez encore quelques articles pour bénéficier d'une livraison gratuite."
    - Si le total des achats est compris entre 50 € et 100 € inclus :
      - Affiche : "Félicitations ! La livraison est offerte."
    - Si le total des achats est supérieur à 100 € :
      - Applique une réduction de 10 % sur le total
      - Affiche le nouveau montant réduit ainsi qu'un message : "Merci pour votre commande ! Vous bénéficiez d'un bon d'achat de 10 € pour votre prochaine commande."

### Cas de test
Testez votre script avec les valeurs suivantes pour `$total_achats` :
1. 30 € : Le montant est inférieur à 50 €
2. 75 € : Le montant est entre 50 € et 100 €
3. 120 € : Le montant est supérieur à 100 €, et la réduction doit être appliquée

### Bonus
- Ajoutez une condition supplémentaire : si le montant dépasse 200 €, appliquez une réduction supplémentaire de 5 % après la première réduction.


<hr><hr><hr><hr><hr>


## Exercice 2

### Contexte
Vous travaillez sur un système de gestion des commandes pour un site e-commerce. Vous devez afficher un message en fonction du statut de la commande. Les statuts possibles sont :
- En attente
- Expédiée
- Livrée 
- Annulée

### Objectif
- Utiliser des constantes pour représenter des valeurs fixes
- Apprendre à utiliser la structure switch pour gérer plusieurs cas de figure

### Instructions
1. Déclarez des **constantes** pour représenter les statuts de la commande :
    - STATUT_EN_ATTENTE
    - STATUT_EXPEDIEE 
    - STATUT_LIVREE
    - STATUT_ANNULEE

2. Déclarez une variable `$statut_commande` et initialisez-la avec l'une des constantes définies

3. Utilisez une structure switch pour afficher un message différent en fonction du statut :
    - STATUT_EN_ATTENTE : "Votre commande est en attente de traitement."
    - STATUT_EXPEDIEE : "Votre commande a été expédiée."
    - STATUT_LIVREE : "Votre commande a été livrée."
    - STATUT_ANNULEE : "Votre commande a été annulée."

4. Ajoutez un cas default pour gérer les statuts non prévus : "Statut de commande inconnu."

### Cas de test
Testez votre script avec les valeurs suivantes pour `$statut_commande` :
1. STATUT_EN_ATTENTE
2. STATUT_EXPEDIEE
3. STATUT_LIVREE
4. STATUT_ANNULEE
5. Une valeur non prévue (par exemple, "en cours")


<hr><hr><hr><hr><hr>


## Exercice 3

### Contexte
Vous travaillez sur un système de gestion des utilisateurs pour une plateforme en ligne. Vous devez déterminer la catégorie d'un utilisateur en fonction de son âge :
- Enfant : moins de 13 ans
- Adolescent : entre 13 et 17 ans
- Adulte : entre 18 et 64 ans
- Senior : 65 ans et plus

### Objectif
Découvrir et utiliser l'expression match pour gérer des conditions complexes.

### Instructions
1. Déclarez une variable `$age` avec une valeur numérique (par exemple, 25)

2. Utilisez une expression match pour déterminer la catégorie d'utilisateur :
    - Moins de 13 ans : "Enfant"
    - Entre 13 et 17 ans : "Adolescent"
    - Entre 18 et 64 ans : "Adulte"
    - 65 ans et plus : "Senior"

3. Affichez la catégorie d'utilisateur


# FONCTIONS

TODO :
Écrivez une fonction appelée "verifierMoyenne" qui prend en paramètre une note , une matière , le prénom et le collège d'un élève et qui affiche la phrase suivante :
Si la moyenne est supérieure ou égale à 10, on affiche "Bravo [prénom] ! Vous êtes reçu(e) au [collège] !"
Si la moyenne est supérieure ou égale à 8 et inférieure à 10, on affiche "Vous devez passer l'examen de rattrapage en [matière] !"
Si la moyenne est inférieure à 8, on affiche "Désolé [prénom] ! Vous êtes recalé(e) !"

Si aucun nom de collège n'est passé en paramètre, alors le collège par défaut est "Collège de France"
Si la note de l'élève n'est pas un nombre, on affiche "La note doit être un nombre !"
Si la note de l'élève n'est pas comprise entre 0 et 20, on affiche "La note doit être comprise entre 0 et 20 !"
Si le prénom de l'élève n'est pas une chaîne de caractères, on affiche "Le prénom doit être une chaîne de caractères !"
Si la matière n'est pas une chaîne de caractères, on affiche "La matière doit être une chaîne de caractères !"

Si la note est comprise entre 17 et 20, on affiche "Très bien"



<hr><hr><hr><hr><hr>

# BOUCLES


Exercice : Afficher toutes les tables de multiplication de 1 à 12
Objectif :
Utiliser des boucles imbriquées en PHP pour générer et afficher toutes les tables de multiplication de 1 à 12. Chaque table doit être affichée dans une liste HTML.

Instructions :
Créez une structure HTML de base.

Utilisez une boucle for pour parcourir les tables de 1 à 12.

Pour chaque table, utilisez une deuxième boucle for pour parcourir les multiplicateurs de 1 à 10.
