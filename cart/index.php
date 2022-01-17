<?php
session_start();
$product_id = array();
// $id = (int) $_POST['id'];

//Verifie si un panier existe
if(filter_input(INPUT_POST, 'add_to_cart')){
    if(isset($_SESSION['shopping_cart'])){

        //compte le nombre de produits dans le panier
        $count = count($_SESSION['shopping_cart']);

        //créer une seconde array qui fait correspondre les "key" aux "id" des produits
        $product_id = array_column($_SESSION['shopping_cart'], 'id');

        if(!in_array(filter_input(INPUT_GET, 'id'), $product_id)){
            $_SESSION['shopping_cart'][$count] = array
            (
                'id' => filter_input(INPUT_GET, 'id'),
                'name' => filter_input(INPUT_POST, 'name'),
                'price' => filter_input(INPUT_POST, 'price'),
                'quantity' => filter_input(INPUT_POST, 'quantity')
            );
        }
        else { //les produits déjà existant font augmenter la quantité du panier
            //fait correspondre les "key" aux "id" de l'article ajouté au panier
            for ($i = 0; $i < count($product_id); $i++) {
                if ($product_id[$i] == filter_input(INPUT_GET, 'id')){
                    //ajoute la quantité d'articles existante dans l'array
                    $_SESSION['shopping_cart'][$i]['quantity'] += filter_input(INPUT_POST, 'quantity');
                }
            }
        }

    }
    else { //si il n'existe pas, création d'une nouvelle array avec "key 0"
        $_SESSION['shopping_cart'][0] = array
        (
            'id' => filter_input(INPUT_GET, 'id'),
            'name' => filter_input(INPUT_POST, 'name'),
            'price' => filter_input(INPUT_POST, 'price'),
            'quantity' => filter_input(INPUT_POST, 'quantity')
        );
    }
}

if(filter_input(INPUT_GET, 'action') == 'delete'){
    //fait une boucle de tout les arcticles du panier jusqu'à ce qu'il correspond avec la variable "GET id"
    foreach($_SESSION['shopping_cart'] as $key => $product){
        if ($product['id'] == filter_input(INPUT_GET, 'id')){
            //efface le produit souhaité quand il correspond avec "GET id"
            unset($_SESSION['shopping_cart'][$key]);
        }
    }
    $_SESSION['shopping_cart'] = array_values($_SESSION['shopping_cart']);
}
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
                    <a href="index.php" class="nav-link">Shop</a>
                </li>
            </ul>
        </div>
    </nav>
    <?php
        require_once 'config.php';

        $query = 'SELECT * FROM jeanstore_products ORDER by id ASC';
        $result = $bdd->query($query);

    if($result):
        foreach($result as $product) {
        ?>
        <div class="container">
            <div class="container">
                <form method="post" action="index.php?action=add&id=<?php echo $product['id'] ?>">
                <div class="products">
                    <img src="<?php echo $product['image'];?>" class="img-responsive" />
                    <h4 class="text-info"><?php echo $product['name']; ?></h4>
                    <h4><?php echo $product['price'];?> € </h4>
                    <input type="text" name="quantity" class="form-control" value="1" />
                    <input type="hidden" name="name" value="<?php echo $product['name']; ?>" />
                    <input type="hidden" name="price" value="<?php echo $product['price']; ?>" />
                    <input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-info" value="Add to Cart" />
                </div>
            </div>
        </div>
        <?php
        }
    endif;
        ?>
    <div style="clear:both"></div>
    <br/>
    <div class="table-responsive">
        <table class="table"> 
            <tr><th colspan="5"><h3>Order Details</h3></th></tr>
            <tr>
                <th width="40%">Product Name</th>
                <th width="10%">Quantity</th>
                <th width="20%">Price</th>
                <th width="15%">Total</th>
                <th width="5%">Action</th>
            </tr>
            <?php
            if(!empty($_SESSION['shopping_cart'])):
                    $total = 0;

                    foreach($_SESSION['shopping_cart'] as $key => $product):
                ?>
                    <tr>
                        <td><?php echo $product['name'] ?></td>
                        <td><?php echo $product['quantity'] ?></td>
                        <td><?php echo $product['price'] ?> €</td>
                        <td><?php echo number_format($product['quantity'] * $product['price'], 2); ?> €</td>
                        <td>
                            <form method="POST">
                                <input type="hidden" name="_METHOD" value="DELETE">
                                <input type="hidden" name="id" value="<?php (int) $_POST['id']; ?>">
                                <button type="submit" class="alert alert-danger">Remove</button>
                            </form>
                        </td>
                    </tr>
                <?php //calcul prix total
                        $total = $total + ($product['quantity'] * $product['price']);
                    endforeach;
                ?>
                <tr>
                    <td colspan="5">
                    <?php
                        if (isset($_SESSION['shopping_cart'])):
                        if (count($_SESSION['shopping_cart'] > 0)):
                    ?>
                        <a href="#" class="button">Checkout</a>
                    <?php endif; endif; endif; ?>
                    </td>
            </tr>
        </table>
    </div>
</body>
</html>

<style>
    .products{
    background-color: #f1f1f1;
    border-radius: 5px;
    padding: 16px;
    margin-bottom: 20px;
    }
</style>