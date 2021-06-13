<?php

  session_start();

  if (isset($_SESSION['user_id'])) {
    header('Location: /Proyecto161-SUP');
  }
  require 'database.php';

  if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $records = $conn->prepare('SELECT id, email, password FROM usuarios WHERE email = :email');
    $records->bindParam(':email', $_POST['email']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $message = '';

    if (count($results) > 0 && password_verify($_POST['password'], $results['password'])) {
      $_SESSION['user_id'] = $results['id'];
      header("Location: /proyecto161");
    } else {
      $message = 'Sorry, those credentials do not match';
    }
  }

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Login</title>
<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
<link rel="stylesheet" href="assets/css/style.css">
<link rel="stylesheet" href="assets/css/login.css">
</head>
<body>
	<?php require 'partial/header.php' ?>
	<?php if(!empty($message)): ?>
      <p> <?= $message ?></p>
    <?php endif; ?>
	<!-- <h1>Login</h1>
    <span>or <a href="signup.php">SignUp</a></span>

    <form action="login.php" method="POST">
      <input name="email" type="text" placeholder="Enter your email">
      <input name="password" type="password" placeholder="Enter your Password">
      <input type="submit" value="Submit"> -->

        <div class="login">
    <div class="login-screen">
      <div class="app-title">
        <h1>Login</h1>
      </div>

      <div class="login-form">
        <div class="control-group">
        <input type="text" class="login-field" value="" placeholder="username" id="login-name">
        <label class="login-field-icon fui-user" for="login-name"></label>
        </div>

        <div class="control-group">
        <input type="password" class="login-field" value="" placeholder="password" id="login-pass">
        <label class="login-field-icon fui-lock" for="login-pass"></label>
        </div>

        <a class="btn btn-primary btn-large btn-block" href="#">login</a>
        <a class="login-link" href="#">Lost your password?</a>
      </div>
    </div>
  </div>

	</form>

</body>
</html>