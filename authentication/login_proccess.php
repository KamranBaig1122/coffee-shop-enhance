<?php
session_start();
require '../configuration/db-config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);

    if ($email === 'moazma@gmail.com' && $password === 'admin') {
        header("Location: ../admin/dashboard.php");
        exit();
    }

    $data = $conn->prepare("SELECT user_id, name, password FROM users WHERE email = ?");
    $data->bind_param("s", $email);
    $data->execute();
    $data->store_result();

    if ($data->num_rows > 0) {
        $data->bind_result($id, $name, $hashed_password);
        $data->fetch();

        if (password_verify($password, $hashed_password)) {
            $_SESSION['user_id'] = $id;
            $_SESSION['user_name'] = $name;

            header("Location: ../shop/home.php");
            exit();
        } else {
            header("Location: ../index.php?login=error");
            exit();
        }
    } else {
        header("Location: ../index.php?login=notfound");
        exit();
    }

    $data->close();
}

$conn->close();
?>
