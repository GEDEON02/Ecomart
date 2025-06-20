<?php
include_once 'login/config.php';

if(isset($_GET['id'])) {
    $id = mysqli_real_escape_string($con, $_GET['id']);
    
   $sql = "SELECT * FROM products WHERE product_id = $id";
    $result = mysqli_query($con, $sql);
    $product = mysqli_fetch_assoc($result);

    $category = $product['category'];
    $similarProductsSql = "SELECT * FROM products WHERE category = '$category' AND product_id != $id LIMIT 4";
    $similarProductsResult = mysqli_query($con, $similarProductsSql);
    $similarProducts = mysqli_fetch_all($similarProductsResult, MYSQLI_ASSOC);
} else {
    header("Location: login/welcome.php");
    exit();
}

mysqli_close($con);
?>
 <?php
 session_start();

if (!isset($_SESSION["id"])) {
    header("Location: productview.php");
    exit();
}

include_once 'config.php';


if ($con->connect_error) {
    die("Connection failed: " . $con);
}

// Query to fetch products from the database
$sql = "SELECT * FROM products LIMIT 4"; 
$result = $con->query($sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $product['name']; ?> - Product Detail</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
    font-family: Arial, sans-serif;
    background-color: #f8f9fa; 
    
}
        
        .container {
            max-width: 800px;
            margin: auto;
        }

        .product-img {
            max-width: 100%;
            height: auto;
        }

        .product-info {
            margin-top: 20px;
        }

        .product-info h2 {
            color: #333;
        }

        .product-info p {
            color: #555;
        }

        .similar-products {
            margin-top: 40px;
        }

        .similar-products h3 {
            margin-bottom: 20px;
            color: #333;
        }

        
        .similar-product {
    border: 2px solid #ddd; 
    border-radius: 5px;
    padding: 10px;
    margin-bottom: 20px;
    margin-right: 10px; 
    background-color: #fff;
}


        .similar-product img {
            max-width: 100%;
            height: auto;
            margin-bottom: 10px;
        }

        .similar-product h4 {
            color: #333;
        }

        .similar-product p {
            color: #555;
        }
        /* Navbar CSS */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Spartan', sans-serif;
        }

        #header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 20px 80px;
            background-color: #E3E6F3;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.06);
        }

        #navbar {
            display: flex;
            align-items: center;
            justify-content: center;

        }

        #navbar li {
            list-style: none;
            padding: 0 20px;
        }

        #navbar li a {
            text-decoration: none;
            font-size: 15px;
            font-weight: 600;
            font-family: 'spartan ', sans-serif;
            color: #1a1a1a;
            transition: 0.03s ease;
        }

        #navbar li a:hover {
            color: #088178;
        }
        body {
    background-color: #f0fff0; 
}

    </style>
</head>
<body>
<section id="header">
        <a href="index.html"><img src="img/logo1.png" alt="" style="
        height: 41px;
        width: 124px; "></a></li>
        <div>
            <ul id="navbar">
                <li><a href="home.php">Home</a></li>
                <li><a href="../user/home.php">shop</a></li>
                <li><a href="cart.php">cart</a></li>
                <li><a href="myorder.php">My order</a></li>
                <li><a href="blog.php">blog</a></li>
                <li><a href="aboutus.php">about us </a></li>
                <li><a href="login/logout.php">Logout</a></li>

            </ul>
        </div>

    </section>
    </section>
    <br><br>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <img src="<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>" class="product-img">
            </div>
            <div class="col-md-6 product-info">
                <h2><?php echo $product['name']; ?></h2>
                <p><strong>Price:</strong> Rs <?php echo $product['price']; ?></p>
                <p><strong>Description:</strong> <?php echo $product['description']; ?></p>
                <a  href="cart.php?id=<?php echo $product['product_id']; ?>" class="btn btn-warning ">Add to Cart</a>
                    </div>
        </div>

        <div class="similar-products">
    <h3>Similar Products</h3>
    <div class="row">
        <?php foreach ($similarProducts as $similarProduct): ?>
            <div class="col-md-3 similar-product">
                <img src="<?php echo $similarProduct['image']; ?>" alt="<?php echo $similarProduct['name']; ?>">
                <h4><?php echo $similarProduct['name']; ?></h4>
                <p>Price: Rs <?php echo $similarProduct['price']; ?></p>
                <a href="cart.php?id=<?php echo $similarProduct['product_id']; ?>" class="btn btn-warning">Add to Cart</a>
            </div>
        <?php endforeach; ?>
    </div>
</div>

        </div>
    </div>
</body>
</html>
