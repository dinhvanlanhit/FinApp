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
class DashboardExport
{
    public static function Export($Request)
    {

     
        $spreadsheet = new Spreadsheet();
        $excel = $spreadsheet->getActiveSheet();
        $SheetEvent = new \PhpOffice\PhpSpreadsheet\Worksheet\Worksheet($spreadsheet, 'SỰ KIỆN');
        $excel = $spreadsheet->addSheet($SheetEvent, 0);
        $excel = EventExport::Export($excel,$Request);
        $SheetShopping = new \PhpOffice\PhpSpreadsheet\Worksheet\Worksheet($spreadsheet, 'MUA SẮM');
        $excel = $spreadsheet->addSheet($SheetShopping,1);
        $excel = ShoppingExport::Export($excel,$Request);
        $SheetCost = new \PhpOffice\PhpSpreadsheet\Worksheet\Worksheet($spreadsheet, 'CHI TIÊU');
        $excel = $spreadsheet->addSheet($SheetCost,2);
        $excel = CostExport::Export($excel,$Request);
        $SheetSalary = new \PhpOffice\PhpSpreadsheet\Worksheet\Worksheet($spreadsheet, 'THU NHẬP');
        $excel = $spreadsheet->addSheet($SheetSalary,3);
        $excel = SalaryExport::Export($excel,$Request);
 


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
            'name' => "Fin-App",
        );
        die(json_encode($response));
    }
    

}