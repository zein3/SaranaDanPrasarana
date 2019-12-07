<?php

session_start();

if (isset($_SESSION['name']))
{
  header("Location: main.php");
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>

	<link rel="stylesheet" href="css/login.css">
  <link rel="stylesheet" href="css/w3.css">

</head>
<body>
<section class="forms-section">
    <h1 class="section-title">Sarana dan Prasarana</h1>
    <?php

    if (isset($_GET['error']))
    {
      $error = $_GET['error'];
      include 'login-error.php';
    }

    if(isset($_GET['success']))
    {
      $success = $_GET['success'];
      if ($success == "register")
      {
        echo "<div class='w3-panel w3-green'>";
        echo "<h3>Akun telah terdaftar, silahkan login</h3>";
        echo "</div>";
      }
    }

    ?>
    <div class="forms">
      <div class="form-wrapper is-active">
          <button type="button" class="switcher switcher-login">
              Login
              <span class="underline"></span>
          </button>
        <form class="form form-login" action="login.php" method="post">
          <fieldset>
            <legend>Masukkan username dan password untuk login</legend>
            <div class="input-block">
              <label for="login-username">Username</label>
              <input name="login-username" type="text" required>
            </div>
            <div class="input-block">
              <label for="login-password">Password</label>
              <input name="login-password" type="password" required>
            </div>
          </fieldset>
          <button type="submit" class="btn-login">Login</button>
        </form>
      </div>
      <div class="form-wrapper">
        <button type="button" class="switcher switcher-signup">
          Sign Up
          <span class="underline"></span>
        </button>
        <form class="form form-signup" action="register.php" method="post">
          <fieldset>
            <legend>Masukkan username, password dan konfirmasi password untuk daftar</legend>
            <div class="input-block">
              <label for="signup-name">Name</label>
              <input name="signup-name" type="text" required>
            </div>
            <div class="input-block">
              <label for="signup-username">Username</label>
              <input name="signup-username" type="text" required>
            </div>
            <div class="input-block">
              <label for="signup-password">Password</label>
              <input name="signup-password" type="password" required>
            </div>
            <div class="input-block">
              <label for="signup-password-confirm">Confirm password</label>
              <input name="signup-password-confirm" type="password" required>
            </div>
          </fieldset>
          <button type="submit" class="btn-signup">Register</button>
        </form>
      </div>
    </div>
</section>

	<script src="js/login.js"></script>
</body>
</html>