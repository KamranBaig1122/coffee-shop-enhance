<?php
require '../configuration/db-config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $password = password_hash(htmlspecialchars($_POST['password']), PASSWORD_BCRYPT);
    $age = htmlspecialchars($_POST['age']);
    $gender = htmlspecialchars($_POST['gender']);

    $data = $conn->prepare("SELECT user_id FROM users WHERE email = ?");
    $data->bind_param("s", $email);
    $data->execute();
    $data->store_result();

    if ($data->num_rows > 0) {
        header("Location: ../sign-up.php?signup=exists");
        exit();
    } else {
        $data = $conn->prepare("INSERT INTO users (name, email, password, age, gender) VALUES (?, ?, ?, ?, ?)");
        $data->bind_param("sssds", $name, $email, $password, $age, $gender);

        if ($data->execute()) {
            header("Location: ../sign-up.php?signup=success");
            exit();
        } else {
            header("Location: ../sign-up.php?signup=error");
            exit();
        }
    }

    $data->close();
}

$conn->close();
?>
