<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Document</title>
    <style>
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
    background-color: #f0fff0; /* Light gray background */
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
                <li><a href="shop.php">shop</a></li>
                <li><a href="blog.php">blog</a></li>
                <!-- <li><a href="viewcart.php"><i class="ffa-sharp fa-regular fa-cart-shopping"></i> cart</a></li> -->
                
                <li class="button-33"><a href="cart.php"><i class="fa-solid fa-cart-shopping"></i></a></li>

            </ul>
        </div>

    </section>

    <div class="bg-danger  font-monopace h-100" >
        <ul class="list-unstyled d-flex justify-content-center ">
            <li><a href="shop.php" class="text-decoration-none text-white fw-bold fs-4 px-5">Home</a></li>
            <li><a href="fashion.php" class="text-decoration-none text-white fw-bold fs-4 px-5">Fashion</a></li>
            <li><a href="beauty.php" class="text-decoration-none text-white fw-bold fs-4 px-5">Beauty</a></li>
            
        </ul>
    </div>


    

          
    <h1 class="text-warning font-monospace text-center my-3">Home</h1>
<?php
include'login/config.php';
// Query to fetch products from the database
$sql = "SELECT * FROM products where category = 'home' "; 
$result = $con->query($sql);

?>
 <div class="row row-cols-1 row-cols-md-4 mx-3">
    <?php
    // Display products in card format
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
    ?>
        <div class="col mb-4 justify-content-center">
            <!-- Example product card -->
            <a href="productview.php?id=<?php echo $row['product_id']; ?>" class="card-link">
                <div class="card h-100 product-card"> <!-- Add product-card class -->
                    <img src="<?php echo $row['image']; ?>" class="card-img-top" height="250" alt="Product Image"> </a>
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $row['name']; ?></h5>
                        <p class="card-text"><?php echo $row['description']; ?></p>
                        <p class="card-text">Rs <?php echo $row['price']; ?></p>
                        <a  href="cart.php?id=<?php echo $row['product_id']; ?>" class="btn btn-warning ">Add to Cart</a>
                    </div>
                </div>
            
        </div>
    <?php
        }
    } else {
        echo "No products found";
    }
    $con->close();
    ?>
</div>
</body>
</html>