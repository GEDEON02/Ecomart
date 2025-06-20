<?php
session_start();
if (!isset($_SESSION["id"])) {
    header("Location: login.php");
    exit(); 
}


require_once 'config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Orders</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .order-card {
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 15px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .order-card h5 {
            margin-bottom: 10px;
        }
        .order-card .btn-group {
            margin-top: 10px;
        }
        body {
    background-color: #f0fff0; 
}
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
            color: green;
        }
        body {
    background-color: #f0fff0; /* Light gray background */
}
#navbar a {
    color: black; /* Default color */
    text-decoration: none; /* Remove underline */
    transition: color 0.3s; /* Smooth color transition */
}

#navbar a:hover {
    color: green; /* Color on hover */
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
        <a class="nav-link active" aria-current="page" href="home.php">Home</a>
        <a class="nav-link" href="cart.php">MyCart</a>
        <a class="nav-link" a href="shop.php">shop</a>
        <a class="nav-link" href="myorder.php">MyOrder</a>
        <a class="nav-link" href="aboutus.php">About us </a>

            </ul>
        </div>

    </section>

    <div class="container">
        <h1 class="my-4">My Orders</h1>
        <?php
        // Retrieve user ID
        $user_id = $_SESSION["id"];

        // Fetch orders for the logged-in user
        $sql_orders = "SELECT * FROM orders WHERE user_id = ?";
        $stmt_orders = $con->prepare($sql_orders);
        $stmt_orders->bind_param("i", $user_id);
        $stmt_orders->execute();
        $result_orders = $stmt_orders->get_result();

        // Check if there are any orders
        if ($result_orders->num_rows > 0) {
    
    while ($row_order = $result_orders->fetch_assoc()) {
        ?>
        <div class="card mb-3 order-card">
            <div class="card-body">
                <h5 class="card-title">Order ID: <?php echo $row_order['order_id']; ?></h5>
                <p class="card-text"><strong>Order Date:</strong> <?php echo $row_order['order_date']; ?></p>
                <p class="card-text"><strong>Shipping Address:</strong> <?php echo $row_order['shipping_address']; ?></p>
                <p class="card-text"><strong>Total Amount: </strong> <?php echo "Rs " . $row_order['total_amount']; ?></p>
                <p class="card-text"><strong>Status: </strong> <?php echo ($row_order['status'] == 'canceled') ? 'Canceled' : 'Active'; ?></p>
                <h6 class="card-subtitle mb-2 text-muted">Order Items:</h6>
                <ul class="list-group list-group-flush">
                    <?php
                    // Fetch order items for the current order
                    $order_id = $row_order['order_id'];
                    $sql_order_items = "SELECT * FROM order_items WHERE order_id = ?";
                    $stmt_order_items = $con->prepare($sql_order_items);
                    $stmt_order_items->bind_param("i", $order_id);
                    $stmt_order_items->execute();
                    $result_order_items = $stmt_order_items->get_result();

                    
                    if ($result_order_items->num_rows > 0) {
                        // Loop through each order item
                        while ($row_order_item = $result_order_items->fetch_assoc()) {
                            $product_id = $row_order_item['product_id'];
                            $quantity = $row_order_item['quantity'];

                            // Fetch product details
                            $sql_product = "SELECT name, price FROM products WHERE product_id = ?";
                            $stmt_product = $con->prepare($sql_product);
                            $stmt_product->bind_param("i", $product_id);
                            $stmt_product->execute();
                            $result_product = $stmt_product->get_result();

                            if ($result_product->num_rows > 0) {
                                $row_product = $result_product->fetch_assoc();
                                $product_name = $row_product['name'];
                                $product_price = $row_product['price'];

                                // Display order item
                                echo "<li class='list-group-item'>$quantity x $product_name = Rs $product_price</li>";
                            }
                        }
                    } else {
                        echo "<li class='list-group-item'>No order items found.</li>";
                    }

                    $stmt_order_items->close();
                    ?>
                </ul>
                <div class="btn-group" role="group" aria-label="Order Actions">
                    <a href="detail.php?order_id=<?php echo $row_order['order_id']; ?>" class="btn btn-primary">Details</a>
                    <?php
                    // Check if the order is not canceled
                    if ($row_order['status'] != 'canceled') {
                      
                        $order_date = strtotime($row_order['order_date']);
                        $current_date = time();
                        $time_difference = $current_date - $order_date;
                        $hours_difference = round($time_difference / (60 * 60));

                        // Show cancel button if the order is less than 48 hours old
                        if ($hours_difference < 48) {
                            ?>
                            <a href="cancel.php?order_id=<?php echo $row_order['order_id']; ?>" class="btn btn-danger">Cancel Order</a>
                            <?php
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
        <?php
    }
}  else {
            echo "<p>No orders found.</p>";
        }

        $stmt_orders->close();
        ?>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
