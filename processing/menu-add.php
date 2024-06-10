<?php
$tableNumber = isset($_POST['tableNumber']) ? $_POST['tableNumber'] : '';
$orderData = isset($_POST['orderData']) ? $_POST['orderData'] : '';

$orderDataArray = json_decode($orderData, true);
echo "Order received for Table Number: " . $tableNumber . "<br>";

$conn = new mysqli("localhost", "root", "", "coffee");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

foreach ($orderDataArray as $orderItem) {
    $teaName = $orderItem['teaName'];
    $quantity = $orderItem['quantity'];
    $price = $orderItem['price'];
    $total = $orderItem['total'];

    $query = "INSERT INTO `order` (tableNo, name, price, quantity, total) 
              VALUES ('$tableNumber', '$teaName', '$price', '$quantity', '$total')";
    if ($conn->query($query) === TRUE) {
        echo "Order item inserted successfully.<br>";
    } else {
        echo "Failed to insert order item: " . $conn->error . "<br>";
    }
    echo "Tea Name: " . $teaName . "<br>";
    echo "Quantity: " . $quantity . "<br>";
    echo "Price: " . $price . "<br>";
    echo "Total: " . $total . "<br>";
}
$conn->close();
?>
