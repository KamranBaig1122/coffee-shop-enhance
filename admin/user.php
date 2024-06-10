<?php
require '../configuration/db-config.php';
$query = "SELECT * FROM `users`";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../assets/fav.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/tabular.css">
    <title>Coffee Shop | All Orders</title>
</head>

<body>
    <div class="logout-container" >
        <a href="accounts.php" class="account-button">Accounts</a>
        <a href="../authentication/logout.php" class="logout-button">Logout</a>
    </div>
    
    <div class="container">
        <h1>All Users</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">User ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Age</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['user_id'] . "</td>";
                        echo "<td>" . $row['name'] . "</td>";
                        echo "<td>" . $row['email'] . "</td>";
                        echo "<td>" . $row['age'] . "</td>";
                        echo "<td>" . $row['gender'] . "</td>";
                        echo "<td>
                                <form method='POST' action='../processing/delete_user.php'>
                                    <input type='hidden' name='User_id' value='" . $row['user_id'] . "' />
                                    <button type='submit' class='delete-button'>Delete</button>
                                </form>
                              </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='7'>No User found.</td></tr>";
                }
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>