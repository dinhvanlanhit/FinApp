<?php

namespace App\Exports\Dashboars;

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use App\Models\Salary;
use App\Exports\Style;
use Auth;
class SalaryExport
{
    public static function Export($excel,$Request)
    {
        $row = 1;
        $idUser = Auth::user()->id;
        $sumAmount = 0;
        if(empty($Request->dashboard_dateBegin)&&empty($Request->dashboard_dateEnd)){
            $dateLable = 'Xem Tất Cả';
            $salary = Salary::join('type_salary','type_salary.id','=','salary.idTypeSalary')
            ->where('idUser','=',$idUser)
            ->select('salary.*','type_salary.type_name')
            ->get();
            $sumAmount =Salary::join('type_salary','type_salary.id','=','salary.idTypeSalary')
            ->where('idUser','=',$idUser)->sum('amount');
        }else{
            $dateLable = $Request->dashboard_dateBegin.' đến '.$Request->dashboard_dateEnd;
            $Between = [$Request->dashboard_dateBegin,$Request->dashboard_dateEnd];
            $salary = Salary::join('type_salary','type_salary.id','=','salary.idTypeSalary')
            ->where('idUser','=',$idUser)
            ->whereBetween('date',$Between)
            ->select('salary.*','type_salary.type_name')
            ->get();
            $sumAmount =Salary::join('type_salary','type_salary.id','=','salary.idTypeSalary')
            ->whereBetween('date',$Between)
            ->where('idUser','=',$idUser)->sum('amount');
        }
        $row += 1;
        $excel->getColumnDimension('A')->setWidth(10.5);
        $excel->getColumnDimension('B')->setWidth(15.5);
        $excel->getColumnDimension('C')->setWidth(30.5);
        $excel->getColumnDimension('D')->setWidth(50.5);
        $excel->getColumnDimension('E')->setWidth(25.5);
        $excel->getColumnDimension('F')->setWidth(50.5);
        $excel->getColumnDimension('G')->setWidth(10.5);
        $excel->setCellValue('A'.$row, 'THU NHẬP');
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
        $excel->setCellValue('B'.$row,'Nhóm Thu Nhập');
        $excel->setCellValue('C'.$row,'Nơi Làm Việc');
        $excel->setCellValue('D'.$row,'Nguồn Thu');
        $excel->setCellValue('E'.$row,'Số Tiền');
        $excel->setCellValue('F'.$row,'Ghi Chú');
        $excel->setCellValue('G'.$row,'Ngày');
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
        foreach($salary as $item){
            $row++;
            $stt++;
            $excel->setCellValue('A'.$row,$stt);
            $excel->getStyle('A'.$row)->applyFromArray($styleHeaderDate);
            $excel->getStyle('A'.$row)->getAlignment()->setWrapText(true);
            $excel->setCellValue('B'.$row,$item->type_name);
            $excel->getStyle('B'.$row)->getAlignment()->setWrapText(true);
            $excel->setCellValue('C'.$row,$item->company);
            $excel->getStyle('C'.$row)->getAlignment()->setWrapText(true);
            $excel->setCellValue('D'.$row,$item->name);
            $excel->getStyle('D'.$row)->getAlignment()->setWrapText(true);
            $excel->setCellValue('E'.$row,number_format($item->amount));
            $excel->getStyle('E'.$row)->getAlignment()->setWrapText(true);
            $excel->getStyle('E'.$row)->applyFromArray($styleHeaderDate);
            $excel->setCellValue('F'.$row,$item->note);
            $excel->getStyle('F'.$row)->getAlignment()->setWrapText(true);
            $excel->setCellValue('G'.$row,$item->date);
            $excel->getStyle('G'.$row)->getAlignment()->setWrapText(true);
            $excel->getStyle('G'.$row)->applyFromArray($styleHeaderDate);
        }
        $row+=1;
        $excel->setCellValue('E'.$row,'Tổng Tiền : '.number_format($sumAmount).' VNĐ');
        $excel->getStyle('E'.$row)->applyFromArray($styleHeaderDate);

        return $excel;
    }
}