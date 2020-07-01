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
use App\Models\GroupMyEvent;
use App\Models\MyEvent;
use App\Models\TypeEvent;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
class MyEventExport
{
    public static function Export($Request)
    {

        $idUser = idUser();
        $idGroupMyEvent = $Request->input('idGroupMyEvent');
        $search = $Request->input('search');
        if(!empty($idGroupMyEvent)){
            $MyEvent = MyEvent::join('group_my_event','group_my_event.id','=','my_event.idGroupMyEvent')
            ->where('my_event.idUser','=',$idUser)->where('my_event.idGroupMyEvent','=',$idGroupMyEvent)
            ->select('my_event.*','group_my_event.group_name')
            ->Where(function($query)use($search){
                $query->where('my_event.id', 'LIKE', "%{$search}%")
                ->orWhere('my_event.name', 'LIKE',"%{$search}%")
                ->orWhere('my_event.status_name', 'LIKE',"%{$search}%")
                ->orWhere('my_event.address', 'LIKE',"%{$search}%")
                ->orWhere('my_event.amount','LIKE',"%{$search}%")
                ->orWhere('my_event.note','LIKE',"%{$search}%")
                ->orWhere('my_event.date','LIKE',"%{$search}%");
            })->get();
        }else{
            $MyEvent = MyEvent::join('group_my_event','group_my_event.id','=','my_event.idGroupMyEvent')
            ->where('my_event.idUser','=',$idUser)
            ->select('my_event.*','group_my_event.group_name')
            ->Where(function($query)use($search){
                $query->where('my_event.id', 'LIKE', "%{$search}%")
                ->orWhere('my_event.name', 'LIKE',"%{$search}%")
                ->orWhere('my_event.status_name', 'LIKE',"%{$search}%")
                ->orWhere('my_event.address', 'LIKE',"%{$search}%")
                ->orWhere('my_event.amount','LIKE',"%{$search}%")
                ->orWhere('my_event.note','LIKE',"%{$search}%")
                ->orWhere('my_event.date','LIKE',"%{$search}%");
            })->get();
        }
        $sumAmount =$MyEvent->sum('amount');
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
        $row += 1;
        if(!empty($idGroupMyEvent)){
            $GroupMyEvent = GroupMyEvent::find($idGroupMyEvent);
            $excel->setCellValue('A'.$row, 'SỰ KIỆN : '.$GroupMyEvent->group_name);
            $excel->mergeCells('A'.$row.':G'.$row);
            $row += 1;
            $excel->setCellValue('A'.$row, 'NGÀY TỔ CHỨC : '.$GroupMyEvent->date);
            $excel->mergeCells('A'.$row.':G'.$row);
            $row += 1;
            $excel->setCellValue('A'.$row, 'GHI CHÚ : '.$GroupMyEvent->note);
            $excel->mergeCells('A'.$row.':G'.$row);
            $row += 1;
        }
        $excel->setCellValue('A'.$row, 'TỔNG TIỀN : '.number_format($sumAmount).' VNĐ');
        $excel->mergeCells('A'.$row.':G'.$row);
        $row += 1;
        $excel->setCellValue('A'.$row,'STT');
        $excel->setCellValue('B'.$row,'Sự Kiện');
        $excel->setCellValue('C'.$row,'Tên');
        $excel->setCellValue('D'.$row,'Địa Chỉ');
        $excel->setCellValue('E'.$row,'Số Tiền');
        $excel->setCellValue('F'.$row,'Ngày');
        $excel->setCellValue('G'.$row,'Ghi Chú');
        $excel->setCellValue('H'.$row,'Trạng Thái');
        $styleHeaderTitle = array('alignment' => array(
            'vertical' =>Alignment::VERTICAL_CENTER,
            'horizontal' =>Alignment::HORIZONTAL_CENTER,
            'font' => [
                'bold' => true,
                'size' =>50
            ],
        ));
        $styleHeaderDate = array('alignment' => array(
            'vertical' =>Alignment::VERTICAL_CENTER,
            'horizontal' =>Alignment::HORIZONTAL_CENTER,
            'font' => [
                'bold' => true,
                'size' =>50
            ],
        ));
        $excel->getStyle('A'.$row.':G'.$row)->applyFromArray($styleHeaderTitle);
        $stt = 0;
        foreach($MyEvent as $item){
            $row++;
            $stt++;
            $excel->setCellValue('A'.$row,$stt);
            $excel->getStyle('A'.$row)->applyFromArray($styleHeaderDate);
            $excel->getStyle('A'.$row)->getAlignment()->setWrapText(true);
            $excel->setCellValue('B'.$row,$item->group_name);
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
            $excel->setCellValue('H'.$row,$item->status_name);
            $excel->getStyle('H'.$row)->applyFromArray($styleHeaderDate);
            $excel->getStyle('H'.$row)->getAlignment()->setWrapText(true);
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