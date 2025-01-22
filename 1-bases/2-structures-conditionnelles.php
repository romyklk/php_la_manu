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

if(empty($var1)){
    echo "0 ou vide ou non défini <br>";
}

if(isset($var2)){
    echo "La variable existe mais avec une valeur vide <br>";
}

$var3 = 4;

if(isset($var3)){
    echo "La variable existe et contient une valeur <br>";
}else{
    echo "La variable n'existe pas <br>";
}

echo '<h2 class="subtitle"> IF / ELSE / ELSE IF </h2>';

$a = 10;
$b = 5;
$c = 2;

if($a > $b){ 
    //Si la condition est vraie alors le code qui se trouve dans le bloc IF est exécuté
    echo "$a est plus grand que $b <br>";
    
}else{
    echo "$a est plus petit que $b <br>";
}

// Combinaison avec l'opérateur logique &&(ET)

//Avec && il faut que les deux conditions soient vraies pour que le code du bloc IF soit exécuté
if($a > $b && $b > $c){ 
    echo "$a est plus grand que $b et $b est plus grand que $c <br>";
}

// Combinaison avec l'opérateur logique ||(OU)

//Avec || il faut que l'une des deux conditions soit vraie pour que le code du bloc IF soit exécuté

if($a == 8 || $b > $c){ 
    echo "$a est plus grand que $b ou $b est plus grand que $c <br>";
}

// Combinaison avec l'opérateur logique XOR(OU exclusif)

//Avec XOR il faut que l'une des deux conditions soit vraie pour que le code du bloc IF soit exécuté.Si les deux conditions sont vraies alors le code du bloc IF n'est pas exécuté

if($a == 10 xor $b < $c){ 
    echo "Une seule des deux conditions doit être vraie <br>";
}

//ELSE IF

/* 
ELSE IF permet de tester plusieurs conditions dans le même bloc de code.
*/

if($a == 1){
    echo "Cas 1 :  a vaut 1 <br>";

}elseif($a == 2){
    echo "Cas 2 :  a vaut 2 <br>";

}elseif($b > $c){
    echo "Cas 3 :  b est plus grand que c <br>";

}else{
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

if($nb1 === $nb2){
    echo "Les deux variables sont égales <br>";
}else{
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

switch($color){
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

$message = match($fruit){
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