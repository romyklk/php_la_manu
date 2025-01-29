<?php
echo "
<style>
    body {
        background-color: #eff5fa;
    }

    .title{
        color: white;
        background-color: #1d3a6d;
        padding: 10px 0;
        text-align: center;
    }

    .subtitle{
        color: white;
        background-color: #4aa0c4;
        padding: 5px 0;
        text-align: center;
    }

    .todo{
        color: crimson;
        background-color: #F2DEDE;
        padding: 10px 0;
        text-align: center;
        font-size: 20px;
    }

    .solution{
        color: green;
        background-color: #E6FFE6;
        padding: 10px 0;
        text-align: center;
    }
</style>
";

echo '<h2 class="title">1 - Structures Conditionnelles & Opérateurs de Comparison</h2>';

//----------------------------------
//isset() & empty()
//----------------------------------

/* 
isset() est une fonction prédéfinie qui permet de savoir si une variable existe et que sa valeur n'est pas nulle.

empty() permet de savoir si une variable est vide ou non.Elle renvoie true si la variable est vide et false si elle n'est pas vide.

les valeurs suivantes sont considérées comme vides :
- null
- false
- 0 (entier)
- 0.0 (flottant)
- "" (chaîne de caractères)
-"0" (chaîne de caractères)
*/

$var1 = 0;
$var2 = "";

if (empty($var1)) {
    echo "0 ou vide ou non défini <br>";
}

if (isset($var2)) {
    echo "La variable existe mais avec une valeur vide <br>";
}

$var3 = 4;

if (isset($var3)) {
    echo "La variable existe et contient une valeur <br>";
} else {
    echo "La variable n'existe pas <br>";
}

echo '<h2 class="subtitle"> IF / ELSE / ELSE IF </h2>';

$a = 10;
$b = 5;
$c = 2;

if ($a > $b) {
    //Si la condition est vraie alors le code qui se trouve dans le bloc IF est exécuté
    echo "$a est plus grand que $b <br>";
} else {
    echo "$a est plus petit que $b <br>";
}

// Combinaison avec l'opérateur logique &&(ET)

//Avec && il faut que les deux conditions soient vraies pour que le code du bloc IF soit exécuté
if ($a > $b && $b > $c) {
    echo "$a est plus grand que $b et $b est plus grand que $c <br>";
}

// Combinaison avec l'opérateur logique ||(OU)

//Avec || il faut que l'une des deux conditions soit vraie pour que le code du bloc IF soit exécuté

if ($a == 8 || $b > $c) {
    echo "$a est plus grand que $b ou $b est plus grand que $c <br>";
}

// Combinaison avec l'opérateur logique XOR(OU exclusif)

//Avec XOR il faut que l'une des deux conditions soit vraie pour que le code du bloc IF soit exécuté.Si les deux conditions sont vraies alors le code du bloc IF n'est pas exécuté

if ($a == 10 xor $b < $c) {
    echo "Une seule des deux conditions doit être vraie <br>";
}

//ELSE IF

/* 
ELSE IF permet de tester plusieurs conditions dans le même bloc de code.
*/

if ($a == 1) {
    echo "Cas 1 :  a vaut 1 <br>";
} elseif ($a == 2) {
    echo "Cas 2 :  a vaut 2 <br>";
} elseif ($b > $c) {
    echo "Cas 3 :  b est plus grand que c <br>";
} else {
    echo "Cas 4 : b vaut $b et c vaut $c <br>";
}

//----------------------------------
//Ecriture ternaire
//----------------------------------
/* 
Ceci est une forme contractée de la structure IF / ELSE 
? représente le IF
: représente le ELSE
*/
$age = 25;

echo ($age >= 18) ? "Vous êtes majeur <br>" : "Vous êtes mineur <br>";

/* 
Depuis PHP 7 , on peut affecter une valeur à une variable sous condition.
*/

$address = isset($ville) ? $ville : "Pas de ville définie";

echo $address . "<br>";

//Avec l'opérateur ??
$address = $ville ?? "Paris";

echo $address . "<br>";

//Quel sera le résultat de l'expression suivante ?

$user = $firstname ?? $lastname ?? "Anonyme";

echo $user . "<br>";

// Quel sera le résultat de l'expression suivante ?
$nb1 = 1;
$nb2 = "1";

if ($nb1 === $nb2) {
    echo "Les deux variables sont égales <br>";
} else {
    echo "il ne s'agit pas de la même chose <br>";
}

/* 
= affectation
== comparaison de valeurs
=== comparaison de types et de valeurs
*/

echo '<h2 class="subtitle"> SWITCH </h2>';

/* 
switch permet de comparer une variable à une série de valeurs possibles.
case : représente une valeur possible
break : permet de sortir de la structure switch
default : représente le cas par défaut
*/

$color = "rouge";

switch ($color) {
    case "bleu":
        echo "Vous aimez le bleu <br>";
        break;

    case "rouge":
        echo "Vous aimez le rouge <br>";
        break;

    default:
        echo "Vous n'aimez ni le bleu ni le rouge <br>";
        break;
}

echo '<h2 class="subtitle"> MATCH </h2>';
/* 
match est une nouvelle structure de contrôle introduite en PHP 8.0.
Elle permet de faire la même chose que switch mais avec une syntaxe plus concise et plus lisible.
*/

$fruit = "pomme";

$message = match ($fruit) {
    "kiwi" => "Vous aimez les kiwis",
    "pomme" => "Vous aimez les pommes",
    "banane" => "Vous aimez les bananes",
    default => "Vous n'aimez ni les kiwis, ni les pommes, ni les bananes"
};

echo $message . "<br>";

/* 
Quand utiliser switch ou match ?
    SWITCH :
        - sur du code legacy(ancien code)
        - lorsque vous avez besoin de fall-through(exécution de plusieurs cas)
    MATCH :
        - sur du code moderne(nouveau code PHP 8.0)
        - lorsque vous avez besoin d'une comparaison stricte
*/

echo '<h2 class="todo">Exercice 1</h2>';

/* 
Contexte :
Un site web propose un formulaire de contact avec deux champs : nom et email. Lorsqu’un utilisateur soumet le formulaire,
les données sont transmises au script PHP pour être vérifiées.

Énoncé :
Écrivez un script PHP qui :
1 - Vérifie si la variable $nom (nom de l’utilisateur) est définie et non nulle en utilisant isset.
2 - Vérifie si la variable $email est vide en utilisant empty.
3 - Affiche un message approprié selon les cas suivants :
   - Si $nom n’est pas défini : "Le champ nom est requis."
   - Si $email est vide : "Le champ email est obligatoire."
   - Si les deux champs sont correctement remplis : "Merci, votre formulaire a été soumis avec succès."

Testez votre script avec les cas suivants :
Cas de test 1 :
    $nom = "Alice";
    $email = "";

Cas de test 2 :
    $nom = "";
    $email = "alice@example.com";

Cas de test 3 :
    $nom = null;
    $email = null;

Cas de test 4 :
    $nom = "Alice";
    $email = "alice@example.com";

*/

echo '<h2 class="solution">Correction : Exercice 1</h2>';

if (empty($nom) || !isset($nom)) {
    echo '<p>Le nom est obligatoire</p>';

} else if (empty($email) || !isset($email)) {
    echo '<p>L\'email est obligatoire</p>';
    
} else {
    echo '<p>Merci, votre formulaire a été soumis avec succès.</p>';
}


echo '<h2 class="todo">Exercice Récap</h2>';
/* 

## Exercice Récap

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

*/

echo '<h2 class="solution">Correction : Exercice  Récap</h2>';

$total_achats=120;

if ($total_achats < 50){
    echo "Ajoutez encore quelques articles pour bénéficier d'une livraison gratuite";

}else if($total_achats > 50 && $total_achats < 100){
    echo "Félicitations ! La livraison est offerte";

}else if($total_achats > 100){

    $total_achats = $total_achats * 0.10;
    echo " $total_achats € Merci pour votre commande ! Vous bénéficiez d'un bon d'achat de 10 € pour votre prochaine commande";
};


/* 

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
*/

echo '<h2 class="solution">Correction : Exercice  Récap</h2>';


const STATUT_EN_ATTENTE = "en attente";
const STATUT_EXPEDIEE = "expédiée";
const STATUT_LIVREE = "livrée";
const STATUT_ANNULEE = "annulée";

$statut_commande = STATUT_EXPEDIEE;

switch ($statut_commande) {
    case STATUT_EN_ATTENTE:
        echo "Votre commande est en attente de traitement.";
        break;
    case STATUT_EXPEDIEE:
        echo "Votre commande a été expédiée.";
        break;
    case STATUT_LIVREE:
        echo "Votre commande a été livrée.";
        break;
    case STATUT_ANNULEE:
        echo "Votre commande a été annulée.";
        break;
    default:
        echo "Statut de commande inconnu.";
        break;
}


/* 

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

*/

echo '<h2 class="solution">Correction : Exercice  Récap</h2>';

$age = 10;

if ($age <= "13") {
    echo "Enfant";

} else if ($age >= "13" && $age <= "17") {
    echo "Adolescent";

} else if ($age >= "18" && $age <= "64") {
    echo "Adulte";

} else if ($age >= "65") {
    echo "Senior";
};
