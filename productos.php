<?php 
    include("database.php");
    $con=conectar();

    $sql="SELECT *  FROM producto";
    $query=mysqli_query($con,$sql);

    $row=mysqli_fetch_array($query);
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
    <title> PRODUCTOS</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    </head>
    <body style="background-color:#FAE2C7">
    <div class="container mt-5">
    <div class="row"> 

    <div class="col-md-3">
        <h1>Ingrese Productos</h1>
        <form action="insertar.php" method="POST">

        <input type="text" class="form-control mb-3" name="ID_PRODUCTO" placeholder="Id_Producto">
        <input type="text" class="form-control mb-3" name="NOMBRE_PRODUCTO" placeholder="Nombre">
        <input type="date" id="start"class="form-control mb-3" name="FECHA_ELABORACION" placeholder="F.Elab" value="yy-mm-dd (F.ELAB)" min="2018-01-01" max="2021-12-31">
        <input type="date"  id="start" class="form-control mb-3" name="FECHA_VENCIMIENTO" placeholder="F.Venc" value="yy-mm-dd (F.ELAB)" min="2018-01-01" max="2021-12-31">
        <input type="text" class="form-control mb-3" name="COMPRA_PRODUCTO" placeholder="Compra">
        <input type="text" class="form-control mb-3" name="VENTA_PRODUCTO" placeholder="Venta">
        <input type="text" class="form-control mb-3" name="CANTIDAD_PRODUCTO" placeholder="Cantidad">
         <input type="text" class="form-control mb-3" name="DESCRIPCION_PRODUCTO" placeholder="Description">
        <input type="text" class="form-control mb-3" name="ID_TIPO_PRODUCTO" placeholder="Id_Tipo_Producto">
         <input type="text" class="form-control mb-3" name="ID_SUCURSAL_PRODUCTO" placeholder="Id_Sucursal_Producto">
        
        <input type="submit" class="btn btn-primary">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
		<a href="/Proyecto161-SUP" class="btn btn-success">Volver</a>


        </form>
    </div>

    <div class="col-md-8">
    <table class="table" >
    <thead class="table-success table-striped" >
    <colgroup span="1" style="background: rgba(128, 255, 0, 0.3); border: 1px solid rgba(100, 200, 0, 0.3);">
    <colgroup span="9" style="background: rgba(255, 128, 0, 0.3); border: 1px solid rgba(200, 100, 0, 0.3);">
        <tr>
            <th>ID_PROD</th>
            <th>NOMBRE</th>
            <th>F.ELAB</th>
            <th>F.VENC</th>
             <th>COMPRA</th>
             <th>VENTA</th>
            <th>CANTIDAD</th>
            <th>DESCRIPCION</th>
            <th>ID_TIPO_PROD</th>
             <th>ID_SUCURSAL</th>
            <th></th>
            <th></th>
        </tr>
    </thead>

    <tbody>
            <?php
                while($row=mysqli_fetch_array($query)){
            ?>
                <tr>
                    <th><?php  echo $row['ID_PRODUCTO']?></th>
                    <th><?php  echo $row['NOMBRE_PRODUCTO']?></th>
                    <th><?php  echo $row['FECHA_ELABORACION']?></th>
                    <th><?php  echo $row['FECHA_VENCIMIENTO']?></th>
                    <th><?php  echo $row['COMPRA_PRODUCTO']?></th>    
                    <th><?php  echo $row['VENTA_PRODUCTO']?></th>
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
    </div>
    </body>
    </html>