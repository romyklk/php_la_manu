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

echo '<h2 class="title">1 -Les  Fonctions</h2>';

/* 
Une fonction est un bloc de code qui effectue une tâche spécifique. Elle permet de découper votre code en plus petits morceaux qui peuvent être utilisés dans différentes parties du programme.

Elle peut prendre ou non des paramètres
*/
echo '<h2 class="subtitle">A -Les  Fonctions Prédéfinies</h2>';
/* 
Les fonctions prédéfinies sont des fonctions qui sont déjà définies dans le langage PHP. Elles sont utilisées pour effectuer des tâches courantes.
*/

//date() : Affiche la date courante

echo "Nous sommes le " . date("d/m/Y") . "<br>"; //jj/mm/aaaa

//time() : Affiche le timestamp courant

echo "Le temps est : " . time() . "<br>";

//rand() : Génère un nombre aléatoire .
echo "Un nombre aléatoire : " . rand(1, 100) . "<br>";

//strpos(): Cherche la position de la première occurrence dans une chaîne de caractères. Si la chaîne n'est pas trouvée, la fonction renvoie false.

$email = "john@example.com";

echo "La position de @ est: " . strpos($email, "@") . "<br>";

var_dump(strpos($email, "bar")); // Grâce à la fonction var_dump(), on peut voir que la fonction renvoie false si la chaîne n'est pas trouvée.

//strlen() : Retourne la longueur d'une chaîne de caractères.

$chaine = "Ceci est à écrire en PHP";
echo "La longueur de la chaîne de caractères est : " . strlen($chaine) . "<br>";

//iconv_strlen() : Retourne la longueur d'une chaîne de caractères.Elle prend en compte les caractères multibytes.

echo "La longueur de la chaîne de caractères est : " . iconv_strlen($chaine) . "<br>";

//mb_strlen() : Retourne la longueur d'une chaîne de caractères.Elle prend en compte les caractères multibytes.

echo "La longueur de la chaîne de caractères est : " . mb_strlen($chaine) . "<br>";

//substr() : Retourne une partie de la chaîne de caractères.

$message = "Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l'imprimerie depuis les années 1500, quand un imprimeur anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Il n'a pas fait que survivre cinq siècles, mais s'est aussi adapté à la bureautique informatique, sans que son contenu n'en soit modifié. Il a été popularisé dans les années 1960 grâce à la vente de feuilles Letraset contenant des passages du Lorem Ipsum, et, plus récemment, par son inclusion dans des applications de mise en page de texte, comme Aldus PageMaker.";

echo "Le début du message : " . substr($message, 0, 50) . "...<a href='#'>Lire la suite</a><br>";

//mb_substr() : Retourne une partie de la chaîne de caractères.Elle prend en compte les caractères multibytes.

echo "Le début du message : " . mb_substr($message, 0, 50) . "...<a href='#'>Lire la suite</a><br>";

//----------------------------------
//str_starts_with() & str_ends_with() & str_contains()
//Depuis PHP 8.0
//----------------------------------

//str_starts_with() : Vérifie si une chaîne de caractères commence par une sous-chaîne donnée.

var_dump(str_starts_with($message, "Le Lorem ")); //true

var_dump(str_starts_with($message, "Lorem ")); //false

//str_ends_with() : Vérifie si une chaîne de caractères se termine par une sous-chaîne donnée.

var_dump(str_ends_with($message, "PageMaker.")); //true

var_dump(str_ends_with($message, "PageMaker")); //false car il manque le point

//str_contains() : Vérifie si une chaîne de caractères contient une sous-chaîne donnée.

var_dump(str_contains($message, "Lorem")); //true
var_dump(str_contains($message, "Bonjour")); //False

echo '<h2 class="subtitle">B -Les  Fonctions utilisateur</h2>';
/* 
Ceux sont des fonctions qui ne sont pas prédéfinies dans le langage PHP. Vous pouvez les définir vous-même.
*/

//Déclaration d'une fonction
function direBonjour()
{
    echo "Bonjour tout le monde !<br><hr>";
}

//Appel de la fonction
direBonjour();

//Déclaration d'une fonction avec un paramètre

function sayHello($name)
{
    echo "Bonjour $name !<br>";
}

sayHello("John");
sayHello("John Doe");

//Fonction avce avec un paramètre optionnel

function presentation($nom, $prenom, $age = "Inconnu")
{
    echo "Bonjour $nom $prenom, vous avez $age ans !<br>";
}

presentation("Martin", "Sanchez");
presentation("Aurélien", "DURAND", 25);


//Fonction avec valeur de retour
function getAge($name)
{
    $age = rand(10, 50);
    return "Bonjour $name, vous avez $age ans !<br>";
}

echo getAge("Martin");

function appliqueTVA($montant)
{

    return $montant * 1.2;
}

echo appliqueTVA(100);
echo "<br>";
echo appliqueTVA(180);

/* 
Amélioration de la fonction précédente afin que le taux de TVA soit un paramètre optionnel(20% par défaut)
Les taux applicables sont : 20%, 5.5%, 7%
*/
function appliqueTVA2($montant, $tva = 1.2)
{
    return $montant * $tva;
}

echo "<br><br>";
echo appliqueTVA2(100);
echo "<br>";
echo appliqueTVA2(100, 1.055);
echo "<br>";
echo appliqueTVA2(100, 1.07);
echo "<br><br>";

//Appel de la fonction avant sa définition

meteo("hiver", "2"); //il est possible d'appeler une fonction avant sa définition

function meteo($saison, $temperature)
{
    echo "Nous sommes en $saison et il fait $temperature degrés.<br>";
}


echo '<h2 class="todo">Exercice </h2>';
/* 
Faire une fonction qui prend la saison et la température et affiche 
    "Nous sommes en $saison et il fait $temperature degrés"
Si la température est égale à 1 ou -1 degré, on affiche degré au singulier
Si la saison est printemps , on affiche "au" devant le nom de la saison
    Exemple : Nous sommes en hiver et il fait -1 degré
Si la température est supérieur à 18, on affiche " Et il fait chaud"
*/

echo '<h2 class="solution">Correction : Exercice</h2>';

function meteo2($saison, $temperature)
{

    $degre = ($temperature == 1 || $temperature == -1) ? "degré" : "degrés";

    $au = ($saison == "printemps") ? "au" : "en";

    $chaud = ($temperature > 18) ? " Et il fait chaud" : "";

    return "Nous sommes $au $saison et il fait $temperature $degre . $chaud <br>";
}

echo meteo2("été", 20);


echo '<h2 class="subtitle">C -La portée des variables</h2>';

function jourSemaine()
{
    $jour = "Lundi"; //Variable locale
    return $jour;

    echo "La semaine commence le $jour"; //Cette ne sera pas affichée car elle est après le return
}

echo jourSemaine();
echo "<br>";

//echo $jour; //Erreur car $jour est une variable locale à la fonction jourSemaine

$ville = "Chartres";

function afficheVille()
{
    global $ville; //Permet d'accéder à une variable globale
    echo "La ville est $ville";
}

//Le mot clé global permet d'importer une variable globale dans une fonction

afficheVille();

echo '<h2 class="subtitle">D - Typages des paramètres & valeur de retour</h2>';

/* 
Depuis PHP 7.0, il est possible de définir des types pour les paramètres et la valeur de retour d'une fonction

declare(strict_types=1); //Permet de définir le typage strict.Elle doit être positionnée juste après l'ouverture de la balise <?php
*/

function identite(string $nom, int $age)
{
    return "Bonjour $nom, vous avez $age ans !<br>";
}

echo identite("Martin", 25);
//echo identite("Martin",25.5); Erreur car le paramètre $age doit être un entier
//echo identite(21,"Martin"); Erreur car le paramètre $nom doit être une chaîne de caractères

function isMajeure(int $age): bool
{
    return $age >= 18;
}

var_dump(isMajeure(25));
var_dump(isMajeure(15));

/* 
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
*/