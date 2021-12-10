<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $host = "localhost";
        $username = "root";
        $password = "";
        $database = "users";

        $name = $_POST["name"]; 
        $email = $_POST["email"];

        
        if(!$mysqli) {
            echo "Connexion failed.";
            exit;
        }

        if (isset($_POST['email'],$_POST['password'])) {
            if(empty($_POST['username'])) {
                echo "The username tag is empty.";
        } elseif(!preg_match("#^[a-z0-9]+$#",$_POST['username'])) {
            echo "The username should be in lowercase without spaces, numbers or special characters.";
        } elseif(strlen($_POST['username'])>25) {
            echo "The username is too long, it should be at 25 characters at max.";
        } elseif(empty($_POST['password'])){
            echo "The password tag is empty.";
        } elseif(mysqli_num_rows(mysqli_query($mysqli,"SELECT * FROM users WHERE username='".$_POST['username']."'"))==1){
            echo "This username is not available.";
        } else {
            if(!mysqli_query($mysqli,"INSERT INTO users SET username='".$_POST['username']."', password='".md5($_POST['password'])."'")){
                echo "An error as appeared: ".mysqli_error($mysqli);
            } else {
                echo "You've registered with success!";
                }
            }
        }

        $mysqli = new mysqli($host, $username, $password, $database);
        if ($mysqli->connect_error) {
            die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
        }
        $statement = $mysqli->prepare("INSERT INTO users (name, email) VALUES(?, ?)"); 

        $statement->bind_param('ss', $name, $email); 
            
        if($statement->execute()){
            print "Salut " . $name . "!, votre adresse e-mail est ". $email;
        }else{
            print $mysqli->error;
        }
    }
?>