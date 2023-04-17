<?php
$departamento = $_POST['departamento'];

session_start();
$_SESSION['departamento']=$departamento;
$conexion = mysqli_connect("localhost", "root", "mysql", "MIBASEMINOMBRE");
//$inc= include("conexion.php");
$consulta = "SELECT AVG(DISTINCT nota) as notap FROM(SELECT inscripcion.NOTAFINAL nota FROM inscripcion, (SELECT * FROM PERSONA where departamento = '$departamento')tmp WHERE inscripcion.CIESTUDIANTE=tmp.ci)tmp2;";
$resultado = mysqli_query($conexion, $consulta);
if($resultado){
	while($row = $resultado -> fetch_array()){
		$notap = $row['notap'];
		?>
			<div>
				<b>DEPARTAMENTO: </b><?php echo $departamento; ?><br></br>
				<b>NOTA: </b><?php echo $notap; ?><br></br>
			</div>
		<?php
	}
}

?>