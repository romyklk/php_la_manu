<?php
include './includes/header.php';

// Vérifie si le fichier livres.txt existe
$books = [];

if (file_exists("livres.txt")) {
    // Lire le contenu du fichier
    $jsonContent = file_get_contents("livres.txt");

    // Décoder le JSON en tableau associatif
    $books = json_decode($jsonContent, true);

    // Vérifier si le décodage a réussi
    if ($books === null) {
        $books = [];
    }
}
?>

<main>
    <h1>Bienvenue sur la gestion de livres</h1>
    <p>Ce site vous permet d'ajouter, afficher et partager des livres.</p>

    <?php if (!empty($books)) : ?>
        <div class='book-container'> <!-- Conteneur pour les cartes de livres -->
            <?php foreach ($books as $bookData) : ?>
                <div class='book-card'>
                    <!-- 
                     <img src='<?php echo htmlspecialchars($bookData["image"]); ?>' alt='<?php echo htmlspecialchars($bookData["titre"]); ?>' class='book-image'>
                     -->
                    <img src='uploads/<?php echo htmlspecialchars($bookData["image"]); ?>' alt='<?php echo htmlspecialchars($bookData["titre"]); ?>' class='book-image'>

                    <h2><?php echo htmlspecialchars($bookData["titre"]); ?></h2>
                    <p>Prix : <?php echo htmlspecialchars($bookData["prix"]); ?> €</p>
                    <p>Auteur : <?php echo htmlspecialchars($bookData["auteur"]); ?></p>
                    <a href='details.php?id=<?php echo htmlspecialchars($bookData["id"]); ?>'>Voir les détails</a>
                </div> <!-- Fin de la carte -->
            <?php endforeach; ?>
        </div> <!-- Fin du conteneur -->
    <?php else : ?>
        <p class="msg">La liste des livres est vide. Veuillez ajouter un livre.</p>
    <?php endif; ?>
</main>

<?php include './includes/footer.php'; ?>