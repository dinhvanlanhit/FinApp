<?php

namespace App\Exports\Dashboars;

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use App\Models\Shopping;
use App\Exports\Style;
use Auth;
class ShoppingExport
{
    public static function Export($excel,$Request)
    {
        $row = 1;
        $idUser = Auth::user()->id;
        $sumAmount = 0;
        if(empty($Request->dashboard_dateBegin)&&empty($Request->dashboard_dateEnd)){
            $dateLable = 'Xem Tất Cả';
            $shopping = Shopping::join('type_shopping','type_shopping.id','=','shopping.idTypeShopping')
            ->where('idUser','=',$idUser)
            ->select('shopping.*','type_shopping.type_name')
            ->get();
            $sumAmount =Shopping::join('type_shopping','type_shopping.id','=','shopping.idTypeShopping')
            ->where('idUser','=',$idUser)->sum('amount');
        }else{
            $dateLable = $Request->dashboard_dateBegin.' đến '.$Request->dashboard_dateEnd;
            $Between = [$Request->dashboard_dateBegin,$Request->dashboard_dateEnd];
            $shopping = Shopping::join('type_shopping','type_shopping.id','=','shopping.idTypeShopping')
            ->where('idUser','=',$idUser)
            ->whereBetween('date',$Between)
            ->select('shopping.*','type_shopping.type_name')
            ->get();
            $sumAmount =Shopping::join('type_shopping','type_shopping.id','=','shopping.idTypeShopping')
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
        $excel->setCellValue('A'.$row, 'MUA SẮM');
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
        $excel->setCellValue('B'.$row,'Nhóm Mua Sắm');
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
        foreach($shopping as $item){
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

        return $excel;
    }
}