<?php

if(isset($_GET['fruit'])){

    $tab_fruit=["pomme","poire","fraise","cerise"];

    if(in_array($_GET['fruit'],$tab_fruit)){

        $nom_fruit=$_GET['fruit'];

        echo "<img src='$nom_fruit.jpg' alt='$nom_fruit' width='200' height='200'>";
    }else{
        echo "Aucun fruit n'a été sélectionné";
    }


}
?>

<a href="tp.php">Retour</a>