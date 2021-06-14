<?php
  session_start();
  if (isset($_SESSION['ID_USUARIO'])) {
    header('Location: ./');
  }
  require 'database.php';

  if(isset($_POST['username']) && isset($_POST['password'])) {
    $con = conectar();

    $NOMBRES = $_POST['nombres'];
    $PRIMER_APELLIDO = $_POST['paterno'];
    $SEGUNDO_APELLIDO = $_POST['materno'];
    $FECHA_NACIMENTO = $_POST['fecha_nacimiento'];
    $ID_DEPARTAMENTO = 1;

    $sql="INSERT INTO persona (NOMBRES, PRIMER_APELLIDO, SEGUNDO_APELLIDO, FECHA_NACIMENTO, ID_DEPARTAMENTO)
          VALUES ('$NOMBRES', '$PRIMER_APELLIDO', '$SEGUNDO_APELLIDO', '$FECHA_NACIMENTO', '$ID_DEPARTAMENTO');";
    $query= mysqli_query($con, $sql);
    if($query) {
      $message = "Usuario registrado exitosamente.";

      $sql = "SELECT * FROM persona ORDER BY ID_PERSONA DESC LIMIT 1;";
      $result = mysqli_query($con, $sql);

      if($result->num_rows > 0) {
        $data_usuario = [];
        while($row = $result->fetch_assoc()) {
          $data_usuario = $row;
        }

        $id_persona = $data_usuario['ID_PERSONA'];
        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql2 = "INSERT INTO usuario (NOMBRE_USUARIO, CONTRASEÑA_USUARIO, ID_PERSONA_USUARIO)
                VALUES ('$username', '$password', '$id_persona');";
        $query2 = mysqli_query($con, $sql2);

        $sql3 = "SELECT * FROM usuario ORDER BY ID_USUARIO DESC LIMIT 1;";
        $result2 = mysqli_query($con, $sql3);
        if($result2->num_rows > 0) {
          $data_usuario2 = [];
          while($row = $result2->fetch_assoc()) {
            $data_usuario2 = $row;
          }
          $id_usuario = $data_usuario2['ID_USUARIO'];
          $id_rol = 3;

          $sql3 = "INSERT INTO usuario_rol (ID_USUARIO, ID_ROL)
                VALUES ('$id_usuario', '$id_rol');";
          $query3 = mysqli_query($con, $sql3);
          $message = 'Usuario registrado correctamente.';
        }
      } else {
        $message = 'Datos incorrectos.';
      }
    } else {
      $message = "Error al registrar";
    }
  }
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Registrarme</title>
<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
<link rel="stylesheet" href="assets/css/login.css">
</head>
<body>
	<?php # require 'partial/header.php' ?>

  <div class="login">
    <div class="login-screen">
      <div class="app-title">
        <h1>Crear nuevo usuario</h1>
      </div>
      <?php if(!empty($message)): ?>
        <div style="color: blue;">
          <p> <?= $message ?></p>
        </div>
      <?php endif; ?>
      <form action="" method="post">
        <div class="login-form">
          <div class="control-group">
            <input type="text" class="login-field" value="" placeholder="Nombres" name="nombres" id="nombres" required>
            <label class="login-field-icon fui-user" for="nombres"></label>
          </div>

          <div class="control-group">
            <input type="text" class="login-field" value="" placeholder="Apellido paterno" name="paterno" id="paterno" required>
            <label class="login-field-icon fui-user" for="paterno"></label>
          </div>

          <div class="control-group">
            <input type="text" class="login-field" value="" placeholder="Apellido materno" name="materno" id="materno">
            <label class="login-field-icon fui-user" for="materno"></label>
          </div>

          <div class="control-group">
            <input type="date" class="login-field" value="<?= date('Y-m-d') ?>" name="fecha_nacimiento" id="fecha_nacimiento">
            <label class="login-field-icon fui-user" for="fecha_nacimiento"></label>
          </div>

          <div class="control-group">
            <input type="text" class="login-field" value="" placeholder="Nombre de usuario" name="username" id="username" minlength="4" required>
            <label class="login-field-icon fui-user" for="username"></label>
          </div>

          <div class="control-group">
            <input type="password" class="login-field" value="" placeholder="Contraseña" name="password" id="password" required>
            <label class="login-field-icon fui-lock" for="password"></label>
          </div>

          <button type="submit" class="btn btn-primary btn-large btn-block">Registrarme</button>
          <div class="division">&nbsp;</div>
          <a href="./login.php" class="volver-inicio">Iniciar sesión</a>
        </div>
      </form>
    </div>
  </div>
</body>
</html>