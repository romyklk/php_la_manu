<?php

/* 

Les sessions fonctionnent comme des cookies, mais avec un stockage dans le serveur.

Quand on utilise une session, on crée un fichier sur le serveur qui stocke les informations de session. En même temps, un cookie est envoyé au navigateur avec un identifiant de session.	Ce qui permet de maintenir le lien entre le navigateur et le serveur.

Pour créer une session, il faut utiliser la fonction session_start() crée une session si elle n'existe pas ou l'ouvre si elle existe déjà.

Pour détruire une session, il faut utiliser la fonction session_destroy().

Pour détruire une variable de session, il faut utiliser la fonction unset().
*/
/* session_start();

$_SESSION["nom"] = "Jean";
$_SESSION["age"] = "25";
$_SESSION["mdp"] = "MonsSuperMdp";


unset($_SESSION["mdp"]);

session_destroy();
 */
//Récuperer le nom saisi dans le formulaire que vous allez stocker dans la session puis afficher Bonjour + nom ou bonjour inconnu si le nom n'est pas défini

session_start();

if($_SERVER["REQUEST_METHOD"] == "POST"){

    if(!empty($_POST["nom"]))
    $_SESSION["nom"] = $_POST["nom"];
}

//Afficher le nom de la session
$nom = $_SESSION["nom"] ?? "Inconnu";

echo "Bonjour $nom";

?>


<form action="" method="post">
    <input type="text" name="nom" placeholder="Votre nom">
    <input type="submit" value="Valider">
</form>