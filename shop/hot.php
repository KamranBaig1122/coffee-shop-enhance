<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.html");
    exit();
}

$user_name = $_SESSION['user_name'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="../assets/fav.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/menu-main.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Montez&display=swap" rel="stylesheet" />
    <title>Coffee Shop | Order Hot Coffee</title>
</head>

<body>
    <div class="container">
        <div class="front">
            <h1 class="main_word">Order Anything You Want, <?php echo htmlspecialchars($user_name); ?>!</h1>
            <h1 style="margin-bottom: 0px;">HOT COFFEE</h1>
            <form id="order-form">
                <label for="table-number">Table Number:</label>
                <select name="tableNumber" id="table-number">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                </select>
                <table>
                    <thead>
                        <tr>
                            <th>Hot Coffee</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Latte</td>
                            <td>200</td>
                            <td>
                                <button class="plus" type="button" onclick="incrementQuantity(0)">+</button>
                                <h2 class="tab" style="display: inline;">0</h2>
                                <button class="minus" type="button" onclick="decrementQuantity(0)">-</button>
                            </td>
                            <td class="total">0</td>
                        </tr>
                        <tr>
                            <td>Americano</td>
                            <td>300</td>
                            <td>
                                <button class="plus" type="button" onclick="incrementQuantity(1)">+</button>
                                <h2 class="tab" style="display: inline;">0</h2>
                                <button class="minus" type="button" onclick="decrementQuantity(1)">-</button>
                            </td>
                            <td class="total">0</td>
                        </tr>
                        <tr>
                            <td>Expresso</td>
                            <td>550</td>
                            <td>
                                <button class="plus" type="button" onclick="incrementQuantity(2)">+</button>
                                <h2 class="tab" style="display: inline;">0</h2>
                                <button class="minus" type="button" onclick="decrementQuantity(2)">-</button>
                            </td>
                            <td class="total">0</td>
                        </tr>
                        <tr>
                            <td>Cappuccino</td>
                            <td>600</td>
                            <td>
                                <button class="plus" type="button" onclick="incrementQuantity(3)">+</button>
                                <h2 class="tab" style="display: inline;">0</h2>
                                <button class="minus" type="button" onclick="decrementQuantity(3)">-</button>
                            </td>
                            <td class="total">0</td>
                        </tr>
                        <tr>
                            <td>Mocha</td>
                            <td>500</td>
                            <td>
                                <button class="plus" type="button" onclick="incrementQuantity(4)">+</button>
                                <h2 class="tab" style="display: inline;">0</h2>
                                <button class="minus" type="button" onclick="decrementQuantity(4)">-</button>
                            </td>
                            <td class="total">0</td>
                        </tr>
                        <tr>
                            <td>Total</td>
                            <td></td>
                            <td></td>
                            <td id="grandTotal">0</td>
                        </tr>
                    </tbody>
                </table>
                <input type="hidden" id="orderDataInput" name="orderData" />
                <button type="button" onclick="prepareOrder();" class="order"><a href="order-done.php" style="text-decoration: none; color:black;">ORDER NOW</a></button>
            </form>
        </div>
    </div>
    <script>
        function updateGrandTotal() {
            var totalElements = document.getElementsByClassName("total");
            var grandTotal = 0;

            for (var i = 0; i < totalElements.length; i++) {
                var total = parseInt(totalElements[i].textContent);
                grandTotal += total;
            }

            var grandTotalElement = document.getElementById("grandTotal");
            grandTotalElement.textContent = grandTotal;
        }

        function incrementQuantity(index) {
            var quantityElement = document.getElementsByClassName("tab")[index];
            var totalElement = document.getElementsByClassName("total")[index];

            var quantity = parseInt(quantityElement.textContent);
            quantity++;
            quantityElement.textContent = quantity;

            var price = parseInt(quantityElement.parentNode.previousElementSibling.textContent);
            var total = quantity * price;
            totalElement.textContent = total;

            updateGrandTotal();
        }

        function decrementQuantity(index) {
            var quantityElement = document.getElementsByClassName("tab")[index];
            var totalElement = document.getElementsByClassName("total")[index];

            var quantity = parseInt(quantityElement.textContent);
            if (quantity > 0) {
                quantity--;
                quantityElement.textContent = quantity;

                var price = parseInt(quantityElement.parentNode.previousElementSibling.textContent);
                var total = quantity * price;
                totalElement.textContent = total;

                updateGrandTotal();
            }
        }

        function prepareOrder() {
            var orderData = [];
            var tableNumber = document.getElementById('table-number').value;
            var teaRows = document.getElementsByTagName('tbody')[0].getElementsByTagName('tr');
            console.log(orderData);

            for (var i = 0; i < teaRows.length - 1; i++) {
                var teaName = teaRows[i].getElementsByTagName('td')[0].innerHTML;
                var quantity = parseInt(teaRows[i].getElementsByClassName('tab')[0].innerHTML);
                var price = parseInt(teaRows[i].getElementsByTagName('td')[1].innerHTML);
                var total = parseInt(teaRows[i].getElementsByClassName('total')[0].innerHTML);

                if (quantity > 0) {
                    orderData.push({
                        teaName: teaName,
                        quantity: quantity,
                        price: price,
                        total: total
                    });
                }
            }

            var orderDataInput = document.getElementById('orderDataInput');
            orderDataInput.value = JSON.stringify(orderData);

            var xhr = new XMLHttpRequest();
            var url = '../processing/menu-add.php';
            xhr.open('POST', url, true);
            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    console.log(xhr.responseText);
                }
            };

            var params = 'tableNumber=' + tableNumber + '&orderData=' + encodeURIComponent(JSON.stringify(orderData));
            xhr.send(params);
        }
    </script>
</body>

</html>