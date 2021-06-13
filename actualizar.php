<?php 
    include("database.php");
    $con=conectar();

$ci=$_GET['ci_empleado'];

$sql="SELECT * FROM empleado WHERE ci_empleado='$ci'";
$query=mysqli_query($con,$sql);

$row=mysqli_fetch_array($query);
?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
    <title></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/style.css" rel="stylesheet">
    <title>Actualizar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    </head>
    <body>
        <div class="container mt-5">
            <form action="update.php" method="POST">
            
                <input type="hidden" name="ci_empleado" value="<?php echo $row['ci_empleado']  ?>">
                
                <input type="text" class="form-control mb-3" name="nom_empleado" placeholder="Nombres" value="<?php echo $row['nom_empleado']  ?>">
                <input type="text" class="form-control mb-3" name="apell_empleado" placeholder="Apellidos" value="<?php echo $row['apell_empleado']  ?>">
                <input type="text" class="form-control mb-3" name="telef_empleado" placeholder="Telefono" value="<?php echo $row['telef_empleado']  ?>">
                <input type="text" class="form-control mb-3" name="cargo_empleado" placeholder="Cargo" value="<?php echo $row['cargo_empleado']  ?>">
                
            <input type="submit" class="btn btn-primary btn-block" value="Actualizar">
            </form>
            
        </div>
    </body>
    </html>