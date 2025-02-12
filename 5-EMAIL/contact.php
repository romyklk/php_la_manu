<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';



/* 
1- Créer un formulaire de contact avec les champs suivants:
- Nom
- Prénom
- Email
-Sujet
- Message

2-Faire le traitement du formulaire en php:
- Vérifier que tous les champs sont remplis
- Vérifier que l'email est valide
- Le nom et le prénon doivent contenir au moins 3 caractères
- Le sujet doit contenir au moins 5 caractères
- Le message doit contenir au moins 10 caractères

3- Si le formulaire est correctement rempli, afficher les données du formulaire Sinon, afficher les erreurs explicatives au sujet des champs manquants ou invalides.
*/

// Traitement du formulaire
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Vérifier que tous les champs sont remplis
    if (empty($_POST['nom']) || empty($_POST['prenom']) || empty($_POST['email']) || empty($_POST['sujet']) || empty($_POST['message'])) {
        $allErrors = "<p style='color:red;text-align:center;'>Veuillez remplir tous les champs</p>";
    }

    $nom = $_POST['nom'] ?? '';

    if (strlen($nom) < 3) {
        $errorNom = "<p style='color:red;text-align:center;'>Le nom doit contenir au moins 3 caractères</p>";
    } else if (strlen($nom) > 50) {
        $errorNom = "<p style='color:red;text-align:center;'>Le nom ne doit pas dépasser 50 caractères</p>";
    } else if (empty($nom)) {
        $errorNom = "<p style='color:red;text-align:center;'>Le nom est obligatoire</p>";
    } else {
        $nom = $nom;
    }


    $prenom = $_POST['prenom'] ?? '';

    if (strlen($prenom) < 3) {
        $errorPrenom = "<p style='color:red;text-align:center;'>Le prénom doit contenir au moins 3 caractères</p>";
    } else if (strlen($prenom) > 50) {
        $errorPrenom = "<p style='color:red;text-align:center;'>Le prénom ne doit pas dépasser 50 caractères</p>";
    } else if (empty($prenom)) {
        $errorPrenom = "<p style='color:red;text-align:center;'>Le prénom est obligatoire</p>";
    } else {
        $prenom = $prenom;
    }

    // Vérifier que l'email est valide
    $email = $_POST['email'] ?? '';

    if (empty($email)) {
        $errorEmail = "<p style='color:red;text-align:center;'>L'email est obligatoire</p>";
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errorEmail = "<p style='color:red;text-align:center;'>L'email n'est pas valide</p>";
    } else {
        $email = $email;
    }

    // Vérifier que le sujet est valide
    $sujet = $_POST['sujet'] ?? '';

    if (empty($sujet)) {
        $errorSujet = "<p style='color:red;text-align:center;'>Le sujet est obligatoire</p>";
    } else if (strlen($sujet) > 50) {
        $errorSujet = "<p style='color:red;text-align:center;'>Le sujet ne doit pas dépasser 50 caractères</p>";
    } else if (strlen($sujet) < 5) {
        $errorSujet = "<p style='color:red;text-align:center;'>Le sujet doit contenir au moins 5 caractères</p>";
    } else {
        $sujet = $sujet;
    }

    $message = $_POST['message'] ?? '';

    if (strlen($message) < 10) {
        $errorMessage = "<p style='color:red;text-align:center;'>Le message doit contenir au moins 10 caractères</p>";
    } else {
        $message = $message;
    }



    // ENVOI DU MAIL AVEC PHPMAILER

    if (empty($errorNom) && empty($errorPrenom) && empty($errorEmail) && empty($errorSujet) && empty($errorMessage)) {

        //Création d'une instance de PHPMailer
        $mail = new PHPMailer(true);


        try {
            //Server settings
            //$mail->SMTPDebug = SMTP::DEBUG_SERVER;  //Activer ou non les messages de débogage

            $mail->isSMTP(); // Permet d'utiliser le serveur SMTP

            $mail->Host= 'smtp.gmail.com';    //Spécifier le serveur SMTP
            $mail->SMTPAuth   = true;  //Activer l'authentification SMTP
            $mail->Username   = "VOTRE MAIL D'AUTHENTIFICATION";     //SMTP username
            $mail->Password   = 'MOT DE PASSE APPLICATION (CAS DE GOOGLE)';         //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //
            $mail->Port       = 465;             //TCP 

            //Recipients
            $mail->setFrom(
                'MAIL D\'ENVOI',
                'Nom de l\'expéditeur'
            );

            $mail->addAddress($email, "$nom $prenom");     // EMAIL ET NOM DU DESTINATAIRE

            $mail->addReplyTo($email, "$nom $prenom");    // EMAIL ET NOM DU DESTINATAIRE AU CAS OU IL VEUT REPONDRE


            //Content
            $mail->isHTML(true);    // ACCEPTE LES MAILS EN HTML
            $mail->Subject = $sujet;    // SUJET DU MAIL

            $mail->Body    = $message;   // CONTENU DU MAIL
            $mail->AltBody = $message;   // CONTENU DU MAIL EN TEXTE PLAIN

            $mail->send();
            echo "<p style='color:green;text-align:center;'>Message envoyé avec succès</p>";
        } catch (Exception $e) {
            echo "Un problème est survenu lors du traitement. Mailer Error: {$mail->ErrorInfo}";
        }
    }
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Envoi de mail </title>

    <style>
        body {
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 20px;
            min-height: 80vh;
        }

        h1 {
            text-align: center;
            color: #2c3e50;
            margin: 40px 0;
            font-size: 2.5em;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
        }

        h1:hover {
            text-shadow: 4px 4px 8px rgba(0, 0, 0, 0.2);
            color: #103248;
            transition: all 0.3s ease;
        }

        form {
            background: rgba(255, 255, 255, 0.9);
            max-width: 600px;
            width: 90%;
            margin: 0 auto;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 2px;
            color: #34495e;
            font-weight: 500;
        }

        input[type="text"],
        input[type="email"],
        textarea {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            transition: all 0.3s ease;
            box-sizing: border-box;
        }

        input[type="text"]:focus,
        input[type="email"]:focus,
        textarea:focus {
            border-color: #3498db;
            box-shadow: 0 0 8px rgba(52, 152, 219, 0.3);
            outline: none;
        }

        textarea {
            min-height: 100px;
            resize: vertical;
        }

        input[type="submit"] {
            background: linear-gradient(to right, #3498db, #2980b9);
            color: white;
            padding: 12px 30px;
            border: none;
            border-radius: 25px;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
            transition: transform 0.2s ease;
        }

        input[type="submit"]:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }
    </style>

</head>

<body>
    <h1>Envoi de mail</h1>
    <form action="contact.php" method="post">
        <?php
        if (!empty($allErrors)) {
            echo $allErrors;
        }
        ?>

        <label for="nom">Nom</label>
        <input type="text" name="nom" id="nom" placeholder="DOE" value="<?= $nom ?? '' ?>">
        <b>
            <?= $errorNom ?? '' ?>
        </b>

        <label for="prenom">Prénom</label>
        <input type="text" name="prenom" id="prenom" placeholder="John" value="<?= $prenom ?? '' ?>">
        <b>
            <?= $errorPrenom ?? '' ?>
        </b>

        <label for="email">Email</label>
        <input type="text" name="email" id="email" placeholder="john@doe.com" value="<?= $email ?? '' ?>">
        <b>
            <?= $errorEmail ?? '' ?>
        </b>

        <label for="sujet">Sujet</label>
        <input type="text" name="sujet" id="sujet" placeholder="Demande de renseignements" value="<?= $sujet ?? '' ?>">
        <b>
            <?= $errorSujet ?? '' ?>
        </b>

        <label for="message">Message</label>
        <textarea name="message" id="message" placeholder="Votre message ici..."><?= $message ?? '' ?></textarea>
        <b>
            <?= $errorMessage ?? '' ?>
        </b>


        <input type="submit" value="Envoyer">
    </form>
</body>

</html>