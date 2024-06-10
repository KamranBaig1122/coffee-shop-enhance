<?php
require '../configuration/db-config.php';


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['User_id'])) {
    $order_id = $_POST['User_id'];
    
    $delete_query = "DELETE FROM `users` WHERE user_id = ?";
    $stmt = $conn->prepare($delete_query);
    $stmt->bind_param("i", $order_id);
    
    if ($stmt->execute()) {
        echo "User deleted successfully.<br>";
        header("Location: ../admin/user.php?deletion=success");
        } else {
            echo "Error deleting order: " . $stmt->error . "<br>";
            header("Location: ../admin/user.php?deletion=error");
    }
    
    $stmt->close();
}

$conn->close();
?>
