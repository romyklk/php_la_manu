<?php
echo "<h1>Page 2</h1>";

/* 
Pour récupérer les paramètres d'une page dans l'URL, il faut utiliser  $_GET.

C'est une superglobal qui contient tous les paramètres d'une page.
Tous les superglobals sont des tableaux.
il est obligatoire de l'écrire en majuscules.
Pour passer des paramètres dans l'url, on les passent sous forme de clés et de valeurs(param=value).
exempel : ?id=1&article=jean&couleur=bleu&prix=38
Il ne faut pas oublier de mettre le ?

Il est important de noter que les données passées dans l'url ne sont pas sécurisées et peuvent être interceptées par les attaquants.Ne jamais placer des données sensibles dans l'url.
*/

/* if($_GET){
    echo "<pre>";
    var_dump($_GET);
    echo "</pre>";

    echo "<h2>Paramètres</h2>";
    echo "Paramètre id : " . $_GET["id"] . "<br>";
    echo "Paramètre article : " . $_GET["article"] . "<br>";
    echo "Paramètre couleur : " . $_GET["couleur"] . "<br>";
    echo "Paramètre prix : " . $_GET["prix"] . "<br>";
}
 */


if((isset($_GET["id"])) && (isset($_GET["article"])) && (isset($_GET["couleur"])) && (isset($_GET["prix"])))

{
    echo "<h2>Paramètres</h2>";
    echo "Paramètre id : " . $_GET["id"] . "<br>";
    echo "Paramètre article : " . $_GET["article"] . "<br>";
    echo "Paramètre couleur : " . $_GET["couleur"] . "<br>";
    echo "Paramètre prix : " . $_GET["prix"] . "<br>";
}else{
    //echo "<h2>Paramètres manquants</h2>";
    //echo "<a href='page1.php'>Retour</a>";
    header("Location: page1.php");
    //header() permet de rediriger vers une autre page.On lui passe le chemin de la page vers laquelle on souhaite rediriger.
}