<?php

include './includes/header.php';
include './includes/functions.php';

// Initialisation des erreurs et des valeurs par défaut
$errors = [];
$values = [
    "title" => "",
    "author" => "",
    "civility" => "M.",
    "year" => "",
    "pages" => "",
    "category" => [],
    "price" => "",
    "description" => "",
    "cover" => "",
];


if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // Récupérer les valeurs soumises et les valider

    $values["title"] = trim($_POST["title"]) ?? "";

    if (strlen($values["title"]) < 2 || strlen($values["title"]) > 150) {
        $errors["title"] = "Le titre doit contenir entre 2 et 150 caractères.";
    }

    $values["author"] = trim($_POST["author"]) ?? "";

    if (strlen($values["author"]) < 2 || strlen($values["author"]) > 150) {
        $errors["author"] = "Le nom de l'auteur doit contenir entre 2 et 150 caractères.";
    }

    $values["civility"] = $_POST["civility"] ?? "M.";

    $values["year"] = $_POST["year"] ?? "";

    if (!is_numeric($values["year"]) || $values["year"] < 2000 || $values["year"] > date("Y")) {
        $errors["year"] = "L'année doit être comprise entre 2000 et " . date("Y") . ".";
    }

    $values["pages"] = $_POST["pages"] ?? "";

    if (!is_numeric($values["pages"]) || $values["pages"] < 10 || $values["pages"] > 1000) {
        $errors["pages"] = "Le nombre de pages doit être compris entre 10 et 1000.";
    }

    $values["category"] = $_POST["category"] ?? [];

    if (empty($values["category"])) {
        $errors["category"] = "Vous devez sélectionner au moins une catégorie.";
    }

    $values["price"] = $_POST["price"] ?? "";

    if (!is_numeric($values["price"]) || $values["price"] < 0 || $values["price"] > 299) {
        $errors["price"] = "Le prix doit être compris entre 0 et 299 euros.";
    }

    $values["description"] = trim($_POST["description"]) ?? "";

    if (strlen($values["description"]) < 10 || strlen($values["description"]) > 500) {
        $errors["description"] = "La description doit contenir entre 10 et 500 caractères.";
    }

    //$values["cover"] = trim($_POST["cover"]) ?? "";
    /*  if (!filter_var($values["cover"], FILTER_VALIDATE_URL)) {
        $errors["cover"] = "L'URL de l'image de couverture est invalide.";
    } */



    //BONUS TRAITEMENT IMAGE
    $values["cover"] = $_FILES["cover"]["name"] ?? "";
    if ($values["cover"] === "") {
        $errors["cover"] = "Veuillez télécharger une image de couverture.";
    }




    //BONUS

    // Traitement de l'image de couverture
    // UPLOAD_ERR_OK signifie que le fichier a été téléchargé avec succès

    /*     if (isset($_FILES["cover"]) && $_FILES["cover"]["error"] === UPLOAD_ERR_OK) {

        $uploadedImage = uploadImage($_FILES["cover"]);

        if ($uploadedImage !== false) {
            $values["cover"] = $uploadedImage; // Stocker le nom du fichier
        } else {
            $errors["cover"] = "Erreur lors du téléchargement de l'image. Assurez-vous que c'est un format valide (JPG, PNG, WEBP, AVIF).";
        }
    } else {
        $errors["cover"] = "Veuillez télécharger une image de couverture.";
    }
 */

    // Vérifier le fichier uploadé
    if (isset($_FILES["cover"])) {
        if ($_FILES["cover"]["error"] === UPLOAD_ERR_OK) {
            $imageFileType = strtolower(pathinfo($_FILES["cover"]["name"], PATHINFO_EXTENSION));
            $allowedTypes = ['jpg', 'png', 'webp', 'avif', 'jpeg'];

            // Vérifier si le type de fichier est autorisé
            if (!in_array($imageFileType, $allowedTypes)) {
                $errors["cover"] = "Type de fichier non autorisé. Veuillez télécharger une image au format (JPG, PNG, WEBP, AVIF).";
            }
        } else {
            $errors["cover"] = "Erreur lors du téléchargement de l'image.";
        }
    }



    // Si aucune erreur, on stocke dans le fichier et on redirige vers details.php avec l'ID du livre
    /* 
     On charge les anciens livres dans $livres (pour éviter d'écraser les données).
     On ajoute le nouveau livre dans le tableau $livres[].
     On sauvegarde tout dans livres.txt en format JSON propre (JSON_PRETTY_PRINT).
     On redirige vers details.php?id=XXX pour afficher le livre ajouté.
    */
    if (empty($errors)) {
        // Générer un identifiant unique
        $id = uniqid();


        $uploadedImage = uploadImage($_FILES["cover"]);

        if ($uploadedImage !== false) {
            $values["cover"] = $uploadedImage; // Stocker le nom du fichier
        } else {
            $errors["cover"] = "Erreur lors du téléchargement de l'image. Assurez-vous que c'est un format valide (JPG, PNG, WEBP, AVIF).";
            exit;
        }

        // Créer un tableau avec les données du livre
        $bookData = [
            "id" => $id,
            "titre" => $values["title"],
            "auteur" => $values["author"],
            "civilite" => $values["civility"],
            "annee" => $values["year"],
            "pages" => $values["pages"],
            "categorie" => $values["category"],
            "prix" => $values["price"],
            "description" => $values["description"],
            "image" => $values["cover"],
        ];

        // Charger les anciens livres s'il y en a
        $livres = [];
        if (file_exists("livres.txt")) {
            $jsonData = file_get_contents("livres.txt");
            if (!empty($jsonData)) {
                $livres = json_decode($jsonData, true);
            }
        }

        // Ajouter le nouveau livre
        $livres[] = $bookData;

        // Enregistrer le JSON dans le fichier
        // JSON_PRETTY_PRINT pour une mise en forme lisible
        file_put_contents("livres.txt", json_encode($livres, JSON_PRETTY_PRINT));

        // Redirection vers la page des détails avec l'ID
        header("Location: details.php?id=" . $id);
        exit;
    }
}



?>


<main>
    <h1 class="center">Ajouter un Livre</h1>

    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-row">
            <div class="form-group">
                <label for="title">Titre</label>
                <input type="text" id="title" name="title" placeholder="Le Petit Prince" value="<?= htmlspecialchars($values["title"]) ?>">
                <span class="error"><?= $errors["title"] ?? "" ?></span>

            </div>

            <div class="form-group">
                <label for="author">Nom de l'Auteur</label>
                <input type="text" id="author" name="author" placeholder="Emile Zola" value="<?= htmlspecialchars($values["author"]) ?>">
                <span class="error"><?= $errors["author"] ?? "" ?></span>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label for="civility">Civilité</label>
                <select id="civility" name="civility">
                    <option value="M." <?= (isset($values["civility"]) && $values["civility"] == "M.") ? "selected" : "" ?>>M.</option>
                    <option value="Mme" <?= (isset($values["civility"]) && $values["civility"] == "Mme") ? "selected" : "" ?>>Mme</option>
                    <option value="Mlle" <?= (isset($values["civility"]) && $values["civility"] == "Mlle") ? "selected" : "" ?>>Mlle</option>
                </select>
                <span class="error"><?= $errors["civility"] ?? "" ?></span>
            </div>


            <div class="form-group">
                <label for="year">Année de publication</label>
                <input type="number" id="year" name="year" placeholder="2022" value="<?= htmlspecialchars($values["year"]) ?>">
                <span class="error"><?= $errors["year"] ?? ""  ?></span>
            </div>

            <div class="form-group">
                <label for="pages">Nombre de pages</label>
                <input type="number" id="pages" name="pages" placeholder="98" value="<?= htmlspecialchars($values["pages"]) ?>">
                <span class="error"><?= $errors["pages"] ?? ""  ?></span>
            </div>
        </div>

        <!--
        <div class="form-group">
            <label>Catégorie</label>
            <div class="checkbox-container">
                <div class="checkbox-item">
                    <input type="checkbox" id="roman" name="category[]" value="Roman">
                    <label for="roman">Roman</label>
                </div>
                <div class="checkbox-item">
                    <input type="checkbox" id="poesie" name="category[]" value="Poésie">
                    <label for="poesie">Poésie</label>
                </div>
                <div class="checkbox-item">
                    <input type="checkbox" id="theatre" name="category[]" value="Théâtre">
                    <label for="theatre">Théâtre</label>
                </div>
                <div class="checkbox-item">
                    <input type="checkbox" id="essai" name="category[]" value="Essai">
                    <label for="essai">Essai</label>
                </div>
                <div class="checkbox-item">
                    <input type="checkbox" id="bd" name="category[]" value="BD">
                    <label for="bd">BD</label>
                </div>
                <div class="checkbox-item">
                    <input type="checkbox" id="jeunesse" name="category[]" value="Jeunesse">
                    <label for="jeunesse">Jeunesse</label>
                </div>

            </div>
            <span class="error"><?= $errors["category"] ?? ""  ?></span>
        </div>
        -->

        <div class="form-group">
            <label>Catégorie</label>
            <div class="checkbox-container">
                <?php
                $categories = ["Roman", "Poésie", "Théâtre", "Essai", "BD", "Jeunesse", "Politique", "Science-fiction", "Fantastique", "Historique", "Humour", "Biographie", "Comédie", "Drame", "Romance", "Science"];
                foreach ($categories as $category) :
                    $isChecked = (isset($values["category"]) && in_array($category, $values["category"])) ? "checked" : "";
                ?>
                    <div class="checkbox-item">
                        <input type="checkbox" id="<?= strtolower($category) ?>" name="category[]" value="<?= $category ?>" <?= $isChecked ?>>
                        <label for="<?= strtolower($category) ?>"><?= $category ?></label>
                    </div>
                <?php endforeach; ?>
            </div>
            <span class="error"><?= $errors["category"] ?? "" ?></span>
        </div>


        <div class="form-row">
            <div class="form-group">
                <label for="price">Prix (€)</label>
                <input type="number" id="price" name="price" placeholder="55" value="<?= htmlspecialchars($values["price"]) ?>">
                <span class="error"><?= $errors["price"] ?? ""  ?></span>
            </div>
            <!--
            <div class="form-group">
                <label for="cover">Image de couverture (URL)</label>
                <input type="url" id="cover" name="cover" placeholder="https://exemple.com/image.jpg" value="<?= htmlspecialchars($values["cover"]) ?>">
                <span class="error"><?= $errors["cover"] ?? ""  ?></span>
            </div>
 -->

            <!-- 10 BONUS UPLOAD IMAGE -->
            <div class="form-group">
                <label for="cover">Image de couverture</label>
                <input type="file" id="cover" name="cover" accept="image/*">
                <span class="error"><?= $errors["cover"] ?? ""  ?></span>
            </div>
        </div>

        <!--
        <div class="form-group">
            <label for="buy_link">Lien vers l'achat</label>
            <input type="url" id="buy_link" name="buy_link" placeholder="https://exemple.com/livre">
        </div>
        -->

        <div class="form-group">
            <label for="description">Description courte</label>
            <textarea id="description" name="description" rows="3" placeholder="Ce livre est un roman très intéressant"><?= htmlspecialchars($values["description"]) ?></textarea>
            <span class="error"><?= $errors["description"] ?? ""  ?></span>
        </div>

        <button type="submit">Ajouter le Livre</button>
    </form>
</main>

<?php include './includes/footer.php'; ?>