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


    .table-container{
        display:grid;
        grid-template-columns: repeat(6, 1fr);
        grid-gap: 20px;
        margin:0 auto;
    }

    .table{
    background-size:#fff;
    border-radius:10px;
    box-shadow: 0 0 10px #ccc;
    padding:10px;
}

.table h2{
    text-align:center;
    color:#333;
}

.table ul{
    list-style:none;
    padding:0;
}
.table ul li{
    padding:5px;
    border-bottom:1px solid #ccc;
    text-align:center;
}

.table ul li:last-child{
    border-bottom:none;
}
</style>
";

echo '<h2 class="title">1 -Les  structures itératives : Boucle</h2>';

/* 
Les boucles permettent de répéter des instructions jusqu'à ce qu'une condition soit remplie.
*/

echo '<h2 class="subtitle">A - While</h2>';

//while() : tant que la condition est vraie, on exécute le code

$i = 0;

while ($i < 5) {
    echo "i est égal à $i <br>";
    $i++;
}

echo "<br><br>";
$j = 0;

while ($j < 5) {

    if ($j == 2) {
        break; //On sort de la boucle
    }

    echo "j est égal à $j <br>";
    $j++;
}

echo "<h3 class='todo'>Exercice</h3>";
/* 
Ecrire un programme qui affiche la somme des nombres de 1 à 100 en utilisant une boucle while
*/

echo "<h3 class='solution'>Correction : Exercice</h3>";

$somme = 0;
$compteur = 0;
while ($compteur < 100) {
    $compteur++;
    $somme += $compteur;
}

echo "La somme des nombres de 1 à 100 est : $somme";

echo '<h2 class="subtitle">B -Do While</h2>';

$x = 1;

$total = 0;

do {
    $total += $x;
    $x++;
} while ($x < 5);

echo "La somme des nombres de 1 à 5 est : $total <br>";

do {
    $randomNumber = rand(1, 100);
} while ($randomNumber % 2 != 0);

echo "Le nombre aléatoire entre 1 et 100 est : $randomNumber <br>";
/* 
Contrairement à while, do while exécute le code au moins une fois avant de vérifier la condition.
*/

echo '<h2 class="subtitle">B - For</h2>';
/* 
For est une boucle qui permet de répéter des instructions un nombre déterminé de fois.
Syntaxe : for(initialisation; condition; sens(incrémentation/décrémentation)){
    //code
}
*/
for ($i = 0; $i < 5; $i++) {
    echo "i est égal à $i <br>";
}

echo '<select>';
echo '<option>1</option>';
echo '<option>2</option>';
echo '<option>3</option>';
echo '<option>jusqu\'au 31</option>';
echo '</select>';

echo '<select>';
for ($i = 1; $i <= 31; $i++) {
    echo "<option>$i</option>";
}
echo '</select>';

echo '<h2 class="todo">Exercice </h2>';
/* 
// 1 : Afficher dans des select options l'année en cours -1 jusqu'à 100 ans en arrière grâce à une boucle. Faites en sorte que votre code soit pérenne dans le temps

// 2: Écrivez un programme utilisant une boucle for pour générer une liste déroulante des années, allant de l'année actuelle jusqu'à 50 ans en arrière (par exemple, de 2024 à 1974). Assurez-vous que le code s'adapte automatiquement à l'année en cours pour garantir sa pérennité
*/

echo '<h2 class="solution">Correction : Exercice</h2>';

echo '<select>';
for ($i = date('Y') - 1; $i >= date('Y') - 100; $i--) {
    echo "<option>$i</option>";
}
echo '</select>';


$currentDate = date("Y");

echo '<select>';
for ($j = $currentDate; $j >= ($currentDate - 50); $j--) {
    echo "<option>$j</option>";
}
echo '</select>';


echo "<h2 class='todo'>Exercice:</h2>";

/* 

Exercice : Afficher toutes les tables de multiplication de 1 à 12
Objectif :
Utiliser des boucles imbriquées en PHP pour générer et afficher toutes les tables de multiplication de 1 à 12. Chaque table doit être affichée dans une liste HTML.

Instructions :
Créez une structure HTML de base.

Utilisez une boucle for pour parcourir les tables de 1 à 12.

Pour chaque table, utilisez une deuxième boucle for pour parcourir les multiplicateurs de 1 à 10.
*/


echo '<h2 class="solution">Correction : Exercice</h2>';

echo '<div class="table-container">';


for ($tab = 1; $tab < 13; $tab++) {
    echo '<div class="table">';

    echo '<h2>Table  de ' . $tab . '</h2>';
    echo '<ul>';
    for ($multi = 1; $multi < 11; $multi++) {
        echo "<li>$tab x $multi = " . $tab * $multi . "</li>";
    }
    echo '</ul>';

    echo '</div>';
}

echo '</div>';

