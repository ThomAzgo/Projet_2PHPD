<!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">

            <!-- bootstrap -->
            <link href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" rel="stylesheet" />
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

            <title>Log in</title>
        </head>
    <body>
        <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
            <a href="../index.php" class="navbar-brand">JeansStore</a>

            <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarMenu">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarMenu">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="index.php" class="nav-link">Login</a>
                    </li>
                    <li class="nav-item">
                        <a href="../cart/index.php" class="nav-link">Products</a>
                    </li>
                    <li class="nav-item">
                        <a href="../cart/cart.php" class="nav-link">Cart</a>
                    </li>
                </ul>
            </div>
        </nav>

        <div class="login-form">
            <?php 
                if(isset($_GET['reg_err']))
                {
                    $err = htmlspecialchars($_GET['reg_err']);

                    switch($err)
                    {
                        case 'success':
                        ?>
                            <div class="alert alert-success">
                                <strong>Success</strong> Registered successfully
                            </div>
                        <?php
                        break;
                        case 'password':
                        ?>
                            <div class="alert alert-danger">
                                <strong>Error</strong> Password does not match
                            </div>
                        <?php
                        break;
                        case 'email':
                        ?>
                            <div class="alert alert-danger">
                                <strong>Error</strong> Email is unvalid
                            </div>
                        <?php
                        break;
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
                        break;
                        case 'already':
                            ?>
                            <div class="alert alert-danger">
                                <strong>Error</strong> User already registered
                            </div>
                        <?php 
                    }
                } ?>
        
            <form action="traitement.php" method="post">
                <h2 class="text-center">Sign Up</h2>       
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
                    <button type="submit" class="btn btn-primary btn-block">Confirm</button>
                </div>
            </form>
            <p class="text-center"><a href="index.php">already signed up? Login here</a></p>

        </div>
    </body>
</html>

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