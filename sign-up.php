<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="assets/fav.png" type="image/x-icon">
  <title>Coffee Shop | Sign-up</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="css/auth.css">
  
</head>

<body>
  <div class="container-fluid d-flex justify-content-center align-items-center" style="height: 100vh;">
    <div class="signup-container p-3">
      <h2 class="text-center mb-3" style="font-weight: 900; color: rgb(84, 25, 160);">Signup</h2>
      <form action="authentication/signup_proccess.php" method="POST">
        <input type="text" name="name" placeholder="Full Name" required />
        <input type="email" name="email" placeholder="Email" required />
        <input type="password" name="password" placeholder="Password" required />
        <input type="number" name="age" placeholder="Age" required />
        <div class="gender-container ">
          <label>
            <input type="radio" name="gender" value="male" required /> Male
          </label>
          <label>
            <input type="radio" name="gender" value="female" required /> Female
          </label>
        </div>
        <button type="submit">Create Account</button>
      </form>
      <p>Already have an account? <a href="index.php">Login here</a></p>
      <?php if (isset($_GET['signup'])) : ?>
        <?php if ($_GET['signup'] == 'success') : ?>
          <div class="message success">Signup successful!</div>
        <?php elseif ($_GET['signup'] == 'error') : ?>
          <div class="message error">Signup failed. Please try again.</div>
        <?php elseif ($_GET['signup'] == 'exists') : ?>
          <div class="message error">Email already exists. Please use a different email.</div>
        <?php endif; ?>
      <?php endif; ?>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>