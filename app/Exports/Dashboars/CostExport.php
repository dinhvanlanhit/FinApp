<?php

namespace App\Exports\Dashboars;

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use App\Models\Cost;
use App\Exports\Style;
use Auth;
class CostExport
{
    public static function Export($excel,$Request)
    {
        $row = 1;
        $idUser = Auth::user()->id;
        $sumAmount = 0;
        if(empty($Request->dashboard_dateBegin)&&empty($Request->dashboard_dateEnd)){
            $dateLable = 'Xem Tất Cả';
            $cost = Cost::join('type_cost','type_cost.id','=','cost.idTypeCost')
            ->where('idUser','=',$idUser)
            ->select('cost.*','type_cost.type_name')
            ->get();
            $sumAmount =Cost::join('type_cost','type_cost.id','=','cost.idTypeCost')
            ->where('idUser','=',$idUser)->sum('amount');
        }else{
            $dateLable = $Request->dashboard_dateBegin.' đến '.$Request->dashboard_dateEnd;
            $Between = [$Request->dashboard_dateBegin,$Request->dashboard_dateEnd];
            $cost = Cost::join('type_cost','type_cost.id','=','cost.idTypeCost')
            ->where('idUser','=',$idUser)
            ->whereBetween('date',$Between)
            ->select('cost.*','type_cost.type_name')
            ->get();
            $sumAmount =Cost::join('type_cost','type_cost.id','=','cost.idTypeCost')
            ->whereBetween('date',$Between)
            ->where('idUser','=',$idUser)->sum('amount');
        }
        $row += 1;
        $excel->getColumnDimension('A')->setWidth(10.5);
        $excel->getColumnDimension('B')->setWidth(15.5);
        $excel->getColumnDimension('C')->setWidth(30.5);
        $excel->getColumnDimension('D')->setWidth(50.5);
        $excel->getColumnDimension('E')->setWidth(25.5);
        $excel->getColumnDimension('F')->setWidth(10.5);
        $excel->getColumnDimension('G')->setWidth(50.5);
        $excel->setCellValue('A'.$row, 'CHI TIÊU');
        $excel->mergeCells('A'.$row.':G'.$row);
        $row += 1;
        $excel->setCellValue('A'.$row,'Tổng số tiền : '.number_format($sumAmount).'VNĐ');
        $excel->mergeCells('A'.$row.':C'.$row);
        $row += 1;
        $excel->setCellValue('A'.$row,'Ngày : '.$dateLable);
        $excel->mergeCells('A'.$row.':C'.$row);
        $styleHeaderDate = array('alignment' => array(
            'vertical' =>Alignment::VERTICAL_CENTER,
            'horizontal' =>Alignment::HORIZONTAL_CENTER,
            'font' => [
                'bold' => true,
                'size' =>50
            ],
        ));
        $row += 1;
        $excel->setCellValue('A'.$row,'STT');
        $excel->setCellValue('B'.$row,'Nhóm Chi Phí');
        $excel->setCellValue('C'.$row,'Ghi Chú');
        $excel->setCellValue('D'.$row,'Số Tiền');
        $excel->setCellValue('E'.$row,'Ngày');
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
        foreach($cost as $item){
            $row++;
            $stt++;
            $excel->setCellValue('A'.$row,$stt);
            $excel->getStyle('A'.$row)->applyFromArray($styleHeaderDate);
            $excel->getStyle('A'.$row)->getAlignment()->setWrapText(true);
            $excel->setCellValue('B'.$row,$item->type_name);
            $excel->getStyle('B'.$row)->getAlignment()->setWrapText(true);
            $excel->setCellValue('C'.$row,$item->note);
            $excel->getStyle('C'.$row)->getAlignment()->setWrapText(true);
            $excel->setCellValue('D'.$row,number_format($item->amount));
            $excel->getStyle('D'.$row)->getAlignment()->setWrapText(true);
            $excel->getStyle('D'.$row)->applyFromArray($styleHeaderDate);
            $excel->setCellValue('E'.$row,$item->date);
            $excel->getStyle('E'.$row)->getAlignment()->setWrapText(true);
            $excel->getStyle('E'.$row)->applyFromArray($styleHeaderDate);
        }
        $row+=1;
        $excel->setCellValue('D'.$row,'Tổng Tiền : '.number_format($sumAmount).' VNĐ');
        $excel->getStyle('D'.$row)->applyFromArray($styleHeaderDate);

        return $excel;
    }
}