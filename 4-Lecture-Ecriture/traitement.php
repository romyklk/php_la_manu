<?php

/* 
On peut lire et écrire dans un fichier dynamiquement en PHP.

fopen() : Ouvre un fichier ou une URL
fwrite() : Écrit dans un fichier ouvert
fgets() : Lit un ligne d'un fichier ouvert
fread() : Lit un bloc de caractères d'un fichier ouvert
fclose() : Ferme un fichier ouvert

Les modes d'ouverture d'un fichier sont les suivants :

- r : Lecture seule
- r+ : Lecture et écriture
- w : Ecriture seule(ou création si le fichier n'existe pas)
- w+ : Ecriture et lecturee(ou création si le fichier n'existe pas)
- a : Ecriture à la fin du fichier(ou création si le fichier n'existe pas)

cf la documentation de PHP https://www.php.net/manual/fr/function.fopen.php
*/

if($_SERVER['REQUEST_METHOD']=='POST'){

    $file= fopen("users.txt","a");

    if($file){
        //Ecriture dans le fichier
        fwrite($file,$_POST['nom']." ".$_POST['prenom']."\n");

        //Fermeture du fichier(pas obligatoire mais recommandé afin de libérer les ressources)
        fclose($file);

        echo "Données enregistrées";
    
    }

    $file = fopen("users.txt", "r");

    if ($file) {
        //Lecture du fichier

        $contenu = fread($file, filesize("users.txt"));
        echo $contenu . "<br>";

        fclose($file);
    }
}



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        body {
            background-color: #eff5fa;
        }

        .title {
            color: white;
            background-color: #1d3a6d;
            padding: 10px 0;
            text-align: center;
        }

        .subtitle {
            color: white;
            background-color: #4aa0c4;
            padding: 5px 0;
            text-align: center;
        }

        .todo {
            color: crimson;
            background-color: #F2DEDE;
            padding: 10px 0;
            text-align: center;
            font-size: 20px;
        }

        .solution {
            color: green;
            background-color: #E6FFE6;
            padding: 10px 0;
            text-align: center;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px #ccc;
            margin: 0 auto;
            width: 30%;

        }

        label {
            display: block;
        }

        input {
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        input[type="submit"] {
            background-color: #4aa0c4;
            color: #fff;
            padding: 10px;
            border-radius: 5px;
            border: none;
            margin-top: 20px;
            display: block;
        }
    </style>
</head>

<body>
    <h2 class="title">La méthodePOST</h2>
    <h2 class="subtitle">Formulaire 1</h2>

    <form action="" method="POST">

        <label for="nom">Nom :</label>
        <input type="text" name="nom">

        <label for="prenom">Prénom :</label>
        <input type="text" name="prenom">

        <input type="submit" value="Envoyer">
    </form>
</body>

</html>