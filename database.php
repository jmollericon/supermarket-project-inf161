<!-- <?php

$server = 'localhost';
$username = 'root';
$password = 'kdrew';
$database = 'proyecto';

try {
  $conn = new PDO("mysql:host=$server;dbname=$database;", $username, $password);
} catch (PDOException $e) {
  die('Connection Failed: ' . $e->getMessage());
}

?> -->

<?php
function conectar(){
    $host="localhost";
    $user="root";
    $pass="kdrew";

    $bd="proyecto";

    $con=mysqli_connect($host,$user,$pass);

    mysqli_select_db($con,$bd);

    return $con;
}
?>