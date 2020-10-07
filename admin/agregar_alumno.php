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

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	// Limpiamos los datos para evitar que el usuario inyecte codigo.
	$codigo = limpiarDatos($_POST['codigo']);
	$nombre = $_POST['nombre'];
	$aula = $_POST['aula'];
	$pass = $_POST['pass'];

	$statement = $conexion->prepare('INSERT INTO usuarios (codigo, pass, nombre, aula) VALUES (:codigo, :pass, :nombre, :aula)');
	$statement->execute(array(':nombre' => $nombre,':pass' => $pass,':aula' => $aula,':codigo' => $codigo));

	header("Location: " . RUTA . '/admin/alumnos.php');
}


require 'agregar_alumno.view.php';
?>
