<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$server = 'localhost';
$username = 'root';
$password = 'root'; #'kdrew';
$database = 'inf161_proyecto'; #'proyecto';

try {
  $conn = new PDO("mysql:host=$server;dbname=$database;", $username, $password);
} catch (PDOException $e) {
  die('Connection Failed: ' . $e->getMessage());
}

?>

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