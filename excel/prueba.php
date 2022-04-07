<?php


require 'vendor/autoload.php';
require_once "../conexion/conexion.php";
$id = $_GET["id"];
$des = $lote = $cad = $client = "";
$id_cli = 0;

$sql = "SELECT descripcion, lote, fecha_cad, id_cliente FROM producto WHERE id_producto = $id";
$result = $link->query($sql);

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    $des = $row["descripcion"];
    $lote = $row["lote"];
    $cad = $row['fecha_cad'];
    $id_cli = $row['id_cliente'];
  }
}

$sql = "SELECT nom_cliente FROM cliente WHERE id_cliente = $id_cli";
$result = $link->query($sql);

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    $client = $row["nom_cliente"];
  }
}

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;

$spreadsheet = new Spreadsheet();
$spreadsheet->getDefaultStyle()->getFont()->setName('Arial');
//$spreadsheet->getDefaultStyle()->getFont()->setSize(50);
$sheet = $spreadsheet->getActiveSheet();

$styleArray = [
    'borders' => [
        'outline' => [
            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK,
            'color' => ['argb' => '000000'],
        ],
    ],
];



$drawing = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();
$drawing->setName('Paid');
$drawing->setDescription('Paid');
$drawing->setPath('../img/logo2.png');
$drawing->setCoordinates('F1');
$drawing->setWidthAndHeight(300, 350);
$drawing->setOffsetX(10);
$drawing->setRotation(0);
$drawing->getShadow()->setVisible(true);
$drawing->getShadow()->setDirection(10);
$drawing->setWorksheet($spreadsheet->getActiveSheet());

$sheet->getStyle('A8:M11')->applyFromArray($styleArray);
$spreadsheet->getActiveSheet()->getStyle('A8:M11')
    ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('A8:M11')
    ->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('A8:M11')
    ->getFont()->setSize(50);
$sheet->mergeCells('A8:M11');
$sheet->setCellValue('A8', ''.$client);

$sheet->getStyle('A13:M16')->applyFromArray($styleArray);
$spreadsheet->getActiveSheet()->getStyle('A13:M16')
    ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('A13:M16')
    ->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('A13:M16')
    ->getFont()->setSize(40);
$sheet->mergeCells('A13:M16');
$sheet->setCellValue('A13', ''.$des);

$sheet->getStyle('A18:M33')->applyFromArray($styleArray);
$spreadsheet->getActiveSheet()->getStyle('A18:M33')
    ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('A18:M33')
    ->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('A18:M33')
    ->getFont()->setSize(60);
$sheet->mergeCells('A18:M25');
$sheet->setCellValue('A18', 'L - '.$lote);
$sheet->mergeCells('A26:M33');
$sheet->setCellValue('A26', 'CAD: '.$cad);

header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="'.$des.' L: '.$lote.'.xls"');
header('Cache-Control: max-age=0');

$writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xls');
$writer->save('php://output');

/*header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="Identificacion.xlsx"');
header('Cache-Control: max-age=0');
$writer =IOFactory::createWriter($spreadsheet, 'Xlsx');
$writer->save('php://output');*/
/*
$writer = new Xlsx($spreadsheet);
$writer->save('Identificacion.xlsx');*/