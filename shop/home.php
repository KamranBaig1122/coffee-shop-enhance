<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.html");
    exit();
}

$user_name = $_SESSION['user_name'];
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="../assets/fav.png" type="image/x-icon">
    <title>Coffee Shop | Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Montez&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="../css/shop-main.css">
  </head>
  <body>
    <div class="container-fluid">
        <div class="main-container d-flex justify-content-center align-items-center flex-column mb-3" style="height: 100vh;">
            <h1 class="main_word">Welcome, <?php echo htmlspecialchars($user_name); ?>!</h1>
            <button><a href="menu.php">Menu</a></button>
            <button><a href="../authentication/logout.php">Logout</a></button>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>