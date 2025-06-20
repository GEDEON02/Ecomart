<?php
session_start();
if (!isset($_SESSION["id"])) {
    header("Location: login.php");
    exit(); 
}

if (!isset($_GET['order_id'])) {
    echo "Order ID not provided.";
    exit();
}

require_once 'config.php';
$user_id = $_SESSION["id"];
$order_id = $_GET['order_id'];

$sql_order = "SELECT * FROM orders WHERE order_id = ? AND user_id = ?";
$stmt_order = $con->prepare($sql_order);
$stmt_order->bind_param("ii", $order_id, $user_id);
$stmt_order->execute();
$result_order = $stmt_order->get_result();

if ($result_order->num_rows > 0) {
    
    $sql_update_order = "UPDATE orders SET status = 'canceled' WHERE order_id = ?";
    $stmt_update_order = $con->prepare($sql_update_order);
    $stmt_update_order->bind_param("i", $order_id);

    if ($stmt_update_order->execute()) {
            echo "<script>alert('Order canceled successfully!');</script>";
            header("Location: myorder.php");
            exit();
        } 
     else {
        echo "Error updating order status: " . $con->error;
  }  }
 else {
    echo "Order not found.";
}

$stmt_order->close();
$stmt_update_order->close();
$stmt_delete_order_items->close();
$con->close();
?>
