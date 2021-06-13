<?php 
    include("database.php");
    $con=conectar();

    $sql="SELECT *  FROM empleado order by nom_empleado asc";
    $query=mysqli_query($con,$sql);

    $row=mysqli_fetch_array($query);
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
    <title> Empleados</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    </head>
    <body style="background-color:#eee">
    <div class="container mt-5">
    <div class="row"> 

    <div class="col-md-3">
        <h1>Ingrese datos</h1>
        <form action="insertar.php" method="POST">

        <input type="text" class="form-control mb-3" name="ci_empleado" placeholder="CI">
        <input type="text" class="form-control mb-3" name="nom_empleado" placeholder="Nombres">
        <input type="text" class="form-control mb-3" name="apell_empleado" placeholder="Apellidos">
        <input type="text" class="form-control mb-3" name="telef_empleado" placeholder="Telefono">
        <input type="text" class="form-control mb-3" name="cargo_empleado" placeholder="Cargo">
        
        <input type="submit" class="btn btn-primary">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
		<a href="/proyecto161" class="btn btn-success">Volver</a>


        </form>
    </div>

    <div class="col-md-8"  style="color:#FF8D33">
    <table class="table" >
    <thead class="table-success table-striped" >
        <tr>
            <th>CI</th>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>Telefono</th>
             <th>Cargo</th>
            <th></th>
            <th></th>
        </tr>
    </thead>

    <tbody>
            <?php
                while($row=mysqli_fetch_array($query)){
            ?>
                <tr>
                    <th><?php  echo $row['ci_empleado']?></th>
                    <th><?php  echo $row['nom_empleado']?></th>
                    <th><?php  echo $row['apell_empleado']?></th>
                    <th><?php  echo $row['telef_empleado']?></th>
                    <th><?php  echo $row['cargo_empleado']?></th>    
                    <th><a href="actualizar.php?ci_empleado=<?php echo $row['ci_empleado'] ?>" class="btn btn-info">Editar</a></th>
                    <th><a href="delete.php?ci_empleado=<?php echo $row['ci_empleado'] ?>" class="btn btn-danger">Eliminar</a></th>                                        
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