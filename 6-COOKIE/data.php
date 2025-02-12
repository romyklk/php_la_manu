<?php

/* 
Le cookie sont de petits fichiers stockés dans le navigateur de l'utilisateur.

Ils permettent de stocker des informations sur le navigateur, comme les préférences afin de les réutiliser lors de la prochaine visite de le même navigateur.

Pour des raisons de règlementation , la durée de vie d'un cookie est de un an à partir de la dernière visite du site.

Sa taille est limitée à 4ko.


Pour définir un cookie, il faut utiliser la fonction setcookie()

Sa syntaxe est la suivante :

setcookie("nom_du_cookie", "valeur_du_cookie", timestamp_expiration, chemin_du_cookie, domaine_du_cookie, securite_du_cookie,hhtponly_du_cookie);

Il n'y a pas de fonction pour supprimer un cookie, il faut le faire manuellement en supprimant le fichier correspondant ou déclarer un cookie avec une date de fin passée.

Pour accéder à un cookie, il faut utiliser la variable superglobale $_COOKIE
*/

//setcookie("username", "JEAN", time() + 3600);
/* 
if (isset($_COOKIE["username"])) {

    echo "Le nom de l'utilisateur est : " . $_COOKIE["username"];
} else {

    echo "Utilisateur inconnu";
}

 */

// On définit la durée de vie du cookie à un an
// 365 jours * 24 heures/jour * 3600 secondes/heure
$delai = 365 * 24 * 3600;

if (isset($_GET["pays"])) {

    $pays = $_GET["pays"];

} elseif (isset($_COOKIE["pays"])) {

    $pays = $_COOKIE["pays"];
} else {
    $pays = "";
}




setcookie("pays", $pays, time() + $delai);




switch ($pays) {
        case "fr":
            echo "<h1>Bonjour Français</h1>";
            break;
        case "en":
            echo "<h1>Hello English</h1>";
            break;
        case "es":
            echo "<h1>Hola Español</h1>";
            break;
        case "it":
            echo "<h1>Ciao Italiano</h1>";
            break;
            
        default:
            echo "<h1>Quel est votre langue ?</h1>";
            break;
}
?>

<ul>
    <li><a href="?pays=fr">Français</a></li>
    <li><a href="?pays=en">Anglais</a></li>
    <li><a href="?pays=es">Espagnol</a></li>
    <li><a href="?pays=it">Italien</a></li>
</ul>