<?php
require '../configuration/db-config.php';


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['order_id'])) {
    $order_id = $_POST['order_id'];
    
    $delete_query = "DELETE FROM `order` WHERE orderID = ?";
    $stmt = $conn->prepare($delete_query);
    $stmt->bind_param("i", $order_id);
    
    if ($stmt->execute()) {
        echo "Order deleted successfully.<br>";
        header("Location: ../admin/accounts.php?deletion=success");
        } else {
            echo "Error deleting order: " . $stmt->error . "<br>";
            header("Location: ../admin/accounts.php?deletion=error");
    }
    
    $stmt->close();
}

$conn->close();
?>
