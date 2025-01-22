<!-- 
Nous pouvons écrire du HTML dans un fichier PHP.Mais l'inverse n'est pas possible.
-->
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

<h2 class="title">1 - Commentaire / Affichage / Ecriture en PHP </h2>

<?php
//--------------------------------
//Les commentaires en PHP
//--------------------------------

// Commentaire sur une ligne

/* Commentaire sur 
    plusieurs lignes 
*/

# Commentaire sur une ligne
?>

<h2 class="subtitle">2 - Affichage </h2>

<?php
//echo est unne instruction qui nous permet d'effectuer un affichage en PHP
echo "Bonjour";

//Toutes les instructions PHP finissent par un point-virgule ; 

echo "<br>";

echo "<b>Hello</b><br>";

print "Hello World";

//Autre syntaxe d'affichage

//print fait la même chose que echo , mais retourne 1 et aussi n'accepte pas plusieurs arguments(à l'exception des chaînes interpolées)

//print_r() : Qui permet d'afficher des structures de données plus complexes comme les tableaux,les objets,etc.

//var_dump() : Qui permet d'afficher des données plus structurées sur une ou plusieurs expression(s) de manière plus lisible(affiche le type et la valeur,etc...)

?>

<!-- 
La ligne suivante permet de faire un echo.C'est une forme alternative d'écrire un affichage en PHP.Souvent utilisée pour afficher des données dans un fichier HTML.
-->

<?= "Ceci est une autre manière d'écrire un affichage en PHP" ?>

<?php
echo '<h2 class="title">2 - Variables - Déclaration - Types de données - Assignation</h2>';

// Une variable est un espace mémoire qui contient une valeur

/* 
Pour déclarer une variable, il faut:
    - Le nom de la variable doit commencer par un dollar $
    - Les variables sont sensibles à la casse($maVariable est différent de $mavariable)
    - La variable doit être déclarée avant d'être utilisée
    - Le nom d'une variable ne peut pas commencer par un chiffre
    - style CamelCase ou snake_case ($maVariable ou $ma_variable)
    - le nom de la variable doit réfléter son utilité
    - Les caractères autorisés(0-9,a-z,A-Z,_)
    - Pas d'accents ni espaces
*/

/* 
Déclaration et Type de données
gettype() : Permet de connaître le type d'une variable
*/
$nombre = 10;

echo gettype($nombre); //integer

echo "<br>";

$chaine = "Hello World";

echo gettype($chaine); //string

echo "<br>";

$autreNombre = 10.5;

echo gettype($autreNombre); //double(nombre flottant)

echo "<br>";

$isAdmin = true;

echo gettype($isAdmin); //boolean

echo "<br>";

$tableau = [1,2,3,4,5];

echo gettype($tableau); //array

echo "<br>";

$user = new stdClass();

echo gettype($user); //object

echo '<h2 class="subtitle">Assignation par référence</h2>';

/* 
L'assignation par référence permet de créer un alias vers une variable.

La variable d'assignation est une copie de la variable d'origine car les 2 variables pointent vers la même valeur en mémoire.

Si la variable d'assignation est modifiée, la variable d'origine est modifiée également et vice-versa.

on utilise & pour assigner par référence
*/

$maVariable1 = "Salut";

$maVariable2 = &$maVariable1;

echo $maVariable1; //Salut
echo "<br>";
echo $maVariable2; //Salut
echo "<br>";

$maVariable2 = "Bonjour tout le monde";

echo $maVariable1; //Bonjour tout le monde
echo "<br>";
echo $maVariable2; //Bonjour tout le monde


echo '<h2 class="title">3 -Concaténation</h2>';

/* 
Pour concaténer en PHP, on utilise le point .
*/

$nom = "DUVAL";
$prenom = "Jean";

//Concaténation avec simple quotes

echo $nom . $prenom; //DUVALJean
echo "<br>";
echo $nom . ' '  . $prenom; //DUVAL Jean
echo '<br>';
echo '$nom . $prenom'; //$nom . $prenom

//Concaténation avec double quotes
echo '<br>';
echo "$nom $prenom"; //DUVAL Jean

echo '<br>';
echo "Bonjour je suis $nom $prenom"; //Bonjour je suis DUVAL Jean

/* 
Quand on utilise simple quotes, la variable à l'intérieur n'est pas interprétée alors que quand on utilise double quotes, elle est interprétée.
*/

echo '<br>';
//----------------------------------
//Concaténation lors de l'affectation
//----------------------------------
/* 
L'opérateur .= est utilisé pour concaténer une variable à une autre.
*/

$marque = "Audi";
$marque = "Porsche";

echo $marque . '<br>'; //Porsche

$modele = "RS4";
$modele .= "911"; //equivalent de $modele = $modele . "911"

echo $modele . '<br>'; //RS4911


echo '<h2 class="todo">Exercice 1</h2>';

/* 
Exercice 1 : Présentation Personnelle

Écrivez un programme qui utilise quatre variables pour stocker les informations suivantes :
- Votre nom
- Votre prénom
- Votre âge
- Votre ville de résidence

Affichez ensuite la phrase suivante en utilisant ces variables :
    "Bonjour, je m'appelle [prénom] [nom], j'ai [âge] ans et j'habite à [ville]."

Exemple de sortie :
```Bonjour, je m'appelle Jean Dupont, j'ai 25 ans et j'habite à Paris.
```
*/

echo '<h2 class="solution">Correction : Exercice 1</h2>';

$nom = "COTTET";
$prenom = "Martin";
$age = 25;
$ville = "Paris";

echo "Bonjour, je m'appelle $prenom $nom, j'ai $age ans et j'habite à $ville.  <br>";


echo '<h2 class="title">4 -Constantes & Constantes magiques</h2>';

//----------------------------------
//Constantes
//----------------------------------
/* 
Une constante est une variable qui ne peut pas être modifiée lors de l'exécution du programme.

le nom de la constante doit commencer par une lettre majuscule ou séparé par un underscore(_)
*/

//define() est utilisé pour définir une constante

define("VILLE", "Chartres");
echo VILLE . '<br>'; //Chartres

define("TAUX_TVA", "10%");
echo TAUX_TVA . '<br>'; //10%

/* 
Depuis PHP 7.4 on peut utiliser la syntaxe : const pour déclarer une constante.
Cette syntaxe est plus facile à lire et à écrire et plus moderne.
*/

const HASH = "secret";
echo HASH . '<br>'; //secret

//----------------------------------
//Constantes magiques
//----------------------------------
/* 
Une constante magique est une constante prédéfinie par PHP qui me permet d'avoir des informations à propos de l'environnement du serveur(le dossier courant, le nom de la fonction, etc.).

Les constantes magiques commencent toujours par double underscore __ 
*/

echo __DIR__ . '<br>'; // Pour afficher le dossier courant
echo __FILE__ . '<br>';  // Pour afficher le fichier courant
echo __LINE__ . '<br>'; // Pour afficher la ligne courante


echo '<h2 class="todo">Exercice 1</h2>';

/* 


### **Exercice : Affichage des Couleurs du Drapeau**

#### Contexte :
Vous devez écrire un programme qui utilise trois constantes pour stocker les couleurs du drapeau français : "Bleu", "Blanc" et "Rouge". Le programme doit ensuite afficher ces couleurs dans l'ordre, séparées par des tirets (`-`), mais avec une petite contrainte supplémentaire.

#### Étapes :
1. Déclarez trois constantes pour stocker les couleurs :
   - `COULEUR_BLEU`
   - `COULEUR_BLANC`
   - `COULEUR_ROUGE`

2. Affichez la phrase suivante en utilisant ces constantes :
     "Les couleurs du drapeau sont : [Bleu]-[Blanc]-[Rouge]."

3. **Contrainte supplémentaire** : Utilisez une quatrième constante pour stocker le séparateur (le tiret `-`).

4.Ajouter une cinquième constante pour stocker le message introductif ("Les couleurs du drapeau sont :")

5. Construisez la phrase en utilisant les constantes.La phrase doit être stockée dans une variable.

6. Affichez la phrase.

*/

echo '<h2 class="solution">Correction : Exercice 2</h2>';

//1 .

const COULEUR_BLEU = "Bleu";
const COULEUR_BLANC = "Blanc";
const COULEUR_ROUGE = "Rouge";

//2.
echo "Les couleurs du drapeau sont : " . COULEUR_BLEU . "-" . COULEUR_BLANC . "-" . COULEUR_ROUGE . "<br>";

//3.
const SEPARATION = "-";

//4.

const NOUVELLE_CONSTANTE = "Les couleurs du drapeau sont :";

//5.
$phrase = NOUVELLE_CONSTANTE . " " . COULEUR_BLEU . SEPARATION . COULEUR_BLANC . SEPARATION . COULEUR_ROUGE;

//6.
echo $phrase . "<br>";

echo '<h2 class="title">5 - Opérateurs Aritmétiques</h2>';

/*
Les opérateurs arithmétiques sont utilisés éffectuer des calculs mathématiques.
- Addition (+)
- Soustraction (-)
- Multiplication (*)
- Division (/)
- Modulo (%)
*/

$nombre1 = 10;
$nombre2 = 5;

//Addition
echo "Addition $nombre1 et $nombre2 : " . $nombre1 + $nombre2 . "<br>";

//Soustraction
echo "Soustraction $nombre1 et $nombre2 : " . $nombre1 - $nombre2 . "<br>";

//Multiplication
echo "Multiplication $nombre1 et $nombre2 : " . $nombre1 * $nombre2 . "<br>";

//Division
echo "Division $nombre1 et $nombre2 : " . $nombre1 / $nombre2 . "<br>";

//Modulo
echo "Modulo $nombre1 et $nombre2 : " . $nombre1 % $nombre2 . "<br>";

// Opérations combinées avec affectation

$nombre1 = 10;
$nombre2 = 5;

//Addition
$nombre1 += $nombre2; // $nombre1 = $nombre1 + $nombre2

//Soustraction
$nombre1 -= $nombre2; // $nombre1 = $nombre1 - $nombre2

//Multiplication
$nombre1 *= $nombre2; // $nombre1 = $nombre1 * $nombre2

//Division
$nombre1 /= $nombre2; // $nombre1 = $nombre1 / $nombre2


echo '<h2 class="todo">Exercice 3</h2>';
/* 

### Énoncé de l'Exercice

**Contexte :**  
Vous travaillez sur une application pour un site e-commerce. Un client effectue un achat, et vous devez calculer le montant total de sa commande en tenant compte des éléments suivants :

1. Le client bénéficie d'un **bonus** qui est directement lié à son âge.  
2. Une **taxe de 20%** est appliquée après déduction du bonus.  

Votre tâche est de calculer le montant final de la commande et d'afficher un récapitulatif détaillé pour le client.

---

### Étapes de l'Exercice

#### Étape 1 : Informations du Client
Déclarez les variables suivantes pour stocker les informations du client :  
- `$prenom` pour stocker le prénom du client (exemple : "Jean").  
- `$age` pour stocker l'âge du client (exemple : 25).  
- `$montantAchat` pour stocker le montant total de l'achat (exemple : 100 €).  

Affichez ces informations dans un message de bienvenue.

**Exemple de texte d'affichage :**
````
Bonjour Jean ! Bienvenue sur notre site.
```

---

#### Étape 2 : Calcul du Bonus
Le bonus est directement lié à l'âge du client.  
- Créez une variable `$bonus` qui est **assignée par référence** à l'âge du client (`$age`).  
- Affichez le montant du bonus dans un message personnalisé.

**Exemple de texte d'affichage :**
```
Félicitations, vous bénéficiez d'un bonus de 25 € pour vos 25 ans !
```

---

#### Étape 3 : Montant après Déduction du Bonus
Déduisez le bonus du montant total de l'achat.  
Affichez un message indiquant le montant après déduction du bonus.

**Exemple de texte d'affichage :**
```
Après déduction du bonus, votre panier vous revient à 75 €.
```

---

#### Étape 4 : Application de la Taxe
Appliquez une taxe de 20% au montant après déduction du bonus.Sachant que le taux de TVA est fixe
Affichez le montant final après application de la taxe.

**Exemple de texte d'affichage :**
```
Après application de la taxe de 20%, le montant final est de 60 €.
```

---

#### Étape 5 : Récapitulatif de la Commande
Créez un récapitulatif complet de la commande, incluant :  
- Le prénom du client.  
- L'âge du client.  
- Le montant initial de l'achat.  
- Le montant du bonus.  
- Le montant final après taxe.  

Affichez ce récapitulatif dans un message clair et détaillé.

**Exemple de texte d'affichage :**
```
Récapitulatif de la commande :
- Prénom : Jean
- Âge : 25 ans
- Montant initial : 100 €
- Bonus appliqué : 25 €
- Montant final après taxe : 60 €.
```
*/

echo '<h2 class="solution">Correction : Exercice 3</h2>';

// Étape 1 : Informations du Client

$prenom = "Jean";
$age = 25;
$montantAchat = 100;

echo "Bonjour $prenom ! Bienvenue sur notre site.<br>";

// Étape 2 : Calcul du Bonus

$bonus = &$age;

echo "Félicitations, vous bénéficiez d'un bonus de $bonus € pour vos $age ans !<br>";

// Étape 3 : Montant après Déduction du Bonus

$montantAchat -= $bonus;

echo "Après déduction du bonus, votre panier vous revient à $montantAchat €.<br>";


// Étape 4 : Application de la Taxe

const MONTANT_TVA = 1.2;

$montantAchatFinanl = $montantAchat * MONTANT_TVA;

echo "Après application de la taxe de" . MONTANT_TVA . "%, le montant final est de $montantAchatFinanl €.<br>";

// Étape 5 : Récapitulatif de la Commande

echo "Récapitulatif de la commande :<br>";
echo "- Prénom : $prenom <br> - Âge : $age ans <br> - Montant initial : $montantAchat € <br> - Bonus appliqué : $bonus € <br> - Montant final après taxe : $montantAchatFinanl €.<br>";
