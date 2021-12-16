<!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">

            <!-- bootstrap -->
            <link href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" rel="stylesheet" />
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

            <title>Inscription</title>
        </head>
        <body>
        <div class="login-form">
            <?php 
                if(isset($_GET['reg_err']))
                {
                    $err = htmlspecialchars($_GET['reg_err']);

                    switch($err)
                    {

                        // Inscription complété avec succès

                        case 'success':
                        ?>
                            <div class="alert alert-success">
                                <strong>Success</strong> Registered successfully!
                            </div>
                        <?php
                        break;

                        // Erreur MDP

                        case 'password':
                        ?>
                            <div class="alert alert-error">
                                <strong>Error</strong> Password does not match
                            </div>
                        <?php
                        break;

                        // Critères invalides

                        case 'email':
                        ?>
                            <div class="alert alert-danger">
                                <strong>Error</strong> Email is unvalid
                            </div>
                        <?php
                        break;
                        case 'postal':
                        ?>
                            <div class="alert alert-danger">
                                <strong>Error</strong> Postal code is unvalid
                            </div>
                        <?php
                        break;
                        case 'phone':
                        ?>
                            <div class="alert alert-danger">
                                <strong>Error</strong> Phone number is unvalid
                            </div>
                        <?php
                        break;

                        // Limite de caractères

                        case 'email_length':
                        ?>
                            <div class="alert alert-danger">
                                <strong>Error</strong> Email is too long
                            </div>
                        <?php 
                        break;
                        case 'nick_length':
                        ?>
                            <div class="alert alert-danger">
                                <strong>Error</strong> Nickname is too long
                            </div>
                        <?php 
                        case 'postal_length':
                            ?>
                            <div class="alert alert-danger">
                                <strong>Error</strong> Postal code is too long
                            </div>
                        <?php 
                        case 'phone_length':
                            ?>
                            <div class="alert alert-danger">
                                <strong>Error</strong> Phone number is too long
                            </div>
                        <?php 

                        // Utilisateur déjà inscrit

                        case 'already':
                            ?>
                            <div class="alert alert-danger">
                                <strong>Error</strong> User already registered
                            </div>
                        <?php 

                    }
                }
                ?>
            
            <form action="inscription_traitement.php" method="post">
                <h2 class="text-center">Inscription</h2>       
                <div class="form-group">
                    <input type="text" name="nickname" class="form-control" placeholder="Nickname" required="required" autocomplete="off">
                </div>
                <div class="form-group">
                    <input type="email" name="email" class="form-control" placeholder="Email" required="required" autocomplete="off">
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="Password" required="required" autocomplete="off">
                </div>
                <div class="form-group">
                    <input type="password" name="password_retype" class="form-control" placeholder="Retype password" required="required" autocomplete="off">
                </div>
                <div class="form-group">
                    <input type="text" name="billing_adress" class="form-control" placeholder="Billing Adress (Optional)" autocomplete="off">
                </div>
                <div class="form-group">
                    <input type="text" name="adress" class="form-control" placeholder="Adress" required="required" autocomplete="off">
                </div>
                <div class="form-group">
                    <input type="text" name="postal" class="form-control" placeholder="Postal" required="required" autocomplete="off">
                </div>
                <div class="form-group">
                    <input type="text" name="country" class="form-control" placeholder="Country" required="required" autocomplete="off">
                </div>
                <div class="form-group">
                    <input type="text" name="phone" class="form-control" placeholder="Phone" required="required" autocomplete="off">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">Inscription</button>
                </div>   
            </form>
        </div>
        <style>
            .login-form {
                width: 340px;
                margin: 50px auto;
            }
            .login-form form {
                margin-bottom: 15px;
                background: #f7f7f7;
                box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
                padding: 30px;
            }
            .login-form h2 {
                margin: 0 0 15px;
            }
            .form-control, .btn {
                min-height: 38px;
                border-radius: 2px;
            }
            .btn {        
                font-size: 15px;
                font-weight: bold;
            }
        </style>
        </body>
</html>