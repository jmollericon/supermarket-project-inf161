<?php
  session_start();
  if (isset($_SESSION['ID_USUARIO'])) {
    header('Location: ./');
  }
  require 'database.php';

  if(isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    print_r($_POST);
    echo "<br />";
    $con = conectar();
    $sql = "SELECT u.*, p.*, ur.ID_ROL, r.DESCRIPCION_ROL
            FROM usuario as u
            LEFT JOIN persona as p ON p.ID_PERSONA=u.ID_PERSONA_USUARIO
            LEFT JOIN usuario_rol as ur ON ur.ID_USUARIO=u.ID_USUARIO
            LEFT JOIN rol as r ON r.ID_ROL=ur.ID_ROL
            WHERE u.NOMBRE_USUARIO='$username' and u.CONTRASEÑA_USUARIO='$password'
            ;";
    $result = mysqli_query($con, $sql);

    if($result->num_rows > 0) {
      $data_usuario = [];
      while($row = $result->fetch_assoc()) {
        $data_usuario = $row;
      }
      $_SESSION['ID_USUARIO'] = $data_usuario["ID_USUARIO"];
      $_SESSION['ID_ROL'] = $data_usuario["ID_ROL"];
      $_SESSION['DESCRIPCION_ROL'] = $data_usuario["DESCRIPCION_ROL"];
      $_SESSION['NOMBRES'] = $data_usuario["NOMBRES"];
      $_SESSION['PRIMER_APELLIDO'] = $data_usuario["PRIMER_APELLIDO"];
      $_SESSION['SEGUNDO_APELLIDO'] = $data_usuario["SEGUNDO_APELLIDO"];
      /*if($data_usuario["ID_ROL"] == 1) {
        header("Location: ./administracion.php");
      } */
      header("Location: ./");
    } else {
      $message = 'Datos incorrectos.';
    }
  }
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Login</title>
<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
<link rel="stylesheet" href="assets/css/login.css">
</head>
<body>
	<?php # require 'partial/header.php' ?>

  <div class="login">
    <div class="login-screen">
      <div class="app-title">
        <h1>Iniciar sesión</h1>
      </div>
      <?php if(!empty($message)): ?>
        <div style="color: red;">
          <p> <?= $message ?></p>
        </div>
      <?php endif; ?>
      <form action="" method="post">
        <div class="login-form">
          <div class="control-group">
            <input type="text" class="login-field" value="" placeholder="Nombre de usuario" name="username" id="login-name" required>
            <label class="login-field-icon fui-user" for="login-name"></label>
          </div>

          <div class="control-group">
            <input type="password" class="login-field" value="" placeholder="Contraseña" name="password" id="login-pass" required>
            <label class="login-field-icon fui-lock" for="login-pass"></label>
          </div>

          <button type="submit" class="btn btn-primary btn-large btn-block">Ingresar</button>
          <!-- <a class="login-link" href="#">Lost your password?</a> -->
          <div class="division">&nbsp;</div>
          <a href="./registrarme.php" class="volver-inicio">Registrarme</a><br><br>
          <a href="./" class="volver-inicio">Volver al inicio</a>
        </div>
      </form>
    </div>
  </div>
</body>
</html>