<?php

include("database.php");
$con=conectar();

$ci_empleado=$_POST['ci_empleado'];
$nom_empleado=$_POST['nom_empleado'];
$apell_empleado=$_POST['apell_empleado'];
$telef_empleado=$_POST['telef_empleado'];
$cargo_empleado=$_POST['cargo_empleado'];

$sql="UPDATE empleado SET  nom_empleado='$nom_empleado',apell_empleado='$apell_empleado', telef_empleado='$telef_empleado', cargo_empleado='$cargo_empleado' WHERE ci_empleado='$ci_empleado'";
$query=mysqli_query($con,$sql);

    if($query){
        Header("Location: empleado.php");
    }
?>