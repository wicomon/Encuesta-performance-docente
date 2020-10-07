<?php session_start();

require 'config.php';
require '../funciones.php';


$conexion = conexion($bd_config);

$resultado = traerDatos();

if (!isset($_SESSION['usuario']) OR $_SESSION['usuario'] !== '666') {
	header('Location: '.RUTA);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$sentencia = $conexion->prepare("SELECT SQL_CALC_FOUND_ROWS * FROM encuesta WHERE cod_aula=".$_POST['nro_aula']."");
	$sentencia->execute();
	$posts = $sentencia->fetchAll();
}


require 'header_admin.php';

require 'lista_encuestas_aula.view.php';

?>

