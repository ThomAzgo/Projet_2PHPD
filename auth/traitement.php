<?php
    require_once 'config.php';

    if (isset($_POST['nickname']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['password_retype'])){

        $nickname = htmlspecialchars($_POST['nickname']);
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);
        $password_retype = htmlspecialchars($_POST['password_retype']);
        $postal = htmlspecialchars($_POST['postal']);
        $phone = htmlspecialchars($_POST['phone']);
        $billing_adress = htmlspecialchars($_POST['billing_adress']);
        $country = htmlspecialchars($_POST['country']);


        $check = $bdd->prepare('SELECT nickname, email, password FROM jeanstore_user WHERE email = ?');
        $check->execute(array($email));
        $data = $check->fetch();
        $row = $check->rowCount();

        $email = strtolower($email);

        if ($row == 0){
            if(strlen($nickname) <= 32){
                if(strlen($email) <= 32){
                    if(filter_var($email, FILTER_VALIDATE_EMAIL)){
                        if ($password == $password_retype){

                            $cost = ['cost' => 12];
                            $password = hash('sha256', $password);

                            $ip = $_SERVER['REMOTE_ADDR'];
                            
                            echo "toto";

                            $insert = $bdd->prepare('INSERT INTO jeanstore_users(nickname, email, password, billing_adress, postal, country, phone) VALUES(:nickname, :email, :password, :billing_adress, :postal, :country, :phone)');
                            $insert-> execute(array(
                                'nickname' => $nickname,
                                'email' => $email,
                                'password' => $password,
                                'billing_adress' => $billing_adress,
                                'adress' => $adress,
                                'postal' => $postal,
                                'country' => $country,
                                'phone' => $phone
                            ));
                            //Inscription complété avec succès
                            header('Location:inscription.php?reg_err=success'); die();
                        }
                    } else {header('Location: inscription.php?reg_err=email'); die();}
                } else {header('Location: inscription.php?reg_err=email_length'); die();}
            } else {header('Location: inscription.php?reg_err=nick_length'); die();}
        } else {header('Location: inscription.php?reg_err=already'); die();}
    }
?>