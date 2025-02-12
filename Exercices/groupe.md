<style>
/* Styles de base pour le document Markdown */
body {
    font-family: 'Open Sans', sans-serif;
    line-height: 1.6;
    max-width: 900px;
    margin: 0 auto;
    padding: 2rem;
    color: #333;
    word-wrap: balance;
    background-color: #f9f9f9;
}


/* Titres */
h1, h2, h3, h4, h5, h6 {
    font-family: 'Poppins', sans-serif;
    color: #2c3e50;
    margin-top: 1rem;
    font-weight: 600;
}
h1 { font-size: 2rem; solid #3498db; }
h2 { font-size: 1.75rem;  solid #2ecc71; }
h3 { font-size: 1.25rem; color:#301d87; }
h4 { font-size: 1rem; color: #9b59b6; }

/* Liens */
a {
    color: #3498db;
    text-decoration: none;
    transition: all 0.3s ease;
}

a:hover {
    color: #2980b9;
}

/* Paragraphes et texte */
p {
    text-align: justify;
}

/* Listes */
ul, ol {
    padding-left: 2rem;
    margin-bottom: 1rem;
}

li {
    margin-bottom: 0.5rem;
}

/* Code */
code {
    background-color: #f8f9fa;
    padding: 0.2rem 0.4rem;
    border-radius: 4px;
    font-family: 'Fira Code', monospace;
    font-size: 0.9em;
    color: #e83e8c;
}

pre {
    background-color: #2c3e50;
    color: #ecf0f1;
    padding: 1rem;
    border-radius: 8px;
    overflow-x: auto;
    margin: 1.5rem 0;
}

pre code {
    background-color: transparent;
    color: inherit;
    padding: 0;
}

/* Blockquotes */
blockquote {
    border-left: 4px solid #3498db;
    margin: 1.5rem 0;
    padding: 1rem;
    background-color: #ecf0f1;
    font-style: italic;
}

/* Tables */
table {
    width: 100%;
    border-collapse: collapse;
    margin: 1.5rem 0;
}

th, td {
    padding: 0.75rem;
  border:1px solid lightgrey !important;
}

td{
}

th {
    background-color: #3498db;
    color: white;
}

tr:nth-child(even) {
    background-color: #f8f9fa;
}

/* Images */
img {
    max-width: 100%;
    height: auto;
    border-radius: 8px;
    margin: 1.5rem 0;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

/* Séparateur horizontal */
hr {
    border: 0;
    height: 2px;
    background: linear-gradient(to right, #3498db, #2ecc71);
    margin: 2rem 0;
}

/* Mise en évidence */
mark {
    background-color: #ffd700;
    padding: 0.2rem 0.4rem;
    border-radius: 4px;
}

/* Animations de transition */
* {
    transition: all 0.3s ease;
}

/* Media Queries pour la responsivité */
@media (max-width: 768px) {
    body {
        padding: 1rem;
    }
    
    h1 { font-size: 2rem; }
    h2 { font-size: 1.75rem; }
    h3 { font-size: 1.5rem; }
    h4 { font-size: 1.25rem; }
}

.module {
    font-size: 2.5rem;
    color: #f8f9fa;
    background-color: #3498db;
    text-align: center;
    padding: 0.5rem;
    margin: 1rem;
    border-radius: 8px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}
</style>

# <span style="background-color:#3498db;color:white;padding:0.5rem;border-radius:8px;box-shadow:0 4px 6px rgba(0, 0, 0, 0.1); display:block;text-align:center;">TP PHP : Gestion de Livres</span>

Réalisation d'un site de gestion de livres en PHP sans base de données. Le site doit permettre d'ajouter des livres, de les afficher, de les partager par e-mail et de simuler un paiement.

## Objectifs

- Révision des bases de PHP, incluant les variables, tableaux, boucles, conditions, fonctions, inclusions de fichiers,formulaires et envoi d'e-mails.

- Manipulation de fichiers pour la lecture et l'écriture.

---

## Consignes

### 1. Création du Header

- Créez un fichier `home.php` contenant un menu de navigation avec les liens suivants :
  - Accueil
  - Livres
- Ce menu doit être visible sur toutes les pages du site.

### 2. Création du Footer

- Créez un footer affichant votre nom, prénom et l'année en cours.
- L'année doit être dynamique et mise à jour automatiquement chaque année.
- Ce footer doit être présent sur toutes les pages du site.

### 3. Création du Formulaire d'Ajout de Livre

Dans le menu "Livres", créez un formulaire permettant de renseigner les informations suivantes :

- **Titre**
- **Nom de l'auteur**
- **Civilité** (M., Mme, Mlle) pour un groupe d'auteurs
- **Année de publication**
- **Nombre de pages**
- **Catégorie** (à cocher : roman, poésie, théâtre, essai, BD, jeunesse)
- **Prix**
- **Description courte**
- **Image de couverture** (URL)
- **Lien vers la page d'achat**

### 4. Traitement du Formulaire

- Lorsque le formulaire est soumis, les données doivent être envoyées à la page `details.php` via la méthode **POST**.
- Vérifiez que toutes les données sont envoyées et valides.
- Si ce n'est pas le cas, affichez un message d'erreur en rouge sous chaque champ concerné.
- En cas d'erreur, pré-remplissez le formulaire avec les données saisies.
- Les catégories disponibles sont : **roman, poésie, théâtre, essai, BD, jeunesse** (possibilité d'ajouter d'autres catégories).

### 5. Validation des Données

Les conditions suivantes doivent être respectées :

- **Titre** : longueur entre **2 et 150 caractères**
- **Nom de l'auteur** : longueur entre **2 et 150 caractères**
- **Année de publication** : comprise entre **2000 et 2025** (année en cours) et doit contenir **4 chiffres**
- **Nombre de pages** : entre **10 et 1000**
- **Catégorie** : au moins une catégorie sélectionnée (case à cocher)
- **Prix** : entre **0 et 299**
- **Description** : entre **1 et 500 caractères**
- **Lien vers l'image** : doit être une **URL valide**

Si une condition n'est pas respectée, affichez un **message d'erreur**.

### 6. Affichage des Données Saisies

- Sur la page `details.php`, affichez les données saisies par l'utilisateur dans une **carte** avec un **bouton de paiement**.
- Les données doivent être **stockées dans un fichier `livres.txt`**.
- Si une donnée est manquante ou invalide, affichez un message d'erreur à sa place.
- Lors du clic sur le bouton de paiement, envoyez les données à la page `paiement.php` via la méthode **GET** et affichez un **message de confirmation de paiement**.

### 7. Achat du Livre

- Si un utilisateur tente d'accéder à `paiement.php` sans avoir cliqué sur le bouton de paiement, redirigez-le vers la page du formulaire `livres.php`.

### 8. Affichage des Livres Stockés

- Parcourez le fichier `livres.txt` et affichez les livres sous forme de **cartes** sur la page `home.php`, **si des données existent dans le fichier**.

### 9. Partager un Livre avec un Ami

- Ajoutez un **bouton de partage** sur chaque carte de livre.
- Au clic sur ce bouton, l'utilisateur est redirigé vers `partage.php`.
- Sur `partage.php`, affichez un **formulaire** demandant les informations suivantes :
  - **Nom de l'ami**
  - **Adresse e-mail de l'ami** (validation du format e-mail requise)
  - **Message optionnel**
- Vérifiez le format de l'adresse e-mail avant l'envoi.
- Une fois le formulaire soumis, un **e-mail contenant les détails du livre** est envoyé à l'ami.
- Affichez un message de confirmation après l'envoi du mail.
- En cas d'erreur, affichez un message approprié et demandez à l'utilisateur de corriger les informations saisies.

### 10. Bonus

- Ajouter un input de type `file` pour permettre à l'utilisateur de télécharger un fichier image (format JPG, PNG,webp, avif) comme illustration du livre. 
- Remplacer l'image par défaut par une illustration de livre.
