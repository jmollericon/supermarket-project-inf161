<?php
    session_start();
    include("database.php");
    $con=conectar();

    $sqltp = "SELECT *  FROM tipo_producto";
    $querytp = mysqli_query($con, $sqltp);

    $sqls = "SELECT *  FROM sucursal";
    $querys = mysqli_query($con, $sqls);

    $sql = "SELECT *  FROM producto";
    $query = mysqli_query($con,$sql);
    $row = mysqli_fetch_array($query);
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
            <?php if(!isset($_SESSION['ID_USUARIO']) || $_SESSION['ID_ROL'] == 3): ?>
                <?php if(true): ?>
                    <div class="row mb-2">
                        <div class="col-md-6">
                            <a href="./" class="btn btn-primary btn-sm">Volver al Inicio</a>
                        </div>
                        <div class="col-md-6 text-right">
                            <?php if(!isset($_SESSION['ID_USUARIO'])): ?>
                                <a class="btn btn-danger btn-sm" href="login.php">Iniciar Sesión</a>
                            <?php else: ?>
                                Bienvenido, <?= $_SESSION['NOMBRES'] ?>
                            <?php endif; ?>
                        </div>
                    </div>
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
                            <!-- <tr>
                                <th><?php  echo $row['FECHA_ELABORACION']?></th>
                                <th><?php  echo $row['FECHA_VENCIMIENTO']?></th>
                                <th><?php  echo $row['COMPRA_PRODUCTO']?></th>
                                <th><?php  echo $row['']?></th>
                                <th><?php  echo $row['ID_TIPO_PRODUCTO']?></th>
                                <th><?php  echo $row['ID_SUCURSAL_PRODUCTO']?></th>
                                <th><a href="actualizar.php?id_producto=<?php echo $row['ID_PRODUCTO'] ?>" class="btn btn-info">Editar</a></th>
                                <th><a href="delete.php?id_producto=<?php echo $row['ID_PRODUCTO'] ?>" class="btn btn-danger">Eliminar</a></th>                                        
                            </tr> -->
                        <?php
                            }
                        ?>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
            <?php if(isset($_SESSION['ID_USUARIO']) && $_SESSION['ID_ROL'] == 1): ?>
                <div class="row">
                    <div class="col-md-3">
                        <h1>Ingrese Productos</h1>
                        <form action="insertar.php" method="POST">
                            <label for="NOMBRE_PRODUCTO">Nombre </label>
                            <input type="text" class="form-control mb-3" name="NOMBRE_PRODUCTO" id="NOMBRE_PRODUCTO" placeholder="Nombre" required>

                            <label for="FECHA_ELABORACION">Fecha de elaboración </label>
                            <input type="date" id="start"class="form-control mb-3" name="FECHA_ELABORACION" id="FECHA_ELABORACION" placeholder="F.Elab" min="2018-01-01" max="2021-12-31" value="<?= date('Y-m-d') ?>">

                            <label for="FECHA_VENCIMIENTO">Fecha de venimiento </label>
                            <input type="date"  id="start" class="form-control mb-3" name="FECHA_VENCIMIENTO" id="FECHA_VENCIMIENTO" placeholder="F.Venc" min="2018-01-01" max="2021-12-31" value="<?= date('Y-m-d') ?>">

                            <label for="COMPRA_PRODUCTO">Precio compra </label>
                            <input type="number" step="0.01" class="form-control mb-3" name="COMPRA_PRODUCTO" id="COMPRA_PRODUCTO" placeholder="Compra">

                            <label for="VENTA_PRODUCTO">Precio venta </label>
                            <input type="number" step="0.01" class="form-control mb-3" name="VENTA_PRODUCTO" id="VENTA_PRODUCTO" placeholder="Venta">

                            <label for="CANTIDAD_PRODUCTO">Cantidad </label>
                            <input type="numer" step="1" class="form-control mb-3" name="CANTIDAD_PRODUCTO" id="CANTIDAD_PRODUCTO" placeholder="Cantidad">

                            <label for="DESCRIPCION_PRODUCTO">Descripción </label>
                            <input type="text" class="form-control mb-3" name="DESCRIPCION_PRODUCTO" id="DESCRIPCION_PRODUCTO" placeholder="Description">

                            <label for="ID_TIPO_PRODUCTO">Tipo de Producto</label>
                            <select name="ID_TIPO_PRODUCTO" id="ID_TIPO_PRODUCTO" class="form-control">
                                <?php
                                    while($rowtp = mysqli_fetch_array($querytp)){
                                ?>
                                    <option value="<?= $rowtp['ID_TIPO_PRODUCTO'] ?>"><?= $rowtp['NOMBRE_TIPO_PRODUCTO'] ?></option>
                                <?php
                                    }
                                ?>
                            </select>

                            <label for="ID_SUCURSAL_PRODUCTO">Sucursal</label>
                            <select name="ID_SUCURSAL_PRODUCTO" id="ID_SUCURSAL_PRODUCTO" class="form-control">
                                <?php
                                    while($rows = mysqli_fetch_array($querys)) {
                                ?>
                                    <option value="<?= $rows['ID_SUCURSAL'] ?>"><?= $rows['DIRECCION'] ?></option>
                                <?php
                                    }
                                ?>
                            </select>
                            <br>
                            <input type="submit" class="btn btn-primary" value="Registrar">
                            <a href="./" class="btn btn-success">Volver</a>
                        </form>
                    </div>
                    <div class="col-md-8">
                        <table class="table">
                            <thead class="table-success table-striped" >
                                <tr>
                                    <th>ID PROD</th>
                                    <th>NOMBRE</th>
                                    <th>F. ELAB</th>
                                    <th>F. VENC</th>
                                    <th>COMPRA</th>
                                    <th>VENTA</th>
                                    <th>CANTIDAD</th>
                                    <th>DESCRIPCION</th>
                                    <th>ID TIPO PROD</th>
                                    <th>ID SUCURSAL</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    while($row=mysqli_fetch_array($query)){
                                ?>
                                    <tr>
                                        <th class="bg-warning"><?php  echo $row['ID_PRODUCTO']?></th>
                                        <th><?php  echo $row['NOMBRE_PRODUCTO']?></th>
                                        <th><?php  echo $row['FECHA_ELABORACION']?></th>
                                        <th><?php  echo $row['FECHA_VENCIMIENTO']?></th>
                                        <th><?php  echo $row['COMPRA_PRODUCTO']?> Bs.</th>
                                        <th><?php  echo $row['VENTA_PRODUCTO']?> Bs.</th>
                                        <th><?php  echo $row['CANTIDAD_PRODUCTO']?></th>
                                        <th><?php  echo $row['DESCRIPCION_PRODUCTO']?></th>
                                        <th><?php  echo $row['ID_TIPO_PRODUCTO']?></th>
                                        <th><?php  echo $row['ID_SUCURSAL_PRODUCTO']?></th>
                                        <th><a href="actualizar.php?id_producto=<?php echo $row['ID_PRODUCTO'] ?>" class="btn btn-info">Editar</a></th>
                                        <th><a href="delete.php?id_producto=<?php echo $row['ID_PRODUCTO'] ?>" class="btn btn-danger">Eliminar</a></th>                                        
                                    </tr>
                                <?php
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </body>
    </html>