<?php

//Traitement du formulaire 3

$errors=[];

if($_SERVER['REQUEST_METHOD']=='POST'){

    //Récupération des données
    $pseudo = $_POST['pseudo'] ?? '';
    $email = $_POST['email'] ?? '';

    //Vérification des données
    if(empty($pseudo)){
        $errors['pseudo']="Le champ pseudo est obligatoire";
    }else if(strlen($pseudo)<3){
        $errors['pseudo']="Le pseudo doit contenir au moins 3 caractères";
    }

    if(empty($email)){
        $errors['email']="Le champ email est obligatoire";
    }

    //Format de l'email
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $errors['email']="L'adresse email n'est pas valide";
    }
   

    if(!empty($errors)){
        echo "<h2 class='todo'>Erreurs</h2>";
        foreach($errors as $key=>$value){
            echo "<p>$value</p>";
        }
        echo "<a href='formulaire-3.php'>Formulaire</a>";
    }else{
        echo "<h2 class='todo'>Formulaire traité</h2>";
        echo "<p>Le pseudo est : $pseudo</p>";
        echo "<p>L'email est : $email</p>";
    }

}
