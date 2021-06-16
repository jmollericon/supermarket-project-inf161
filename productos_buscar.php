<?php
    session_start();
    include("database.php");
    $con=conectar();

    $busqueda = $_GET['nombre'];
    $sql = "SELECT p.*, tp.NOMBRE_TIPO_PRODUCTO, s.DIRECCION as SUCURSAL_DIRECCION
            FROM producto as p
            LEFT JOIN tipo_producto as tp ON tp.ID_TIPO_PRODUCTO = p.ID_TIPO_PRODUCTO
            LEFT JOIN sucursal as s ON s.ID_SUCURSAL = p.ID_SUCURSAL_PRODUCTO
            WHERE p.NOMBRE_PRODUCTO  LIKE '%".$busqueda."%'
            ";
    $query = mysqli_query($con,$sql);
    #$row = mysqli_fetch_array($query);
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <title>PRODUCTOS</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
        <link href="assets/css/style.css" rel="stylesheet">
    </head>
    <body style="background-color:#FAE2C7">
        <div class="container my-5">

            <div class="row mb-2">
                <div class="col-md-6">
                    <a href="./productos.php" class="btn btn-primary btn-sm">Ver todos los productos</a>
                </div>
                <div class="col-md-6 text-right">
                    <?php if(!isset($_SESSION['ID_USUARIO'])): ?>
                        <a class="btn btn-danger btn-sm" href="login.php">Iniciar Sesión</a><br>
                    <?php else: ?>
                        Bienvenido, <?= $_SESSION['NOMBRES'] ?>
                    <?php endif; ?>
                </div>
            </div>
            <form action="productos_buscar.php" method="GET">
                <div class="row">
                    <div class="col-md-7">
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control" name="nombre" value="<?= $_GET['nombre'] ?>" placeholder="Nombre del producto">
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-success btn-block btn-sm">Buscar</button>
                    </div>
                </div>
            </form>
            <br>
            <div class="row text-center">
                <h2>Resultados de la busqueda: '<?= $_GET['nombre'] ?>'</h2>
            </div>
            <br>
            <div class="row">
                <?php
                    while($row=mysqli_fetch_array($query)){
                ?>
                    <div class="col-md-3 mb-2">
                        <div class="card">
                            <div class="card-header">
                                <?php  echo $row['NOMBRE_PRODUCTO']?>
                            </div>
                            <div class="card-body">
                                <strong>Producto Nro. </strong><?php  echo $row['ID_PRODUCTO']?><br>
                                <strong>Descripción: </strong><?php  echo $row['DESCRIPCION_PRODUCTO']?><br>
                                <strong>Precio: </strong><?php  echo $row['VENTA_PRODUCTO']?> Bs.<br>
                                <strong>Cantidad disponible: </strong><?php  echo $row['CANTIDAD_PRODUCTO']?><br>
                            </div>
                            <div class="card-footer text-right">
                                <?php if(!isset($_SESSION['ID_USUARIO'])): ?>
                                    <input type="button" class="btn btn-default btn-sm deshabilitado" value="Agregar al carrito" disabled>
                                <?php else: ?>
                                    <input type="button" class="btn btn-info btn-sm" value="Agregar al carrito">
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php
                    }
                ?>
            </div>
        </div>
    </body>
    </html>