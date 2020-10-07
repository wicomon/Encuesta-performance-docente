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
	$id = limpiarDatos($_POST['id']);
	$texto = $_POST['texto'];

	$statement = $conexion->prepare('UPDATE preguntas SET texto = :texto WHERE id = :id');
	$statement->execute(array(':texto' => $texto,':id' => $id));

	header("Location: " . RUTA . '/admin/preguntas.php');
}else{
	$id_articulo = id_articulo($_GET['id']);
	if (empty($id_articulo)) {
		//header('Location: '.RUTA.'/admin');
		echo "id articulo vacio";
	}
	$post = obtener_post_por_id($conexion,$id_articulo);
	if (!$post) {
		//header('Location:'.RUTA.'/admin');
		echo "post vacio";

	}
	$post = $post[0];
}


require 'editar_pregunta.view.php';
?>