<?php

/* 
📋 Consigne de l'exercice :
    Vous allez créer un formulaire HTML permettant à l'utilisateur de saisir des informations personnelles, puis vous récupérerez et afficherez ces données en PHP.

   Étapes à suivre :

    1 - Concevez le formulaire HTML avec les champs suivants :

        - Ville (champ texte)
        - Code Postal (champ texte)
        - Adresse (champ texte)

   2- Récupérez les données saisies en PHP après la soumission du formulaire.

   3-Affichez les données avec des étiquettes claires correspondant à chaque champ.

   4- Gérez les erreurs : assurez-vous qu'il n'y a pas d'erreurs de type undefined index lorsque la page est visitée pour la première fois (avant la soumission du formulaire).

Questions de réflexion :

    - Avez-vous correctement structuré votre formulaire en HTML ?
    - Les données saisies s'affichent-elles correctement après la soumission ?
    - Avez-vous anticipé les erreurs lorsque le formulaire n’a pas encore été soumis ?

Bonus (pour aller plus loin) :
    - Ajoutez des vérifications de format pour le code postal (par exemple, 5 chiffres).
    - Implémentez des messages d’erreurs personnalisés si des champs sont laissés vides.
*/

$errors=[];

if($_SERVER['REQUEST_METHOD']=='POST'){

    $ville = isset($_POST['ville']) ? $_POST['ville'] : '';
    $codePostal = isset($_POST['codePostal']) ? $_POST['codePostal'] : '';
    $adresse = isset($_POST['adresse']) ? $_POST['adresse'] : '';


    if(empty($ville)){
        $errors['ville']="Le champ ville est obligatoire";
    }

    if(empty($codePostal)){
        $errors['codePostal']="Le champ codePostal est obligatoire";
    }

    if(empty($adresse)){
        $errors['adresse']="Le champ adresse est obligatoire";
    }

    if(!empty($errors)){
        echo "<h2 class='todo'>Erreurs</h2>";
        foreach($errors as $key=>$value){
            echo "<p>$value</p>";
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
            width: 40%;

        }

        label {
            display: block;
        }

        input {
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            width: 90%;
            margin: 10px;
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
    <h2 class="title">La méthode POST</h2>
    <h2 class="subtitle">Formulaire 2</h2>
    <h3 class="todo">Exercice</h3>

    <form action="" method="post">

        <label for="ville">Ville :</label>
        <input type="text" name="ville"> 

        <label for="codePostal">Code Postal :</label>
        <input type="text" name="codePostal">

        <label for="adresse">Adresse :</label>
        <input type="text" name="adresse">


        <input type="submit" value="Envoyer">
    </form>


</body>

</html>