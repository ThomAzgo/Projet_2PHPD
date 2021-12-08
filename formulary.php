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

    if (isset($_POST['pseudo'],$_POST['mdp'])) {
        if(empty($_POST['pseudo'])) {
            echo "Le champ Pseudo est vide.";
    } elseif(!preg_match("#^[a-z0-9]+$#",$_POST['pseudo'])) {
        echo "Le Pseudo doit être renseigné en lettres minuscules sans accents, sans caractères spéciaux.";
    } elseif(strlen($_POST['pseudo'])>25) {
        echo "Le pseudo est trop long, il dépasse 25 caractères.";
    } elseif(empty($_POST['mdp'])){
        echo "Le champ Mot de passe est vide.";
    } elseif(mysqli_num_rows(mysqli_query($mysqli,"SELECT * FROM membres WHERE pseudo='".$_POST['pseudo']."'"))==1){
        echo "Ce pseudo est déjà utilisé.";
    } else {
        if(!mysqli_query($mysqli,"INSERT INTO membres SET pseudo='".$_POST['pseudo']."', mdp='".md5($_POST['mdp'])."'")){
            echo "Une erreur s'est produite: ".mysqli_error($mysqli);
        } else {
            echo "Vous êtes inscrit avec succès!";

            $AfficherFormulaire=0;

        }
    }
    if($AfficherFormulaire==1){      
        ?> 
    <br />
        <form method="post" action="inscription.php">
        Pseudo (a-z0-9) : <input type="text" name="pseudo">
        <br />
        Mot de passe : <input type="password" name="mdp">
        <br />
        <input type="submit" value="S'inscrire">
    </form>
    <?php
}
?>