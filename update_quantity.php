<?php
session_start();

if (!isset($_SESSION["id"])) {
     header("Location: login.php");
    exit();
}

if (isset($_GET['id']) && isset($_GET['action'])) {
    
    include_once 'config.php';

    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }

    $cart_id = $_GET['id'];
    $action = $_GET['action'];

    if ($action == 'increase') {
        $sql_update = "UPDATE cart SET quantity = quantity + 1 WHERE cart_id = ?";
    } elseif ($action == 'decrease') {
        $sql_update = "UPDATE cart SET quantity = GREATEST(quantity - 1, 1) WHERE cart_id = ?";
    } else {
        header("Location: cart.php");
        exit();
    }

    $stmt_update = $con->prepare($sql_update);
    $stmt_update->bind_param("i", $cart_id);
    $stmt_update->execute();
    $stmt_update->close();

    header("Location: cart.php");
    exit();
} else {
    echo "Cart ID or action is missing.";
}
?>
