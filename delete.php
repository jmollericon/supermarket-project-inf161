<?php

include("database.php");
$con=conectar();

$ci_empleado=$_GET['ci_empleado'];

$sql="DELETE FROM empleado  WHERE ci_empleado='$ci_empleado'";
$query=mysqli_query($con,$sql);

    if($query){
        Header("Location: empleado.php");
    }
?>