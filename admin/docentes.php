<?php session_start();

require 'config.php';
require '../funciones.php';


$conexion = conexion($bd_config);

$resultado = traerDatos();

if (!isset($_SESSION['usuario']) OR $_SESSION['usuario'] !== '666') {
	header('Location: '.RUTA);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$sentencia = $conexion->prepare("SELECT * FROM docente WHERE codigo='".$_POST['cod_docente']."'");
	$sentencia->execute();
	$posts = $sentencia->fetchAll();
}

	
    
   
	
	
	
	
require 'header_admin.php';

require 'docentes.view.php';

?>

