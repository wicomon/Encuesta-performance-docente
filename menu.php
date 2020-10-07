<?php session_start(); 
require 'funciones.php';
require 'admin/config.php';

conexion($bd_config);

$resultado = traerDatos();

if (!isset($_SESSION['usuario'])) {
	header('Location: index.php');
}


	$conexion = new PDO('mysql:host=localhost;dbname=encuesta','root','ceprevi2020');
	$statement = $conexion->prepare("SELECT *FROM encuesta WHERE cod_al=:codigo");
	$statement->execute(array(':codigo'=>$_SESSION['usuario']));
	$comprobante = $statement->fetchAll();


$i=0;



foreach ($comprobante as $comprobante) {

	if ($comprobante['curso'] =='rm') {
		$c_rm=1;
	}
	if ($comprobante['curso'] =='rv') {
		$c_rv=1;
	}
	if ($comprobante['curso'] =='aritmetica') {
		$c_aritmetica=1;
	}
	if ($comprobante['curso'] =='geometria') {
		$c_geometria=1;
	}
	if ($comprobante['curso'] =='algebra') {
		$c_algebra=1;
	}
	if ($comprobante['curso'] =='trigonometria') {
		$c_trigonometria=1;
	}
	if ($comprobante['curso'] =='biologia') {
		$c_biologia=1;
	}
	if ($comprobante['curso'] =='quimica') {
		$c_quimica=1;
	}
	if ($comprobante['curso'] =='fisica') {
		$c_fisica=1;
	}
	if ($comprobante['curso'] =='lenguaje') {
		$c_lenguaje=1;
	}
	if ($comprobante['curso'] =='literatura') {
		$c_literatura=1;
	}
	if ($comprobante['curso'] =='geografia') {
		$c_geografia=1;
	}
	if ($comprobante['curso'] =='psicologia') {
		$c_psicologia=1;
	}
	if ($comprobante['curso'] =='hp') {
		$c_hp=1;
	}
	if ($comprobante['curso'] =='hu') {
		$c_hu=1;
	}
	$i++;
}


require 'header.php';
require 'views/menu.view.php';
?>
