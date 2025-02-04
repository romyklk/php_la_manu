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

echo '<h2 class="title">1 -Tableaux &  Objets</h2>';

echo '<h2 class="subtitle">Les Tableaux(Arrays)</h2>';

/* 
Les tableaux sont des structures de données qui permettent de stocker des données de manière structurée.

Ils sont composés de valeurs de différentes types, et peuvent être indexés par des clés.

*/
//Déclaration d'un tableau avec Array ou []

$liste = array("Martin", "Pierre", "Jean", "Paul", "Guillaume");

$dataListe= ["Martin", "Pierre", "Jean", "Paul", "Guillaume"];

echo '<pre>'; //<pre> est une balise HTML qui permet de formater du texte
print_r($liste);
echo '</pre>';

echo '<pre>';
var_dump($dataListe);
echo '</pre>';

//print_r() permet de visualiser les données d'un tableau
//var_dump() Affiche les données d'un tableau, mais en formatage plus détaillé(type, clé, longueur, etc)

$countries =[];
$countries[] = "France"; //Ajouter une valeur à la fin du tableau
$countries[] = "Belgium";
$countries[] = "Germany";
$countries[] = "Italy";
$countries[] = "Spain";


echo '<pre>';
var_dump($countries);
echo '</pre>';

echo "Le nom du pays 0 l'index 3 est : " . $countries[3] . "<br>";

echo "<h2 class='subtitle'>La boucle foreach</h2>";
/*
La boucle foreach permet de parcourir un tableau et d'exécuter une fonction pour chaque valeur du tableau.
*/

// Le mot-clé as permet de définir un alias pour une variable. Avec cette synthaxe, country contient la valeur de l'index courant du tableau.
foreach($countries as $country){
    echo $country . "<br>";
}

// avce cette synthaxe, on peut récupérer l'index parcouru avec la variable $key et la valeur avec la variable $value
foreach($dataListe as $key=>$value){
    echo $key . " : " . $value . "<br>";
}

//En résumé, quand il y a 2 variables après le mot-clé as, on peut récupérer l'index et la valeur du tableau.Mais quand il y a une seule variable , on récupère la valeur.


//Tableau associatif

$color = [
    'r' => "Rouge",
    'g' => "Vert",
    'b' => "Bleu",
    'y' => "Jaune",
    'o' => "Orange",
];

echo "La couleur à l'index o est : " . $color['o'] . "<br>";
//count() ou sizeof() permet de compter le nombre d'éléments d'un tableau

echo "Le nombre d'éléments du tableau est : " . count($color) . "<br>";
echo "Le nombre d'éléments du tableau est : " . sizeof($color) . "<br>";

//implode() permet de concaténer les éléments d'un tableau en une chaîne de caractères séparées par le séparateur spécifié.
echo implode(" || ", $color);


//Tableau multidimensionnel

$tab_multi =[
    0 => ["prenom" => "Martin","nom" =>"COTTET", "age" => 35],
    1 => ["prenom" => "John","nom" =>"SMITH", "age" => 29],
    2 => ["prenom" => "Paul","nom" =>"JOHNSON", "age" => 25],
    3 => ["prenom" => "Guillaume","nom" =>"DUPONT", "age" => 30],
];

echo "<br>";
echo $tab_multi[1]["nom"] ;
echo "<br>";

//Afficher tous les prenoms en utilisant la boucle foreach ou for


echo '<h2 class="subtitle">Les Objets</h2>';