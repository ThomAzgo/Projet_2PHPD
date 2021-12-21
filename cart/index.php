<?php
    require_once 'config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Browse</title>

    <!-- Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

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
                    <a href="../auth/index.php" class="nav-link">Login</a>
                </li>
                <li class="nav-item">
                    <a href="index.php" class="nav-link">Products</a>
                </li>
                <li class="nav-item">
                    <a href="cart.php" class="nav-link">Cart</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <div class="col-sm-4 col-md-3">
            <form method="post" action="index.php?action=add&id=<?php echo $jeanstore_products['id'] ?>">
            <div class="products">
                <img src="<?php echo $product['image'];?>" class="img-responsive" />
                <h4 class="text-info"><?php echo $product['name']; ?></h4>
                <h4><?php echo $product['price'];?> € </h4>
                <input type="text" name="quantity" class="form-control" value="1" />
                <input type="hidden" name="name" value="<?php echo $product['name']; ?>" />
                <input type="hidden" name="price" value="<?php echo $product['price']; ?>" />
                <input type="submit" name="add_to_cart" class="btn btn-info" value="Add to Cart" />
            </div>
        </div>
    </div>
</body>
</html>