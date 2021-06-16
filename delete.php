<?php

    include("database.php");
    $con = conectar();

    $producto_id = $_GET['id'];
    $sql = "DELETE FROM producto WHERE ID_PRODUCTO='$producto_id'";
    $query = mysqli_query($con, $sql);

    if($query){
        #Header("Location: empleado.php");
        echo '<script language="javascript">';
        echo "alert('Producto eliminado correctamente.');";
        echo "window.location = './productos.php';";
        echo "</script>";
    } else {
        echo '<script language="javascript">';
        echo "alert('Error al eliminar el producto.');";
        echo "window.location = './productos.php';";
        echo "</script>";
    }

    #$sql="DELETE FROM empleado  WHERE ci_empleado='$ci_empleado'";
    #$query=mysqli_query($con,$sql);
    #if($query){
        #Header("Location: empleado.php");
    #}
?>