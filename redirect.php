<!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">

            <!-- bootstrap -->
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

            <title>JeansStore</title>
        </head>
        <body>
            <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
                <a href="index.php" class="navbar-brand">JeansStore</a>

                <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarMenu">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarMenu">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="auth/index.php" class="nav-link">Login</a>
                        </li>
                        <li class="nav-item">
                            <a href="cart/index.php" class="nav-link">Shop</a>
                        </li>
                    </ul>
                </div>
            </nav>

            <div class="text-white">
                <br>
                <h1 class="text-center display-5">Welcome back to JeansStore <?php echo $_SESSION['user']; ?></h1>
                <h2 class="text-center display-6">Browse our products and order now!<br>
                <a href="deconnexion.php" class="btn-danger btn-lg">Log Out</a></h2>      
            </div>

            <!-- bootstrap -->
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        </body>
</html>

<style>
    body{
        background : url("https://images.pexels.com/photos/325876/pexels-photo-325876.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260");
        background-repeat: no-repeat;
    }
</style>