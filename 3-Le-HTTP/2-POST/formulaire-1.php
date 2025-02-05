<?php

/* 
Pour envoyer d'un formulaire vers un serveur, il faut utiliser la méthode POST.

Elle permet de transmettre des données de manière sécurisée(pas visibles dans l'url).

Pour cela il faut:
- Ajouter dans le formulaire l'attribut  method="POST" pour indiquer que l'on souhaite envoyer des données via POST.
- Ajouter les attributs name sur les champs du formulaire.

Dans mons script PHP, je vais utiliser la superglobal $_POST qui contient toutes les données passées dans le formulaire.Comme tous les superglobals, il faut écrire en majuscules et c'est un tableau.

Afin d'accéder à une valeur, on utilise la syntaxe $_POST['le_nom_de_lattribut_name'].
Exemple : $_POST['nom'] pour accéder au nom du formulaire.

$_SERVER est une superglobal qui contient toutes les informations sur le serveur.
On peut accéder à l'adresse du client via $_SERVER['REMOTE_ADDR'] etc...

Afin de savoir si la méthode est POST ou GET, on peut vérifier avec $_SERVER['REQUEST_METHOD']
Elle permet de savoir si la méthode est POST ou GET.
Plus précise et plus sécurisée.
Garantit que la requête est bien envoyée en POST.
Recommandé pour les formulaires pour les bonnes pratiques.
*/

$nom='';

if($_SERVER['REQUEST_METHOD']=='POST'){

    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];

    echo "Bonjour $nom $prenom";
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

        form{
            background-color: #fff;
            padding:20px;
            border-radius:10px;
            box-shadow: 0 0 10px #ccc;
            margin: 0 auto;
            width: 30%;

        }

        label{
            display:block;
        }   

        input{
            padding:10px;
            border-radius:5px;
            border:1px solid #ccc;
        }

        input[type="submit"]{
            background-color: #4aa0c4;
            color: #fff;
            padding:10px;
            border-radius:5px;
            border:none;
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
        <input type="text" name="nom" value="<?php echo $nom; ?>">
      
        <label for="prenom">Prénom :</label>
        <input type="text" name="prenom">
      
        <input type="submit" value="Envoyer">
    </form>
</body>

</html>