<?php

//Traitement du formulaire

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    //Verifier les données reçues

    if(empty($_POST['email'])){
        $errorEmail ="<p style='color:red'>L'email est obligatoire</p>";

    }elseif(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){

        $errorEmail = "<p style='color:red'>L'email n'est pas valide</p>";
    }else{
        $email = $_POST['email'];
    }

    //Vérifier le mot de passe(minimum 8 caractères)

    $password = $_POST['password'] ?? '';


    if(empty($password)){
        $errorPassword ="<p style='color:red'>Le mot de passe est obligatoire</p>";
    }elseif(strlen($password) < 8){
        $errorPassword = "<p style='color:red'>Le mot de passe doit contenir au moins 8 caractères</p>";
    }else{
        $password = $password;
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
            background-color: rgb(255, 255, 255);
            font-family: Arial, Helvetica, sans-serif;
        }
        h1 {
            text-align: center;
            color: rgb(0, 0, 0);
        }

        form {
            background-color: rgb(240, 240, 240);
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            width: 400px;
            margin: 0 auto;
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input[type="text"],
        input[type="password"] {
            width: 90%;
            padding: 10px;
            margin-bottom: 20px;
            display: block;
            border: none;
            border-radius: 5px;
        }

        input[type="submit"] {
            background-color: rgb(0, 0, 0);
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: rgb(0, 128, 0);
        }
    </style>
    <script src="./app.js" defer></script>
</head>
<body>
    <h1>Login Form</h1>
    <form action="" method="post">
        <label for="email">email</label>
        <input type="text" name="email" id="email" value="<?= $email ?? '' ?>">
        <small>
            <?= $errorEmail ?? '' ?>
        </small>

        <label for="password">Password</label>
        <input type="password" name="password" id="password" value="<?= $password ?? '' ?>">
        <small>
            <?= $errorPassword ?? '' ?>
        </small>
        <input type="submit" value="Submit">
    </form>
</body>
</html>