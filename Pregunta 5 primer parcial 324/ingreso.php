<?php
$usuario = $_POST['usuario'];
$password = $_POST['password'];

session_start();
$_SESSION['usuario']=$usuario;
$conexion = mysqli_connect("localhost", "root", "mysql", "MIBASEMINOMBRE");
//$inc= include("conexion.php");
$consulta = "SELECT * FROM usuario where usuario = '$usuario' and password = '$password'";
$resultado = mysqli_query($conexion, $consulta);
$filas=mysqli_num_rows($resultado);
if($filas){
	header("location:home.php");

}

?>