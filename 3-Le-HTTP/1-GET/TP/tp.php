<?php

/* 
Créez un fichier nommé tp.php contenant les éléments suivants:

4 boutons portant les noms des noms (pomme, poire, fraise, cerise).

Lorsqu'un bouton est cliqué, le nom du fruit sera envoyé à la page affichage.php via la méthode GET.

Par la suite, développez une page d'affichage qui affiche une image correspondant au nom du fruit transmis via l'URL.

Développez ensuite une page d'affichage (affichage.php) qui affiche une image correspondant au nom du fruit transmis via l'URL.

Si le fruit n'est pas l'un des quatre fruits proposés, affichez un message d'erreur("Aucun fruit n'a été sélectionné") et proposez à l'utilisateur de revenir à la page précédente en utilisant la fonction header().
PS: Vous pouvez utiliser les images suivantes: pomme.jpg, poire.jpg, fraise.jpg, cerise.jpg
*/


?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <h1>Affichage des fruits</h1>

    <a href="affichage.php?fruit=pomme" class="btn btn-primary">Pomme</a>
    <a href="affichage.php?fruit=poire" class="btn btn-secondary">Poire</a>
    <a href="affichage.php?fruit=fraise" class="btn btn-success">Fraise</a>
    <a href="affichage.php?fruit=cerise" class="btn btn-danger">Cerise</a>
    
</body>

</html>