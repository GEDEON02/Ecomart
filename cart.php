<?php
session_start();
if (!isset($_SESSION["id"])){
    header("Location: login/login.php");
    exit();
}

// Include database connection file
include_once 'config.php';

// Retrieve user ID
$user_id = $_SESSION["id"];

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

// Check if product ID is provided in the GET request
if (isset($_GET['id'])) {
    $product_id = $_GET['id'];
    
    // Get user ID from session
    $user_id = $_SESSION["id"];

    // Check if the product already exists in the cart for this user
    $sql_check_product = "SELECT * FROM cart WHERE user_id = ? AND product_id = ?";
    $stmt_check_product = $con->prepare($sql_check_product);
    $stmt_check_product->bind_param("ii", $user_id, $product_id);
    $stmt_check_product->execute();
    $result_check_product = $stmt_check_product->get_result();

    if ($result_check_product->num_rows > 0) {
        // If the product already exists, update its quantity
        $row = $result_check_product->fetch_assoc();
        $quantity = $row['quantity'] + 1;
        $cart_id = $row['cart_id'];
        $sql_update_quantity = "UPDATE cart SET quantity = ? WHERE cart_id = ?";
        $stmt_update_quantity = $con->prepare($sql_update_quantity);
        $stmt_update_quantity->bind_param("ii", $quantity, $cart_id);
        $stmt_update_quantity->execute();
        $stmt_update_quantity->close();
    } else {
        // If the product does not exist, insert it into the cart
        $sql_insert = "INSERT INTO cart (user_id, product_id, quantity) VALUES (?, ?, 1)";
        $stmt_insert = $con->prepare($sql_insert);
        $stmt_insert->bind_param("ii", $user_id, $product_id);
        $stmt_insert->execute();
        $stmt_insert->close();
    }

    // Redirect user back to the previous page or any desired page
    header("Location:cart.php");
    exit();
}

// Fetch cart items for the logged-in user where status is 'not-buyed'
$sql_cart = "SELECT cart.cart_id, products.image, products.name, products.description, products.price, cart.quantity FROM cart JOIN products ON cart.product_id = products.product_id WHERE cart.user_id = ? ";

$stmt_cart = $con->prepare($sql_cart);
$stmt_cart->bind_param("i", $user_id);
$stmt_cart->execute();
$result_cart = $stmt_cart->get_result();

// Close statement
$stmt_cart->close();
?>



<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>View Cart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<style>
.increase-btn,
.decrease-btn,
.remove-btn {
    border-radius: 15%;
    width: 30px;
    height: 30px; /* Adjust the height to half of the remove button */
    padding: 0;
    font-size: 14px;
    line-height: 0; /* Ensure no extra space is added inside the button */
}
    .table {
        width: 100%;
        border-collapse: collapse;
        border-spacing: 0;
    }
    
    .table th,
    .table td {
        padding: 8px;
        text-align: center;
        border: 1px solid #ddd;
    }
    
    .table th {
        background-color: #f2f2f2;
    }
    
    .table tbody tr:hover {
        background-color: #f5f5f5;
    }
    
    .table tfoot td {
        font-weight: bold;
    }
    
    .btn-proceed {
        background-color: #28a745;
        color: #fff;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        text-decoration: none;
        transition: background-color 0.3s ease;
    }
    
    .btn-proceed:hover {
        background-color: #218838;
    }
    /* CSS for product cards */
.productFetch .card {
    transition: transform 0.3s ease;
    margin-bottom: 20px;
}

.productFetch .card:hover {
    transform: translateY(-5px);
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.productFetch .card-body {
    padding: 20px;
}

.productFetch .card-title {
    font-weight: bold;
    font-size: 1.25rem;
}

.productFetch .card-text {
    font-size: 1rem;
}

.productFetch .btn {
    margin-top: 10px;
}

.productFetch .btn:hover {
    opacity: 0.8;
}
/* CSS for product cards */
.productFetch .row {
    display: flex;
    flex-wrap: wrap;
}

.productFetch .col-md-4 {
    flex: 0 0 calc(33.33% - 20px); /* Adjust the width as needed */
    max-width: calc(33.33% - 20px); /* Adjust the width as needed */
    margin: 0 10px 20px 0; /* Adjust the margin as needed */
}

.productFetch .card {
    transition: transform 0.3s ease;
}

.productFetch .card:hover {
    transform: translateY(-5px);
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.productFetch .card-body {
    padding: 20px;
}

.productFetch .card-title {
    font-weight: bold;
    font-size: 1.25rem;
}

.productFetch .card-text {
    font-size: 1rem;
}

.productFetch .btn {
    margin-top: 10px;
}

.productFetch .btn:hover {
    opacity: 0.8;
}

/* Header Section Styles */
#header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 20px 40px;
    background-color: #E3E6F3;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

#navbar {
    display: flex;
    list-style-type: none;
    padding: 0px;
}

#navbar li {
    margin-right: 20px;
}

#navbar a {
    text-decoration: none;
    color: #333;
    font-weight: 600;
    transition: color 0.3s ease;
}

#navbar a:hover {
    color: #007bff;
}

/* Logo Styles */
#header img {
    width: 124px;
    height: 41px;
}

/* Nav Link Styles */
#navbar a {
    font-size: 15px;
    color: #333;
    transition: color 0.3s ease;
    margin-right: 70px;

}

#navbar a:hover {
    color: #088178;
}

    /* Additional CSS for card and page background */
body {
    background-color: #f8f9fa; /* Add your desired background color here */
}

.card {
    border: 2px solid #dee2e6; /* Adjust the border thickness and color as needed */
}

body {
 background-color: #f0fff0; /* Light gray background */
}


/* Card Styles */
.card {
  border: 1px solid #ddd; /* Light gray border */
  border-radius: 4px; /* Rounded corners */
  margin-bottom: 20px;
  transition: transform 0.3s ease; /* Smooth hover effect */
}


/* Card Body Styles */
.card-body {
  padding: 20px; /* Adjust padding as needed */
}

/* Card Title Styles */
.card-title {
  font-weight: bold;
  font-size: 1.25rem; /* Adjust font size as needed */
}

/* Card Text Styles */
.card-text {
  font-size: 1rem; /* Adjust font size as needed */
}

/* Button Styles */
.btn {
  margin-top: 10px; /* Adjust margin as needed */
}

.card-text {
    font-size: 18px; /* Adjust font size as needed */
    color: #666; /* Adjust text color as needed */
    margin-bottom: 5px; /* Adjust margin bottom as needed */
    transition: color 0.3s ease, opacity 0.3s ease; /* Add transition effect for color and opacity */
}

.card-text:hover {
    color: #333; /* Change text color on hover */
    opacity: 0.8; /* Reduce opacity on hover */
}

.btn-proceed {
    background-color: #28a745; /* Button background color */
    color: #fff; /* Button text color */
    border: none; /* Remove button border */
    padding: 10px 20px; /* Add padding to the button */
    border-radius: 5px; /* Add border radius */
    text-decoration: none; /* Remove default link underline */
    transition: background-color 0.3s ease; /* Add transition effect for background color */
}

.btn-proceed:hover {
    background-color: #218838; /* Change background color on hover */
    color: #fff; /* Change text color on hover */
}

.btn-proceed:focus {
    outline: none; /* Remove button outline on focus */
}

.btn-proceed:active {
    transform: translateY(1px); /* Add slight downward shift on button click */
}

   
</style>

</style>
<body>
<section id="header">
        <a href="index.html"><img src="img/logo1.png" alt="" style="
        height: 41px;
        width: 124px; "></a></li>
        <div>
            <ul id="navbar">
        <a class="nav-link active" aria-current="page" href="home.php">Home</a>
        <a class="nav-link" a href="shop.php">shop</a>
        <a class="nav-link" href="cart.php">MyCart</a>
        <a class="nav-link" href="myorder.php">MyOrder</a>
        <a class="nav-link" href="aboutus.php">About us </a>
        <a class="nav-link" href="help.php">Help</a>

            </ul>
        </div>

    </section>
    
<!-- <div class="productFetch"> 
 -->

<div class="container my-3">
<div class="row">
    <?php
    // Check if cart is not empty
    if ($result_cart->num_rows > 0) {
        $sr_no = 1;
        $total_quantity = 0;
        $total_amount = 0;
        while($row = $result_cart->fetch_assoc()) {
            // Increment total quantity
            $total_quantity += $row['quantity'];
            
            // Calculate total amount for this product and add it to the total amount
            $product_total = $row['price'] * $row['quantity'];
            $total_amount += $product_total;
            $_SESSION['amount'] = $total_amount;
            ?>
            <!-- Individual product card -->
            <div class="col-md-4 mb-4">
                <div class="card">
                <img src="<?php echo $row['image']; ?>" class="card-img-top" height="250" alt="Product Image">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $row['name']; ?></h5>
                        <p class="card-text"><?php echo $row['description']; ?></p>
                        <p class="card-text">Quantity: <?php echo $row['quantity']; ?></p>
                        <p class="card-text">Price: Rs<?php echo $row['price']; ?></p>
                        <!-- <p class="card-text">Total Amount: Rs<?php echo $product_total; ?></p> -->
                        <p class="card-text total-price">Total Amount: <?php echo "&#8377;"; ?><?php echo $product_total; ?></p>


                        <!-- Increase Quantity Button -->
                        <a href="update_quantity.php?id=<?php echo $row['cart_id']; ?>&action=increase" class="btn btn-success mr-2">
                            <i class="fas fa-plus">+</i>
                        </a>
                        
                        <!-- Decrease Quantity Button -->
                        <a href="update_quantity.php?id=<?php echo $row['cart_id']; ?>&action=decrease" class="btn btn-warning <?php echo ($row['quantity'] <= 1) ? 'disabled' : ''; ?>">
                            <i class="fas fa-minus">-</i>
                        </a>
                        
                        <!-- Remove from Cart Button -->
                        <a href="removecart.php?id=<?php echo $row['cart_id']; ?>" class="btn btn-danger ml-2">Remove from Cart</a>
                    </div>
                </div>
            </div>
            <?php
            // Increment SR number for the next row in the grand total table
            $sr_no++;
        }
    } else {
        // Handle case where cart is empty
        echo "<p>Your cart is empty.</p>";
    }
    ?>
</div>
</div>

<!-- Grand total table -->
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Grand Total</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>SR No.</th>
                            <th>Product Name</th>
                            <th>Quantity</th>
                            <th>Price Per Quantity</th>
                            <th>Total Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Reset SR number for the grand total table
                        $sr_no = 1;
                        // Loop through each product in the cart again to display them in the grand total table
                        $result_cart->data_seek(0); // Reset the result set pointer
                        while($row = $result_cart->fetch_assoc()) {
                            ?>
                            <tr>
                                <td><?php echo $sr_no++; ?></td>
                                <td><?php echo $row['name']; ?></td>
                                <td><?php echo $row['quantity']; ?></td>
                                <td><?php echo "&#8377;"; ?><?php echo $row['price']; ?></td>
                                <td><?php echo "&#8377;"; ?><?php echo $row['price'] * $row['quantity']; ?></td>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="2"><b>Total:</b></td>
                            <td><?php echo $total_quantity; ?></td>
                            <td>-</td>
                            <td><b><?php echo "&#8377;"; ?><?php echo $total_amount; ?><b></td>
                        </tr>
                    </tfoot>
                </table>
            </div> 
        </div>
            <!-- <a class="btn btn-success me-md-2 mb-1" href="proceed.php" type="button">Proceed to buy</a> -->
            <a class="btn btn-success me-md-2 mb-1 btn-proceed" href="proceed.php" type="button">Proceed to buy</a>

    </div>
</div>
<!-- Include jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- AJAX Script -->
<!-- <script>
$(document).ready(function(){
    // Increase Quantity Button Click Handler
    $(".increase-btn").click(function(e){
        e.preventDefault();
        var cartId = $(this).data('cart-id');
        $.ajax({
            url: 'update_quantity.php',
            type: 'GET',
            data: { id: cartId, action: 'increase' },
            success: function(response) {
                location.reload(); // Refresh page after successful update
            }
        });
    });

    // Decrease Quantity Button Click Handler
    $(".decrease-btn").click(function(e){
        e.preventDefault();
        var cartId = $(this).data('cart-id');
        $.ajax({
            url: 'update_quantity.php',
            type: 'GET',
            data: { id: cartId, action: 'decrease' },
            success: function(response) {
                location.reload(); // Refresh page after successful update
            }
        });
    });

    // Remove from Cart Button Click Handler
    $(".remove-btn").click(function(e){
        e.preventDefault();
        var cartId = $(this).data('cart-id');
        $.ajax({
            url: 'removecart.php',
            type: 'GET',
            data: { id: cartId },
            success: function(response) {
                location.reload(); // Refresh page after successful removal
            }
        });
    });
});
</script> -->

<!-- Inside the PHP while loop for displaying cart items -->
<!-- Increase Quantity Button -->
<!-- <button class="btn btn-success increase-btn mr-2" data-cart-id="<?php echo $row['cart_id']; ?>">
    <i class="fas fa-plus"></i>
</button> -->
<!-- Decrease Quantity Button -->
<!-- <button class="btn btn-warning decrease-btn <?php echo ($row['quantity'] <= 1) ? 'disabled' : ''; ?>" data-cart-id="<?php echo $row['cart_id']; ?>">
    <i class="fas fa-minus"></i>
</button> -->
<!-- Remove from Cart Button -->
<!-- <button class="btn btn-danger remove-btn ml-2" data-cart-id="<?php echo $row['cart_id']; ?>">Remove from Cart</button> -->
<!-- <a href="removecart.php?id=<?php echo $row['cart_id']; ?>" class="btn btn-danger ml-2">Remove from Cart</a> -->
</body>

</html>
