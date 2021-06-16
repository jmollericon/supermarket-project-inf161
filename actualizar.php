<?php 
    include("database.php");
    $con=conectar();

    $sqltp = "SELECT *  FROM tipo_producto";
    $querytp = mysqli_query($con, $sqltp);

    $sqls = "SELECT *  FROM sucursal";
    $querys = mysqli_query($con, $sqls);

    $id = $_GET['id'];

    $sql = "SELECT * FROM producto WHERE ID_PRODUCTO='$id' LIMIT 1";
    $query = mysqli_query($con,$sql);
    $producto = mysqli_fetch_array($query);
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
    <body style="background-color:#FAE2C7">
        <div class="container mt-5">
            <h1>Editar producto: <?= $producto['NOMBRE_PRODUCTO'] ?></h1>
            <form action="update.php" method="POST">
                <div class="row">
                    <input type="text" name="ID_PRODUCTO" value="<?= $id ?>" hidden>
                    <div class="col-md-6">
                        <label for="NOMBRE_PRODUCTO">Nombre </label>
                        <input type="text" class="form-control mb-3" value="<?= $producto['NOMBRE_PRODUCTO'] ?>" name="NOMBRE_PRODUCTO" id="NOMBRE_PRODUCTO" placeholder="Nombre" required>
                    </div>
                    <div class="col-md-3">
                        <label for="FECHA_ELABORACION">Fecha de elaboración </label>
                        <input type="date" id="start"class="form-control mb-3" value="<?= $producto['FECHA_ELABORACION'] ?>" name="FECHA_ELABORACION" id="FECHA_ELABORACION" placeholder="F.Elab" min="2018-01-01" max="2021-12-31" value="<?= date('Y-m-d') ?>">
                    </div>
                    <div class="col-md-3">
                        <label for="FECHA_VENCIMIENTO">Fecha de venimiento </label>
                        <input type="date"  id="start" class="form-control mb-3" value="<?= $producto['FECHA_VENCIMIENTO'] ?>" name="FECHA_VENCIMIENTO" id="FECHA_VENCIMIENTO" placeholder="F.Venc" min="2018-01-01" max="2021-12-31" value="<?= date('Y-m-d') ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2">
                        <label for="COMPRA_PRODUCTO">Precio compra </label>
                        <input type="number" step="0.01" class="form-control mb-3" value="<?= $producto['COMPRA_PRODUCTO'] ?>" name="COMPRA_PRODUCTO" id="COMPRA_PRODUCTO" placeholder="Compra">
                    </div>
                    <div class="col-md-2">
                        <label for="VENTA_PRODUCTO">Precio venta </label>
                        <input type="number" step="0.01" class="form-control mb-3" value="<?= $producto['VENTA_PRODUCTO'] ?>" name="VENTA_PRODUCTO" id="VENTA_PRODUCTO" placeholder="Venta">
                    </div>
                    <div class="col-md-2">
                        <label for="CANTIDAD_PRODUCTO">Cantidad </label>
                        <input type="numer" step="1" class="form-control mb-3" value="<?= $producto['CANTIDAD_PRODUCTO'] ?>" name="CANTIDAD_PRODUCTO" id="CANTIDAD_PRODUCTO" placeholder="Cantidad">
                    </div>
                    <div class="col-md-6">
                        <label for="DESCRIPCION_PRODUCTO">Descripción </label>
                        <input type="text" class="form-control mb-3" value="<?= $producto['DESCRIPCION_PRODUCTO'] ?>" name="DESCRIPCION_PRODUCTO" id="DESCRIPCION_PRODUCTO" placeholder="Description">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <label for="ID_TIPO_PRODUCTO">Tipo de Producto</label>
                        <select name="ID_TIPO_PRODUCTO" id="ID_TIPO_PRODUCTO" class="form-control">
                            <?php
                                while($rowtp = mysqli_fetch_array($querytp)){
                            ?>
                                <option
                                    value="<?= $rowtp['ID_TIPO_PRODUCTO'] ?>"
                                    <?= $producto['ID_TIPO_PRODUCTO'] == $rowtp['ID_TIPO_PRODUCTO'] ? 'selected':'' ?>
                                ><?= $rowtp['NOMBRE_TIPO_PRODUCTO'] ?></option>
                            <?php
                                }
                            ?>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="ID_SUCURSAL_PRODUCTO">Sucursal</label>
                        <select name="ID_SUCURSAL_PRODUCTO" id="ID_SUCURSAL_PRODUCTO" class="form-control">
                            <?php
                                while($rows = mysqli_fetch_array($querys)) {
                            ?>
                                <option
                                    value="<?= $rows['ID_SUCURSAL'] ?>"
                                    <?= $producto['ID_SUCURSAL_PRODUCTO'] == $rows['ID_SUCURSAL'] ? 'selected':'' ?>
                                ><?= $rows['DIRECCION'] ?></option>
                            <?php
                                }
                            ?>
                        </select>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-12">
                        <input type="submit" class="btn btn-primary" value="Actualizar">
                        <a href="./productos.php" class="btn btn-success">Volver</a>
                    </div>
                </div>
            </form>
        </div>
    </body>
    </html>