<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION["id"])) {
    header("Location: login.php");
    exit();
}

include_once 'config.php';
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

// Check if cart_id is provided in the GET request
if (isset($_GET['id'])) {
    $cart_id = $_GET['id'];
    
    // Delete item from the cart
    $sql_delete = "DELETE FROM cart WHERE cart_id = ?";
    $stmt_delete = $con->prepare($sql_delete);
    $stmt_delete->bind_param("i", $cart_id);
    $stmt_delete->execute();
    $stmt_delete->close();

    header("Location: cart.php");
    exit();
} else {
    echo "Cart ID is missing.";
}
?>
