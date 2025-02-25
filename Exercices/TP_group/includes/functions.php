<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'PHPMailer/src/Exception.php';



// Fonction pour récupérer un livre par son ID
function getBookById($id)
{
    // Charger le fichier livres.txt
    $jsonContent = file_get_contents("livres.txt");
    $books = json_decode($jsonContent, true);

    if ($books === null) {
        echo "<p style='color: red;'>Erreur de lecture du fichier JSON.</p>";
        exit;
    }

    // Rechercher le livre correspondant
    foreach ($books as $bookData) {
        if ($bookData["id"] === $id) {
            return $bookData; // Retourne le livre trouvé
        }
    }

    // Si le livre n'est pas trouvé
    echo "<div class='error-card'>";
    echo "<p class='msg'>Livre introuvable.</p>";
    echo "<a href='home.php' class='cancel-btn'>Retour à l'accueil</a>";
    echo "</div>";
    exit;
}



// Fonction pour envoyer un mail
function sendMail($nom, $email, $sujet, $message)
{
    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->SMTPDebug = 0;   // Activer les messages de débogage
        $mail->isSMTP();             // Utiliser le protocole SMTP
        $mail->Host       = 'smtp.gmail.com';  // Serveur SMTP
        $mail->SMTPAuth   = true;     // Activer l'authentification SMTP
        $mail->Username   = 'VOTRE EMAIL';                     // Nom d'utilisateur SMTP
        $mail->Password   = 'VOTRE MOT DE PASSE D APPLICATION';                               // Mot de passe SMTP
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; // Sécuriser le transfert
        $mail->Port       = 465;                                    // Port TCP pour la connexion

        // Destinataires
        $mail->setFrom('romyklk2210@gmail.com', 'TD BOOKS APP PHP'); // Expéditeur
        $mail->addAddress($email, $nom);     // Destinataire
        $mail->addReplyTo('romyklk2210@gmail.com', 'TD BOOKS APP PHP'); // Adresse de réponse

        // Contenu du mail
        $mail->isHTML(true);  // Permet d'envoyer du HTML dans le mail
        $mail->Subject = $sujet;
        $mail->Body    = nl2br($message); // Convertir les retours à la ligne en balises <br>

        // Envoi du mail
        return $mail->send();
    } catch (Exception $e) {
        echo "Erreur d'envoi: {$mail->ErrorInfo}";
        return false;
    }
}


// Fonction pour traiter le téléchargement de l'image
function uploadImage($file)
{
    $uploadDir = 'uploads/';

    $uploadFile = $uploadDir . basename($file['name']);

    $imageFileType = strtolower(pathinfo($uploadFile, PATHINFO_EXTENSION));

    $allowedTypes = ['jpg', 'png', 'webp', 'avif','jpeg'];

    // Vérifier si le dossier existe, sinon le créer
    // 0755 signifie que le dossier est créé avec les permissions 755 (exécution, écriture, lecture et exécution)

    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0755, true); 
    }

    // Vérifier si le fichier est une image
    if (in_array($imageFileType, $allowedTypes)) {
        // Générer un nom de fichier unique
        $newFileName = 'img_' . bin2hex(random_bytes(16)) . '_' . time() . '.' . $imageFileType;
        $uploadFile = $uploadDir . $newFileName; // Chemin complet du fichier téléchargé

        // Déplacer le fichier téléchargé
        if (move_uploaded_file($file['tmp_name'], $uploadFile)) {
            return $newFileName; // Retourner le nouveau nom du fichier téléchargé
        } else {
            return false; // Erreur lors du téléchargement
        }
    } else {
        return false; // Type de fichier non autorisé
    }
}
