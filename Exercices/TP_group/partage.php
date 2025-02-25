<?php
session_start();
include './includes/header.php';

include './includes/functions.php';

// Vérifier si un ID est passé en GET
if (!isset($_GET["id"])) {
    echo "<div class='error-card'>";
    echo "<p class='msg'>Aucun livre sélectionné.</p>";
    echo "<a href='home.php' class='cancel-btn'>Retour à l'accueil</a>";
    echo "</div>";
    exit;
}


$id = $_GET["id"]; // Récupérer l'ID du livre dans la GET
$foundBook = getBookById($id); // Appeler la fonction pour obtenir le livre


/* 
FACTORISER LES CODES CAR ON FAIT CETTE VERIFICATION TOUT LE TEMPS
// Vérifier si un ID est passé en GET
if (!isset($_GET["id"])) {
    echo "<div class='error-card'>";
    echo "<p class='msg'>Aucun livre sélectionné.</p>";
    echo "<a href='home.php' class='cancel-btn'>Retour à l'accueil</a>";
    echo "</div>";
    exit;
}

$id = $_GET["id"]; // récupérer l'ID du livre dans la GET

// Charger le fichier livres.txt
$jsonContent = file_get_contents("livres.txt");
$books = json_decode($jsonContent, true);

if ($books === null) {
    echo "<p style='color: red;'>Erreur de lecture du fichier JSON.</p>";
    exit;
}

// Rechercher le livre correspondant
$foundBook = null;
foreach ($books as $bookData) {
    if ($bookData["id"] === $id) {
        $foundBook = $bookData;
        break;
    }
}

// Vérifier si le livre a été trouvé
if ($foundBook === null) {
    echo "<div class='error-card'>";
    echo "<p class='msg'>Livre introuvable.</p>";
    echo "<a href='home.php' class='cancel-btn'>Retour à l'accueil</a>";
    echo "</div>";
    exit;
} */

$errors = [];

$nom = "";
$email = "";
$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupération des données du formulaire
    $nom = htmlspecialchars($_POST['nom']) ?? "";
    $email = htmlspecialchars($_POST['email']) ?? "";
    $message = htmlspecialchars($_POST['message']) ?? "";

    if (empty($nom)) {
        $errors['nom'] = "Le nom de l'ami est obligatoire.";
    } elseif (iconv_strlen($nom) > 150) {
        $errors['nom'] = "Le nom de l'ami doit faire moins de 150 caractères.";
    } elseif (!preg_match('/^[a-zA-Z\s]+$/', $nom)) {
        $errors['nom'] = "Le nom de l'ami ne doit contenir que des lettres et des espaces.";
    } elseif (iconv_strlen($nom) < 2) {
        $errors['nom'] = "Le nom de l'ami doit contenir au moins 2 caractères.";
    }

    if (empty($email)) {
        $errors['email'] = "L'adresse e-mail est obligatoire.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "L'adresse e-mail saisie n'est pas valide.";
    }

    // Envoi de mail e-mail
    if (empty($errors)) {
        // Préparation des données
        $subject = "Partage d'un livre : " . $foundBook['titre'];
        $body = "Bonjour " . $nom . ",<br><br>" .
            "Votre ami vous recommande le livre suivant :<br>" .
            "Titre : " . $foundBook['titre'] . "<br>" .
            "Auteur : " . $foundBook['auteur'] . "<br>" .
            "Prix : " . $foundBook['prix'] . " €<br><br>" .
            "Message : " . nl2br($message) . "<br><br>" .
            "Cordialement,<br>" .
            "L'équipe de gestion des livres";

        // Envoi de l'e-mail avec PHPMailer
        if (sendMail($nom, $email, $subject, $body)) {
            $success = "L'e-mail a été envoyé avec succès à " . $nom . " !";
            // Stocker le message dans la session
            $_SESSION['message'] = $success;


            // Rediriger vers la même page avec l'ID du livre
            // header("Location: partage.php?id=" . urlencode($id));

            // Rediriger vers la même page avec l'ID du livre
            header("Location: " . $_SERVER['PHP_SELF'] . "?id=" . urlencode($id));
            exit; // Arrêter l'exécution du script

        } else {
            $error = "Une erreur s'est produite lors de l'envoi de l'e-mail. Veuillez réessayer.";
        }
    }
}
?>


<main>
    <h1 class="center">Partager un Livre</h1>

    <?php if (isset($_SESSION['message']) && !empty($_SESSION['message'])): ?>
        <p style='color: green;text-align: center;font-size: 1.6rem;'><?= $_SESSION['message'] ?></p>

        <?php session_destroy(); ?>
    <?php endif; ?>

    <div class="shared-container">

        <div class="shared-book-card">
            <h2><?php echo htmlspecialchars($foundBook['titre']); ?></h2>
            <p>Auteur : <?php echo htmlspecialchars($foundBook['auteur']); ?></p>
            <p>Prix : <?php echo htmlspecialchars($foundBook['prix']); ?> €</p>
            <?php if (!empty($foundBook['image'])): ?>
                <!-- 
 <img src="<?php echo htmlspecialchars($foundBook['image']); ?>" alt="Image de <?php echo htmlspecialchars($foundBook['titre']); ?>">
               -->
                <!-- BONUS -->
                <img src='uploads/<?php echo htmlspecialchars($foundBook["image"]); ?>' alt='<?php echo htmlspecialchars($foundBook["titre"]); ?>' class='book-image'>
            <?php endif; ?>
        </div>

        <div class="share-form">
            <form action="partage.php?id=<?php echo htmlspecialchars($id); ?>" method="POST">
                <label for="nom">Nom de l'ami </label>
                <input type="text" name="nom" class="share-form-control" placeholder="John Doe" value="<?php echo htmlspecialchars($nom); ?>">
                <span class="error"><?php echo $errors['nom'] ?? ''; ?></span>


                <label for="email">Adresse e-mail </label>
                <input type="email" name="email" class="share-form-control" placeholder="example@example.com" value="<?php echo htmlspecialchars($email); ?>">
                <span class="error"><?php echo $errors['email'] ?? ''; ?></span>

                <label for="message">Message (optionnel)</label>
                <textarea name="message" class="share-form-control" placeholder="Bonjour, je vous recommande ce livre !"></textarea>

                <input type="submit" value="Envoyer" class="submit-btn">
            </form>
        </div>
    </div>
</main>




<?php include './includes/footer.php'; ?>