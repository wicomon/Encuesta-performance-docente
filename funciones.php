<?php 

function conexion($bd_config){
	try {
	$conexion = new PDO('mysql:host=localhost;dbname='.$bd_config['basedatos'],$bd_config['usuario'],$bd_config['pass']);
	return $conexion;
	} catch (PDOException $e) {
		
	}
}

function limpiarDatos($datos){
	$datos = trim($datos);
	$datos = stripslashes($datos);
	$datos = htmlspecialchars($datos);
	return $datos;
}

function traerDatos(){
	$conexion = new PDO('mysql:host=localhost;dbname=encuesta','root','ceprevi2020');
	$statement = $conexion->prepare("SELECT *FROM usuarios WHERE codigo=:codigo");
	$statement->execute(array(':codigo'=>$_SESSION['usuario']));
	$resultado = $statement->fetch();
	return $resultado;
}

function id_articulo($id){
	return (int)limpiarDatos($id);
}


function traerPreguntas(){
	$conexion = new PDO('mysql:host=localhost;dbname=encuesta','root','ceprevi2020');
	$statement = $conexion->prepare("SELECT *FROM preguntas ");
	$statement->execute();
	$resultado = $statement->fetchAll();
	return $resultado;
}

function obtener_post_por_id($conexion, $id){
	$resultado = $conexion->query("SELECT *FROM preguntas WHERE id=$id LIMIT 1");
	$resultado = $resultado->fetchAll();
	return ($resultado) ? $resultado : false;
}

function pagina_actual(){
	return isset($_GET['p']) ? (int)$_GET['p'] : 1;
}

function obtener_post($conexion){
	$sentencia = $conexion->prepare("SELECT SQL_CALC_FOUND_ROWS * FROM encuesta");
	$sentencia->execute();
	return $sentencia->fetchAll();
}

function obtener_preguntas($conexion){
	$sentencia = $conexion->prepare("SELECT SQL_CALC_FOUND_ROWS * FROM preguntas");
	$sentencia->execute();
	return $sentencia->fetchAll();
}

function obtener_post_profesor($conexion,$cod_prof){
	$sentencia = $conexion->prepare("SELECT SQL_CALC_FOUND_ROWS * FROM encuesta WHERE cod_prof=$cod_prof");
	$sentencia->execute();
	return $sentencia->fetchAll();
}
function obtener_post_alumno($conexion,$cod_alumno){
	$sentencia = $conexion->prepare("SELECT SQL_CALC_FOUND_ROWS * FROM encuesta WHERE codigo=$cod_alumno");
	$sentencia->execute();
	return $sentencia->fetchAll();
}
function obtener_post_curso($conexion,$cod_curso){
	$sentencia = $conexion->prepare("SELECT SQL_CALC_FOUND_ROWS * FROM encuesta WHERE curso=$cod_curso");
	$sentencia->execute();
	return $sentencia->fetchAll();
}

function prueba($aula,$cursito){
	$conexion = new PDO('mysql:host=localhost;dbname=encuesta','root','');
	$statement = $conexion->prepare('SELECT *FROM aula INNER JOIN docente ON aula.cod_prof=docente.codigo WHERE aula.codigo=:aula AND docente.curso=:curso');
	$statement->execute(array(':aula'=>$aula,':curso'=>$cursito));
	$resultado = $statement->fetchAll();
	return $resultado;
}

function nombreCurso($curso){
	if ($curso=='algebra') {$resultado='Álgebra';}if ($curso=='aritmetica') {$resultado='Aritmética';}if ($curso=='biologia') {$resultado='Biología';}
	if ($curso=='fisica') {$resultado='Física';}if ($curso=='geografia') {$resultado='Geografía';}if ($curso=='geometria') {$resultado='Geometría';}
	if ($curso=='hp') {$resultado='Historia del Perú';}if ($curso=='hu') {$resultado='Historia Universal';}if ($curso=='lenguaje') {$resultado='Lenguaje';}
	if ($curso=='literatura') {$resultado='Literatura';}if ($curso=='psicologia') {$resultado='Psicología';}if ($curso=='quimica') {$resultado='Química';}
	if ($curso=='rm') {$resultado='Raz. Matemático';}if ($curso=='rv') {$resultado='Raz. Verbal';}if ($curso=='trigonometria') {$resultado='Trigonometría';}
	return $resultado;
}

function reducirDecimal($number, $digitos)
{
	$raiz = 10;
	$multiplicador = pow ($raiz,$digitos);
	$resultado = ((int)($number * $multiplicador)) / $multiplicador;
	return number_format($resultado, $digitos);
}
?>