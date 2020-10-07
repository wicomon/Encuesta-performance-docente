<?php session_start();
require 'config.php';
require '../funciones.php';


$conexion=conexion($bd_config);

if (!$conexion) {
	header('Location: '.RUTA);
}

if (!isset($_SESSION['usuario']) OR $_SESSION['usuario'] !== '666') {
	header('Location: '.RUTA);
}

$cod = $_GET['codigo'];
$sentencia = $conexion->prepare('SELECT * FROM docente WHERE codigo = :codigo');
$sentencia->execute(array(':codigo' => $cod));
$post = $sentencia->fetch();

	$sentencia1 = $conexion->prepare("SELECT DISTINCT curso FROM docente ORDER BY nombre");
	$sentencia1->execute();
	$posts1 = $sentencia1->fetchAll();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	// Limpiamos los datos para evitar que el usuario inyecte codigo.
	$codigo = limpiarDatos($_POST['codigo']);
	$nombre = $_POST['nombre'];
	$curso = $_POST['curso'];

	$statement = $conexion->prepare('UPDATE docente SET codigo = :codigo, nombre = :nombre, curso = :curso WHERE codigo = :codigo');
	$statement->execute(array(':nombre' => $nombre, ':curso' => $curso,':codigo' => $codigo));

	header("Location: " . RUTA . '/admin/docentes.php');
}


require 'editar_docente.view.php';
?>