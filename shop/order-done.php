<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="../assets/fav.png" type="image/x-icon">
    <title>Coffee Shop | Order Success</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Montez&display=swap" rel="stylesheet" />
    <style>
        body {
            background-color: rgb(84, 25, 160);
        }

        .success {
            font-size: 30px;
            font-weight: bold;
            font-family: 'Montez', sans-serif;
            text-align: center;
            color: #b697e9;
        }

        button {
            border: 1px solid white;
            background-color: #b697e9;
            border-radius: 10px;
            padding-left: 50px;
            padding-right: 50px;
        }

        a {
            text-decoration: none;
            color: white;
            font-size: 15px;
        }

        .logout {
            background-color: red;
            color: #a94442;
            border: 1px solid #ebccd1;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div>
            <div class="success d-flex justify-content-center align-items-center mt-5">Order Submit Successfull!
            </div>
            <div class="d-flex justify-content-center align-items-center mt-5">

                <button><a href="menu.php">Make Another Order</a></button>
            </div>
            <div class="d-flex justify-content-center align-items-center mt-5">

                <button class="logout"><a href="../authentication/logout.php">Log out</a></button>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>