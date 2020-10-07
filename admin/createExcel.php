<?php 
require 'config.php';
require '../funciones.php';
require_once '../../PHPEXCEL/Classes/PHPExcel.php';

$conexion = conexion($bd_config);

$parametro = $_GET['parametro'];


$objPHPExcel = new PHPExcel();


	$sentencia = $conexion->prepare("SELECT SQL_CALC_FOUND_ROWS * FROM encuesta WHERE cod_aula=".$parametro."");
	$sentencia->execute();
	$row = $sentencia->fetchAll();

// Set document properties

    $objSheet = $objPHPExcel->setActiveSheetIndex(0);

    $objSheet->setCellValueExplicitByColumnAndRow(0, 1, 'CODIGO DE ALUMNO', PHPExcel_Cell_DataType::TYPE_STRING);
    $objSheet->setCellValueExplicitByColumnAndRow(1, 1, 'CURSO', PHPExcel_Cell_DataType::TYPE_STRING);
    $objSheet->setCellValueExplicitByColumnAndRow(2, 1, 'CODIGO DOCENTE', PHPExcel_Cell_DataType::TYPE_STRING);
    $objSheet->setCellValueExplicitByColumnAndRow(3, 1, 'AULA', PHPExcel_Cell_DataType::TYPE_STRING);
    $objSheet->setCellValueExplicitByColumnAndRow(4, 1, 'P1', PHPExcel_Cell_DataType::TYPE_STRING);
    $objSheet->setCellValueExplicitByColumnAndRow(5, 1, 'P2', PHPExcel_Cell_DataType::TYPE_STRING);
    $objSheet->setCellValueExplicitByColumnAndRow(6, 1, 'P3', PHPExcel_Cell_DataType::TYPE_STRING); 
    $objSheet->setCellValueExplicitByColumnAndRow(7, 1, 'P4', PHPExcel_Cell_DataType::TYPE_STRING);
    $objSheet->setCellValueExplicitByColumnAndRow(8, 1, 'P5', PHPExcel_Cell_DataType::TYPE_STRING);
    $objSheet->setCellValueExplicitByColumnAndRow(9, 1, 'P6', PHPExcel_Cell_DataType::TYPE_STRING);  
	$objSheet->setCellValueExplicitByColumnAndRow(10, 1, 'P7', PHPExcel_Cell_DataType::TYPE_STRING);
    $objSheet->setCellValueExplicitByColumnAndRow(11, 1, 'P8', PHPExcel_Cell_DataType::TYPE_STRING);
    $objSheet->setCellValueExplicitByColumnAndRow(12, 1, 'P9', PHPExcel_Cell_DataType::TYPE_STRING);  
	$objSheet->setCellValueExplicitByColumnAndRow(13, 1, 'P10', PHPExcel_Cell_DataType::TYPE_STRING); 
 


$i =2;

foreach ($row as $row) {
        $objSheet->setCellValueExplicitByColumnAndRow(0,$i, $row['cod_al'], PHPExcel_Cell_DataType::TYPE_STRING);
        $objSheet->setCellValueExplicitByColumnAndRow(1,$i, $row['curso'], PHPExcel_Cell_DataType::TYPE_STRING);
        $objSheet->setCellValueExplicitByColumnAndRow(2,$i, $row['cod_prof'], PHPExcel_Cell_DataType::TYPE_STRING);
        $objSheet->setCellValueExplicitByColumnAndRow(3,$i, $row['cod_aula'], PHPExcel_Cell_DataType::TYPE_STRING);
        $objSheet->setCellValueExplicitByColumnAndRow(4,$i, $row['p1'], PHPExcel_Cell_DataType::TYPE_NUMERIC);
        $objSheet->setCellValueExplicitByColumnAndRow(5,$i, $row['p2'], PHPExcel_Cell_DataType::TYPE_NUMERIC);
        $objSheet->setCellValueExplicitByColumnAndRow(6,$i, $row['p3'], PHPExcel_Cell_DataType::TYPE_NUMERIC);
        $objSheet->setCellValueExplicitByColumnAndRow(7,$i, $row['p4'], PHPExcel_Cell_DataType::TYPE_NUMERIC);
        $objSheet->setCellValueExplicitByColumnAndRow(8,$i, $row['p5'], PHPExcel_Cell_DataType::TYPE_NUMERIC);
        $objSheet->setCellValueExplicitByColumnAndRow(9,$i, $row['p6'], PHPExcel_Cell_DataType::TYPE_NUMERIC);
        $objSheet->setCellValueExplicitByColumnAndRow(10,$i, $row['p7'], PHPExcel_Cell_DataType::TYPE_NUMERIC);
        $objSheet->setCellValueExplicitByColumnAndRow(11,$i, $row['p8'], PHPExcel_Cell_DataType::TYPE_NUMERIC);
        $objSheet->setCellValueExplicitByColumnAndRow(12,$i, $row['p9'], PHPExcel_Cell_DataType::TYPE_NUMERIC);
        $objSheet->setCellValueExplicitByColumnAndRow(13,$i, $row['p10'], PHPExcel_Cell_DataType::TYPE_NUMERIC);

$i++;
}

$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('I')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('J')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('K')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('L')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('M')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('N')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->setTitle('Informe de Encuestas');
$objPHPExcel->setActiveSheetIndex(0);

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="Encuesta.xls"');
    header('Cache-Control: max-age=0');

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('php://output');
exit;

?>