<?php session_start();

require 'config.php';
require '../funciones.php';


$conexion = conexion($bd_config);

$resultado = traerDatos();

if (!isset($_SESSION['usuario']) OR $_SESSION['usuario'] !== '666') {
	header('Location: '.RUTA);
}

$posts = obtener_post($conexion);



require 'header_admin.php';
require 'lista_encuestas.view.php';


?>