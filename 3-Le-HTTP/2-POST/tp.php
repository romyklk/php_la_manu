<?php
$erreurs = [];

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $civilite = $_POST['civilite'] ?? '';
    $pseudo = $_POST['pseudo'] ?? '';
    $email = $_POST['email'] ?? '';
    $telephone = $_POST['telephone'] ?? '';
    $mot_de_passe = $_POST['mot_de_passe'] ?? '';
    $adresse = $_POST['adresse'] ?? '';
    $code_postal = $_POST['code_postal'] ?? '';
    $ville = $_POST['ville'] ?? '';
    $pays = $_POST['pays'] ?? '';


    if (empty($civilite)) {
        $erreurs['civilite'] = 'Veuillez sélectionner une civilité.';
    }

    if (empty($pseudo)) {
        $erreurs['pseudo'] = 'Veuillez entrer un pseudo.';
    } elseif (strlen($pseudo) < 2) {
        $erreurs['pseudo'] = 'Le pseudo doit contenir au moins 2 caractères.';
    } elseif (strlen($pseudo) > 20) {
        $erreurs['pseudo'] = 'Le pseudo ne doit pas dépasser 20 caractères.';
    }

    if (empty($email)) {
        $erreurs['email'] = 'Veuillez entrer une adresse e-mail.';
    }

    if (empty($telephone)) {
        $erreurs['telephone'] = 'Veuillez entrer un numéro de téléphone.';
    }

    if (empty($mot_de_passe)) {
        $erreurs['mot_de_passe'] = 'Veuillez entrer un mot de passe.';
    } elseif (strlen($mot_de_passe) < 8) {
        $erreurs['mot_de_passe'] = 'Le mot de passe doit contenir au moins 8 caractères.';
    }

    if (empty($adresse)) {
        $erreurs['adresse'] = 'Veuillez entrer une adresse postale.';
    }

    if (empty($code_postal)) {
        $erreurs['code_postal'] = 'Veuillez entrer un code postal.';
    } elseif (strlen($code_postal) != 5) {
        $erreurs['code_postal'] = 'Le code postal doit contenir 5 caractères.';
    }

    if (empty($ville)) {
        $erreurs['ville'] = 'Veuillez entrer une ville.';
    }

    if (empty($pays)) {
        $erreurs['pays'] = 'Veuillez entrer un pays.';
    }

    if (!empty($erreurs)) {
        foreach ($erreurs as $champ => $message) {
            echo "<p style='color: red;'>Erreur dans le champ $champ : $message</p>";
        }
    } else {
        echo "Civilité : " . htmlspecialchars($civilite) . "<br>";
        echo "Pseudo : " . htmlspecialchars($pseudo) . "<br>";
        echo "Email : " . htmlspecialchars($email) . "<br>";
        echo "Téléphone : " . htmlspecialchars($telephone) . "<br>";
        echo "Mot de passe : " . htmlspecialchars($mot_de_passe) . "<br>";
        echo "Adresse : " . htmlspecialchars($adresse) . "<br>";
        echo "Code postal : " . htmlspecialchars($code_postal) . "<br>";
        echo "Ville : " . htmlspecialchars($ville) . "<br>";
        echo "Pays : " . htmlspecialchars($pays) . "<br>";
    }

}

?>



<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire d'inscription</title>
</head>

<body>
    <form action="" method="post">
        <label>Civilité :</label>
        <input type="radio" name="civilite" value="M"> M
        <input type="radio" name="civilite" value="Mme"> Mme
        <br>
        <label>Pseudo :</label>
        <input type="text" name="pseudo" value="<?= $pseudo ?? '' ?>">
        <br>
        <label>Email :</label>
        <input type="text" name="email" value="<?= $email ?? '' ?>">
        <br>
        <label>Téléphone :</label> 
        <input type="text" name="telephone" value="<?= $telephone ?? '' ?>">
        <br>
        <label>Mot de passe :</label>
        <input type="password" name="mot_de_passe">
        <br>
        <label>Adresse :</label>
        <input type="text" name="adresse" value="<?= $adresse ?? '' ?>">
        <br>
        <label>Code postal :</label>
        <input type="text" name="code_postal" value="<?= $code_postal ?? '' ?>">
        <br>
        <label>Ville :</label>
        <input type="text" name="ville" value="<?= $ville ?? '' ?>">
        <br>
        <label>Pays :</label>
        <input type="text" name="pays" value="<?= $pays ?? '' ?>">
        <br>
        <button type="submit">Soumettre</button>
    </form>
</body>

</html>