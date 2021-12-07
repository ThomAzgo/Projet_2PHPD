<?php
    $BDD = array();
    $BDD['host'] = "localhost";
    $BDD['user'] = "root";
    $BDD['pass'] = "";
    $BDD['db'] = "jeanstore_projet";

    $mysqli = mysqli_connect($BDD['host'],
                            $BDD['pass'],
                            $BDD['db']);
    
    if(!$mysqli) {
        echo "Connexion échoué.";
        exit;
    }

    $AfficherFormulaire = 1;

    if (isset($_POST['pseudo'],$_POST['mdp'])) 
    
?>