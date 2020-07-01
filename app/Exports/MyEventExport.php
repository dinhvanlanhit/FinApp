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

        $excel->setCellValue('A'.$row, 'SỰ KIỆN CỦA TÔI');
        $excel->mergeCells('A'.$row.':G'.$row);

        $excel->setCellValue('A'.$row,'STT');
        $excel->setCellValue('B'.$row,'Sự Kiện');
        $excel->setCellValue('C'.$row,'Tên');
        $excel->setCellValue('D'.$row,'Địa Chỉ');
        $excel->setCellValue('E'.$row,'Số Tiền');
        $excel->setCellValue('F'.$row,'Ngày');
        $excel->setCellValue('G'.$row,'Ghi Chú');
        $styleHeaderTitle = array('alignment' => array(
            'vertical' =>Alignment::VERTICAL_CENTER,
            'horizontal' =>Alignment::HORIZONTAL_CENTER,
            'font' => [
                'bold' => true,
                'size' =>50
            ],
        ));
        $excel->getStyle('A'.$row.':G'.$row)->applyFromArray($styleHeaderTitle);
        $stt = 0;
        foreach($event as $item){
            $row++;
            $stt++;
            $excel->setCellValue('A'.$row,$stt);
            $excel->getStyle('A'.$row)->applyFromArray($styleHeaderDate);
            $excel->getStyle('A'.$row)->getAlignment()->setWrapText(true);
            $excel->setCellValue('B'.$row,$item->type_name);
            $excel->getStyle('B'.$row)->getAlignment()->setWrapText(true);
            $excel->setCellValue('C'.$row,$item->name);
            $excel->getStyle('C'.$row)->getAlignment()->setWrapText(true);
            $excel->setCellValue('D'.$row,$item->address);
            $excel->getStyle('D'.$row)->getAlignment()->setWrapText(true);
            $excel->setCellValue('E'.$row,number_format($item->amount));
            $excel->getStyle('E'.$row)->getAlignment()->setWrapText(true);
            $excel->getStyle('E'.$row)->applyFromArray($styleHeaderDate);
            $excel->setCellValue('F'.$row,$item->date);
            $excel->getStyle('F'.$row)->getAlignment()->setWrapText(true);
            $excel->setCellValue('G'.$row,$item->note);
            $excel->getStyle('G'.$row)->getAlignment()->setWrapText(true);
            $excel->getStyle('G'.$row)->applyFromArray($styleHeaderDate);
        }
        $row+=1;
        $excel->setCellValue('E'.$row,'Tổng Tiền : '.number_format($sumAmount).' VNĐ');
        $excel->getStyle('E'.$row)->applyFromArray($styleHeaderDate);
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