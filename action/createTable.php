<?php
require 'PHPExcel/PHPExcel.php';

function creteTable($tableInf){
    $objPHPExcel = new PHPExcel();
    $objPHPExcel->setActiveSheetIndex(0);
    $active_sheet = $objPHPExcel->getActiveSheet();
    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    $active_sheet->setTitle("infotmation");
    $objPHPExcel->getDefaultStyle()->getFont()->setName('Arial');
    $objPHPExcel->getDefaultStyle()->getFont()->setSize(14);
    $active_sheet->getColumnDimension('B')->setWidth(20);
    $count=1;
    foreach($tableInf as $key=>$value){
        $cellA='A'.$count;
        $cellB='B'.$count;
        $active_sheet->setCellValue($cellA,$key);
        $active_sheet->setCellValue($cellB,$value);
        $count++;
    }
    $objWriter->save(str_replace(__FILE__,'table.xlsx',__FILE__));
}