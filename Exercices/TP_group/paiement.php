<?php
include './includes/header.php';

// Vérifie si les paramètres "id" et "prix" sont présents
if (!isset($_GET['id']) || !isset($_GET['prix'])) {
    // Redirection vers la liste des livres si accès direct
    header("Location: livres.php");
    exit();
}

// Récupération des valeurs envoyées via GET
$id = htmlspecialchars($_GET['id']);
$prix = htmlspecialchars($_GET['prix']);

// Charger le fichier livres.txt
$jsonContent = file_get_contents("livres.txt");

// Décoder le JSON en tableau associatif
$books = json_decode($jsonContent, true);

// Vérifier si le chargement du fichier JSON a réussi
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
    // Redirection vers la liste des livres si le livre n'existe pas
    header("Location: livres.php");
    exit();
}


?>



<main>
    <div class="payment-confirmation">
        <h2>Merci pour votre achat !</h2>
        <p>Votre paiement pour le livre <strong>#<?= $foundBook["titre"] ?></strong> d'un montant de <strong><?= $foundBook["prix"] ?> €</strong> a bien été enregistré.</p>
        <a href="home.php" class="btn btn-home">Retour à l'accueil</a>
    </div>
</main>



<?php include './includes/footer.php'; ?>