<?php
    session_start();
    include("database.php");
    $con=conectar();

    $sqltp = "SELECT *  FROM tipo_producto";
    $querytp = mysqli_query($con, $sqltp);

    $sqls = "SELECT *  FROM sucursal";
    $querys = mysqli_query($con, $sqls);

    $sql = "SELECT p.*, tp.NOMBRE_TIPO_PRODUCTO, s.DIRECCION as SUCURSAL_DIRECCION
            FROM producto as p
            LEFT JOIN tipo_producto as tp ON tp.ID_TIPO_PRODUCTO = p.ID_TIPO_PRODUCTO
            LEFT JOIN sucursal as s ON s.ID_SUCURSAL = p.ID_SUCURSAL_PRODUCTO
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
            <?php if(!isset($_SESSION['ID_USUARIO']) || $_SESSION['ID_ROL'] == 3): ?>
                <?php if(true): ?>
                    <div class="row mb-2">
                        <div class="col-md-8">
                            <a href="./" class="btn btn-primary btn-sm">Volver al Inicio</a>
                        </div>
                        <div class="col-md-4 text-right">
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
                                <input type="text" class="form-control" name="nombre" placeholder="Nombre del producto" required>
                            </div>
                            <div class="col-md-2">
                                <button class="btn btn-success btn-block btn-sm">Buscar</button>
                            </div>
                        </div>
                    </form>
                    <br>
                    <div class="row mt-2">
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
                <?php endif; ?>
            <?php endif; ?>
        </div>
        <div class="contenedor-admin">
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
                    <div class="col-md-9">
                        <div class="table-responsive">
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
                                        <th>TIPO PROD</th>
                                        <th>SUCURSAL</th>
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
                                            <th><?php  echo $row['NOMBRE_TIPO_PRODUCTO']?></th>
                                            <th><?php  echo $row['SUCURSAL_DIRECCION']?></th>
                                            <th><a href="actualizar.php?id_producto=<?php echo $row['ID_PRODUCTO'] ?>" class="btn btn-info">Editar</a></th>
                                            <th><button onclick="eliminar_producto('<?php echo $row['ID_PRODUCTO'] ?>')" class="btn btn-danger">Eliminar</button></th>
                                        </tr>
                                    <?php
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>

        <script>
            function eliminar_producto(producto_id) {
                const res = confirm('¿Está seguro de eliminar el producto?');
                if(res) {
                    window.location = './delete.php?id='+producto_id;
                }
            }
        </script>
    </body>
    </html>