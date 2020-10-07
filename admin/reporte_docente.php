<?php
require '../fpdf/fpdf.php';
require '../funciones.php';
require 'config.php';

class PDF extends FPDF
{
    // Cabecera de página
    function Header()
    {
        // Logo
        $this->Image('../images/unfv_logo.jpg',10,8,50);
        $this->Ln(20);
        // Arial bold 15
        $this->SetFont('Arial','B',25);
        // Movernos a la derecha
        $this->Cell(80);
        // Título
        $this->SetFont('Arial','I',10);
        $this->Ln(1);
        $this->Cell(0,10,utf8_decode('"Año de la universalización de la salud"'),0,0,'C');
        // Salto de línea
        $this->Ln(10);
    }

    // Pie de página
    function Footer()
    {
        // Posición: a 1,5 cm del final
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial','I',8);
        // Número de página
        $this->Cell(0,10,utf8_decode('Prolongación Camaná 1014, Lima. Telf. 7480888 Anexos: 9533, 9507, 9511, 9534, 9543                                        www.unfv.edu.pe/ceprevi'),0,0,'C');
    }
}


$cod = $_GET['cod'];
$conexion = conexion($bd_config);
$sentencia2 = $conexion->prepare("SELECT * FROM encuesta WHERE cod_prof=:codigo");
$sentencia2->execute(array(':codigo'=>$cod));
$datos = $sentencia2->fetchAll();

$t = 0;
foreach ($datos as $datos) {
    $suma = ((int)$datos['p1'] + (int)$datos['p2'] + (int)$datos['p3'] + (int)$datos['p4'] + (int)$datos['p5'] + (int)$datos['p6'] + (int)$datos['p7'] + (int)$datos['p8'] + (int)$datos['p9'] + (int)$datos['p10']);
    $operacion[$t] = $suma;
    $t++;
}   
$prom=0;
for ($i=0; $i < $t ; $i++) { 
    $prom = $prom + $operacion[$i];
}
    $realpromedio = ($prom/($t));
    
    
    $conexion = new PDO('mysql:host=localhost;dbname=encuesta','root','');
    $sentencia = $conexion->prepare("SELECT * FROM docente WHERE codigo=:codigo");
    $sentencia->execute(array(':codigo'=>$cod));
    $posts = $sentencia->fetchAll();
    $posts = $posts[0];


$fecha=strftime( "%Y-%m-%d-%H-%M-%S", time() );
// Creación del objeto de la clase heredada

  $meses = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];

    $dia = date("d");

    // -1 porque los meses en la funcion date empiezan desde el 1
    $mes = date("m") - 1;
    $year =  date("Y");

    $fecha = $dia . ' de ' . $meses[$mes] . ' del ' . $year;
$fecha="Lima, " . $dia . " de " . $meses[$mes]. " de " . $year;

$ancho=185;

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->Image('../images/logo1.jpg',150,8,50,0);
$pdf->Image('../images/linea.jpg',17,30,180,1);

$pdf->Image('../images/watermark.jpg',10,50,'');
$pdf->Image('../images/watermark.jpg',10,100,'');
$pdf->Image('../images/watermark.jpg',10,150,'');
$pdf->Image('../images/watermark.jpg',10,200,'');

$pdf->SetFont('Arial','B',25);
$pdf->Ln(10);
$pdf->Cell(0,10,utf8_decode('Reporte de Encuesta Docente'),0,1,'C');
$pdf->SetFont('Arial','',17);

$pdf->Ln(10);
$pdf->SetFont('Arial','B',17);
$pdf->Cell(0,10,$posts['nombre'],0,1,'C');
$pdf->SetFont('Arial','',17);
$pdf->Ln(10);
$pdf->Multicell($ancho,8,utf8_decode('Se presentan los datos obtenidos en la encuesta docente para actual ciclo, en donde se obtuvieron los siguientes puntajes : '),0,'J',false);
$pdf->Ln(5);


$conexion = conexion($bd_config);
$sentencia3 = $conexion->prepare("SELECT DISTINCT cod_aula FROM encuesta WHERE cod_prof=:codigo ORDER BY cod_aula ASC");
$sentencia3->execute(array(':codigo'=>$cod));
$datos2 = $sentencia3->fetchAll();

$pdf->SetFont('Arial','B',15);
$pdf->Cell(50,8,utf8_decode(''),0,0,'C');
$pdf->Cell(30,8,utf8_decode('Aula'),1,0,'C');
$pdf->Cell(55,8,utf8_decode('Puntaje Obtenido'),1,1,'C');

$pdf->SetFont('Arial','',15);
foreach ($datos2 as $datos) {
    $operacion1 = 0;
    $count = 0;
    $promedioxaula=0;

    $statement1 = $conexion->prepare("SELECT * FROM encuesta WHERE cod_prof=:codigo ORDER BY cod_aula ASC");
    $statement1->execute(array(':codigo'=>$cod));
    $vuelta = $statement1->fetchAll();

    foreach ($vuelta as $vuelta) {
        if ($datos['cod_aula'] == $vuelta['cod_aula']) {
            $suma_aula = ((int)$vuelta['p1'] + (int)$vuelta['p2'] + (int)$vuelta['p3'] + (int)$vuelta['p4'] + (int)$vuelta['p5'] + (int)$vuelta['p6'] + (int)$vuelta['p7'] + (int)$vuelta['p8'] + (int)$vuelta['p9'] + (int)$vuelta['p10']);
            $operacion1 = $operacion1 + $suma_aula;
            $count++;
        } 
    } 
    $promedioxaula = $operacion1/$count;

    $pdf->Cell(50,8,utf8_decode(''),0,0,'C');
    $pdf->Cell(30,8,$datos['cod_aula'],1,0,'C');
    $pdf->Cell(55,8,reducirDecimal($promedioxaula, 2),1,1,'C');

    
}

$pdf->SetFont('Arial','',17);
$pdf->Ln(10);
$pdf->Multicell($ancho,8,utf8_decode('Se informa que el docente obtuvo la calificación total de: '.reducirDecimal($realpromedio, 2).' como promedio en todas las aulas donde dicta clases. '),0,'J',false);

$pdf->Ln(5);

$pdf->Cell($ancho,10,$fecha,0,1,'R');
$pdf->Ln(5);




$pdf->SetFont('Arial','',15);
$pdf->Cell(175,10,utf8_decode('V°B° Dr. Pedro Vásquez García'),0,0.1,'L');

$pdf->SetFont('Arial','',13);
$pdf->Cell($ancho,10,utf8_decode('          Director de CEPREVI'),0,1,'L');

$pdf->Image('../images/linea.jpg',17,280,180,1);
$pdf->Output();
?>