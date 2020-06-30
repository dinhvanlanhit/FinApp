<?php

namespace App\Exports;

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use App\Exports\Dashboars\EventExport;
use App\Exports\Dashboars\ShoppingExport;
use App\Exports\Dashboars\CostExport;
use App\Exports\Dashboars\SalaryExport;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
class MyEventExport
{
    public static function Export($Request)
    {

     
        $spreadsheet = new Spreadsheet();
        $excel = $spreadsheet->getActiveSheet();

        $row = 1;
        $excel->getColumnDimension('A')->setWidth(10.5);
        $excel->getColumnDimension('B')->setWidth(15.5);
        $excel->getColumnDimension('C')->setWidth(30.5);
        $excel->getColumnDimension('D')->setWidth(50.5);
        $excel->getColumnDimension('E')->setWidth(25.5);
        $excel->getColumnDimension('F')->setWidth(10.5);
        $excel->getColumnDimension('G')->setWidth(50.5);

        $excel->setCellValue('A'.$row, 'SỰ KIỆN');
        $excel->mergeCells('A'.$row.':G'.$row);

        $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
        ob_start();
        $writer->save('php://output');
        $xlsData = ob_get_contents();
        ob_end_clean();
        $response =  array(
            'statusBoolen'=>true,
            'icon'=>'success',
            'messages'=>'Xuất Thành Công',
            'file' => "data:application/vnd.ms-excel;base64," . base64_encode($xlsData),
            'name' => "Sự Kiện Của Tôi",
        );
        die(json_encode($response));
    }
    

}