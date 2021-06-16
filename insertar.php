<?php
include("database.php");
$con=conectar();

// $ci_empleado=$_POST['ci_empleado'];
// $nom_empleado=$_POST['nom_empleado'];
// $apell_empleado=$_POST['apell_empleado'];
// $telef_empleado=$_POST['telef_empleado'];
// $cargo_empleado=$_POST['cargo_empleado'];

$NOMBRE_PRODUCTO=$_POST['NOMBRE_PRODUCTO'];
$FECHA_ELABORACION=$_POST['FECHA_ELABORACION'];
$FECHA_VENCIMIENTO=$_POST['FECHA_VENCIMIENTO'];
$COMPRA_PRODUCTO=$_POST['COMPRA_PRODUCTO'];
$VENTA_PRODUCTO=$_POST['VENTA_PRODUCTO'];
$CANTIDAD_PRODUCTO=$_POST['CANTIDAD_PRODUCTO'];
$DESCRIPCION_PRODUCTO=$_POST['DESCRIPCION_PRODUCTO'];
$ID_TIPO_PRODUCTO=$_POST['ID_TIPO_PRODUCTO'];
$ID_SUCURSAL_PRODUCTO=$_POST['ID_SUCURSAL_PRODUCTO'];


$sql="INSERT INTO producto (NOMBRE_PRODUCTO, FECHA_ELABORACION, FECHA_VENCIMIENTO, COMPRA_PRODUCTO, VENTA_PRODUCTO, CANTIDAD_PRODUCTO, DESCRIPCION_PRODUCTO, ID_TIPO_PRODUCTO, ID_SUCURSAL_PRODUCTO) VALUES ('$NOMBRE_PRODUCTO', '$FECHA_ELABORACION', '$FECHA_VENCIMIENTO', '$COMPRA_PRODUCTO', '$VENTA_PRODUCTO', '$CANTIDAD_PRODUCTO', '$DESCRIPCION_PRODUCTO', '$ID_TIPO_PRODUCTO', '$ID_SUCURSAL_PRODUCTO');";

$query= mysqli_query($con, $sql);
# print_r($query);
# echo "$sql<br>";

if($query){
    #Header("Location: productos.php");
    echo '<script language="javascript">';
    echo "alert('Producto registrado.');";
    echo "window.location = './productos.php';";
    echo "</script>";
} else {
    echo "Error al registrar";
}

?>