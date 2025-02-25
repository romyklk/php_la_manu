<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    /* 
    $_FILES est une variable superglobale qui contient les informations sur les fichiers qui ont été envoyés par le client.
    [name] : Nom original du fichier
    [type] : Type du fichier
    [tmp_name] : Emplacement du fichier temporaire
    [error] : Code d'erreur
    [size] : Taille du fichier

  
    echo "<pre>";
    print_r($_FILES);
    echo "</pre>"; 
    */


    //Si le fichier a bien été envoyé
    if(!empty($_FILES['monImage']['name'])){

        $nomImg = $_FILES['monImage']['name'];

        echo "Nom du fichier : " . $nomImg . "<br>";

        // Renommé mon image afin d'éviter les collisions

        $nomImg = time() . '_' . uniqid() . '_' . $nomImg;

        echo "Nom du fichier : " . $nomImg . "<br>";

        //Définir le chemin du fichier en bdd et sur le serveur(dossier de destination)

        define('URL', 'http://localhost/LA_MANU_PHP/8-images/uploads');

        define('DOSSIER_DES_DESTINATIONS', $_SERVER['DOCUMENT_ROOT'] . '/LA_MANU_PHP/8-images/uploads/');

        if($_FILES['monImage']['size'] < 2000000){

            //move_uploaded_file() déplace un fichier téléchargé vers un nouvel emplacement

            move_uploaded_file($_FILES['monImage']['tmp_name'], DOSSIER_DES_DESTINATIONS . $nomImg);

            
        }
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
            background-color: #f9f9f9;
            font-family: 'Open Sans', sans-serif;
            line-height: 1.6;
            max-width: 900px;
            padding: 2rem;
            color: #333;
            word-wrap: balance;
        }

        h1{
            text-align: center;
        }

        form {
            margin: 2rem auto;
            max-width: 400px;
        }
        input[type="text"] {
            width: 100%;
            padding: 0.5rem;
            margin-bottom: 1rem;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="file"] {
            width: 100%;
            padding: 0.5rem;
            margin-bottom: 1rem;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"] {
            width: 100%;
            padding: 0.5rem;

            cursor: pointer;

            background-color: #007bff;
            color: white;

            border: none;
            border-radius: 4px;
        }

        input[type="submit"]:hover {
            background-color: #0069d9;
        }
    </style>
</head>

<body>
    <h1>Traitement de fichier image</h1>

    <!-- 
        L'attribut enctype="multipart/form-data" est obligatoire pour le traitement de fichiers
    -->

    <form action="" method="post" enctype="multipart/form-data">
        <input type="text" name="nom" placeholder="Nom du fichier(optionnel)">
        <input type="file" name="monImage" id="image">
        <input type="submit" value="Envoyer">
    </form>
</body>

</html>