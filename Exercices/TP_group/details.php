<?php
include './includes/header.php';

// Vérifier si un ID est passé en GET
if (!isset($_GET["id"])) {
    echo "<div class='error-card'>";
    echo "<p class='msg'>Aucun livre sélectionné.</p>";
    echo "<a href='home.php' class='cancel-btn'>Retour à l'accueil</a>";
    echo "</div>";
    exit;
}


$id = $_GET["id"]; //récupérer l'ID du livre dans la GET

// Charger le fichier livres.txt
$books = file("livres.txt", FILE_IGNORE_NEW_LINES);

// Lire tout le contenu du fichier
$jsonContent = file_get_contents("livres.txt");

// Décoder le JSON en tableau associatif
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

// Si aucun livre trouvé, afficher un message d'erreur
if (!$foundBook) {
    echo "<div class='error-card'>";
    echo "<p class='msg'>Livre non trouvé.</p>";
    echo "<a href='home.php' class='cancel-btn'>Retour à l'accueil</a>";
    echo "</div>";
    exit;
}
?>

<main>
    <div class="book-details">

        <p><strong>Auteur :</strong> <?= htmlspecialchars($foundBook["civilite"]) . " " . htmlspecialchars($foundBook["auteur"]) ?></p>
        <h2><?= htmlspecialchars($foundBook["titre"]) ?></h2>
        <p><strong>Année de publication :</strong> <?= htmlspecialchars($foundBook["annee"]) ?></p>
        <p><strong>Nombre de pages :</strong> <?= htmlspecialchars($foundBook["pages"]) ?></p>
        <p><strong>Catégorie :</strong> <?= htmlspecialchars(implode(", ", $foundBook["categorie"])) ?></p>
        <p><strong>Prix :</strong> <?= htmlspecialchars($foundBook["prix"]) ?> €</p>
        <p><strong>Description :</strong> <?= nl2br(htmlspecialchars($foundBook["description"])) ?></p>
        <!--
        <img src="<?= htmlspecialchars($foundBook["image"]) ?>" alt="Couverture du livre" class="book-cover">
            -->
        <!-- BONUS -->

        <img src="uploads/<?= htmlspecialchars($foundBook["image"]) ?>" alt="Couverture du livre" class="book-cover">


    </div>
    <div class="button-container">
        <a href="paiement.php?id=<?= $id ?>&prix=<?= htmlspecialchars($foundBook["prix"]) ?>" class="btn btn-pay">Procéder au paiement</a>

        <!--Partager-->
        <a class="btn btn-share" href='partage.php?id=<?php echo htmlspecialchars($foundBook["id"]); ?>'>Partager</a>

    </div>
</main>

<?php include './includes/footer.php'; ?>