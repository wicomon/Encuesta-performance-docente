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

	$statement = $conexion->prepare('UPDATE usuarios SET nombre = :nombre, pass = :pass, aula = :aula WHERE codigo = :codigo');
	$statement->execute(array(':nombre' => $nombre,':pass' => $pass,':aula' => $aula,':codigo' => $codigo));

	header("Location: " . RUTA . '/admin/alumnos.php');
}else{
	$parametro = id_articulo($_GET['codigo']);
	if (empty($parametro)) {
		//header('Location: '.RUTA.'/admin');
		echo "No existe el codigo";
	}
	$post = $conexion->query("SELECT *FROM usuarios WHERE codigo=$parametro LIMIT 1");
	$post = $post->fetchAll();

	if (!$post) {
		header('Location:'.RUTA.'/admin');
		
	}
	$post = $post[0];
}


require 'editar_alumno.view.php';
?>