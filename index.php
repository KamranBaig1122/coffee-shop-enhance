<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="assets/fav.png" type="image/x-icon">
    <title>Coffee Shop | Log-in</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/auth.css">
  </head>
  <body>
    <div class="container-fluid d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="signup-container p-3">
            <h2 class="text-center mb-3" style="font-weight: 900; color: rgb(84, 25, 160);">Login</h2>
            <?php if (isset($_GET['login'])): ?>
                <?php if ($_GET['login'] == 'error'): ?>
                    <div class="alert alert-danger">Incorrect password. Please try again.</div>
                <?php elseif ($_GET['login'] == 'notfound'): ?>
                    <div class="alert alert-danger">No account found with that email. Please sign up first.</div>
                <?php endif; ?>
            <?php endif; ?>
            <form action="authentication/login_proccess.php" method="POST">
              <input type="email" name="email" placeholder="Email" required />
              <input type="password" name="password" placeholder="Password" required />
              <button type="submit" class="mt-3">Login Account</button>
            </form>
            <p>Not have an account? <a href="sign-up.php">Signup here</a></p>
          </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
