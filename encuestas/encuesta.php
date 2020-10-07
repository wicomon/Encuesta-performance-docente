<?php 
session_start(); 
require '../funciones.php';
require '../admin/config.php';


$conexion = conexion($bd_config);
$resultado = traerDatos();
$pregunta = traerPreguntas();

$parametro = $_GET['parametro'];



if (!isset($_SESSION['usuario'])) {
	header('Location: index.php');
}

$aula_resultado = prueba($resultado['aula'],$parametro);

$aula_resultado = $aula_resultado[0];

if ($parametro == 'rm') {$n_curso = 'Razonamiento Matemático';}if ($parametro == 'rv') {$n_curso = 'Razonamiento Verbal';}if ($parametro == 'algebra') {$n_curso = 'Algebra';}if ($parametro == 'aritmetica') {$n_curso = 'Aritmetica';} if ($parametro == 'geometria') {$n_curso = 'Geometría';} if ($parametro == 'trigonometria') {$n_curso = 'Trigonometría';} if ($parametro == 'biologia') {$n_curso = 'Biología';} if ($parametro == 'quimica') {$n_curso = 'Química';} if ($parametro == 'fisica') {$n_curso = 'Física';} if ($parametro == 'lenguaje') {$n_curso = 'Lenguaje';}if ($parametro == 'literatura') {$n_curso = 'Literatura';}if ($parametro == 'geografia') {$n_curso = 'Geografía';} if ($parametro == 'psicologia') {$n_curso = 'Psicología';} if ($parametro == 'hp') {$n_curso = 'Historia del Peru';} if ($parametro == 'hu') {$n_curso = 'Historia Universal';}

if ($_SERVER['REQUEST_METHOD'] == 'POST' ) {
	$cod_al = (int)$_POST['cod_al'];
	$cod_prof = $_POST['cod_prof'];
	$curso = $_POST['curso'];
	$cod_aula = $_POST['cod_aula'];
	$p1 = (int)$_POST['p1'];
	$p2 = (int)$_POST['p2'];
	$p3 = (int)$_POST['p3'];
	$p4 = (int)$_POST['p4'];
	$p5 = (int)$_POST['p5'];
	$p6 = (int)$_POST['p6'];
	$p7 = (int)$_POST['p7'];
	$p8 = (int)$_POST['p8'];
	$p9 = (int)$_POST['p9'];
	$p10 = (int)$_POST['p10'];

	$statement = $conexion->prepare('INSERT INTO encuesta (id, cod_al, cod_prof, curso,cod_aula, p1, p2, p3, p4, p5, p6, p7, p8, p9, p10,estado) VALUES (null, :cod_al, :cod_prof, :curso, :cod_aula, :p1, :p2, :p3, :p4, :p5, :p6, :p7, :p8, :p9, :p10, :estado)');
	$statement->execute(array(':cod_al'=>$cod_al,':cod_prof'=>$cod_prof,':curso'=>$curso, ':cod_aula'=>$cod_aula, ':p1'=>$p1,':p2'=>$p2,':p3'=>$p3,':p4'=>$p4,':p5'=>$p5,':p6'=>$p6,':p7'=>$p7,':p8'=>$p8,':p9'=>$p9,':p10'=>$p10,':estado'=>1));
header('Location: ../menu.php');
}

require '../header.php';
require '../views/encuesta.view.php'; 
?>