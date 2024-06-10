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
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Montez&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/shop-main.css" />

    <title>Coffee Shop</title>
</head>
<body>
    <div class="container-fluid">
        <div class="front d-flex justify-content-center" style="height: 100vh; border: none;">
            <h1 class="main_word">What do you want, <?php echo htmlspecialchars($user_name); ?>!</h1>
            <ul class="menu-list" style="list-style-type: none;">
                <li><button><a href="tea.php">Tea</a></button></li>
                <li><button><a href="cold.php">Cold Coffee</a></button></li>
                <li><button><a href="hot.php">Hot Coffee</a></button></li>
                <li><button><a href="sweet.php">Sweet</a></button></li>
            </ul>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
