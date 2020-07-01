<?php

namespace App\Http\Controllers\App;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Event;
use App\Models\Shopping;
use App\Models\Salary;
use App\Models\Cost;
use App\Models\Invest;
use App\Models\Lendloan;
use App\Models\Debt;
use App\Models\Asset;
use App\Models\TypeCost;
use App\Models\TypeEvent;
use App\Models\TypeSalary;
use App\Models\TypeShopping;
use Excel;
use Auth;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithDrawings;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
use App\Exports\DashboardExport;

class DashboardController extends Controller
{
   
    public function Dashboard(Request $Request)
    {
      
        $Between =  [date('Y-m-01'), date("Y-m-t")];
        $data=array(
            'sumEvent'=>$this->sumEvent($Between),
            'sumShopping'=>$this->sumShopping($Between),
            'sumCost'=>$this->sumCost($Between),
            'sumSalary'=>$this->sumSalary($Between),
        );
        return view(template().".pages.dashboard.dashboard",$data);
    }
    public function getDashboard(Request $Request)
    {
        $Between =  [$Request->dateBegin, $Request->dateEnd];
        $dataChart = array(
            [
                'name'=>'Sự Kiện',
                'value'=>$this->sumEvent($Between),
            ],
            [
                'name'=>'Mua Sắm',
                'value'=>$this->sumShopping($Between),
            ],
            [
                'name'=>'Chi Tiêu',
                'value'=>$this->sumCost($Between),
            ],
            [
                'name'=>'Thu Nhập',
                'value'=>$this->sumSalary($Between),
            ],
            [
                'name'=>'Đầu Tư',
                'value'=>$this->sumInvest($Between),
            ],
            [
                'name'=>'Cho Vay',
                'value'=>$this->sumLendloan($Between),
            ],
            [
                'name'=>'Nợ',
                'value'=>$this->sumDebt($Between),
            ],
        );
        $lable = ['Sự Kiện','Mua Sắm','Chi Tiêu','Thu Nhập','Đầu Tư','Cho Vay','Nợ'];
        $color = ['#007bff','#28a745','#ffc107','#dc3545','#32CCBC','#AA5777','#7367F0'];
        $data=array(
            'sumEvent'=>$this->sumEvent($Between),
            'sumShopping'=>$this->sumShopping($Between),
            'sumCost'=>$this->sumCost($Between),
            'sumSalary'=>$this->sumSalary($Between),
            'sumInvest'=>$this->sumInvest($Between),
            'sumLendloan'=>$this->sumLendloan($Between),
            'sumDebt'=>$this->sumDebt($Between),
            'sumAsset'=>$this->sumAsset($Between),
            'sumTotal'=>null,
            'data'=>$dataChart,
            'lable'=>$lable,
            'color'=>$color,
        );
        return JSON1($data);
    }
    public function sumEvent($Between)
    {
        $idUser = idUser();
        if(!empty($Between[0])||!empty($Between[1])){
            return Event::where('idUser','=',$idUser)->whereBetween('date',$Between)->sum('amount');
        }else{
            return Event::where('idUser','=',$idUser)->sum('amount');
        }
        
    }
    public function sumShopping($Between)
    {
        $idUser = idUser();
        if(!empty($Between[0])||!empty($Between[1])){
            return Shopping::where('idUser','=',$idUser)->whereBetween('date',$Between)->sum('amount');
        }else{
            return Shopping::where('idUser','=',$idUser)->sum('amount');
        }
       
    }
    public function sumCost($Between)
    {
       
        $idUser = idUser();
        if(!empty($Between[0])||!empty($Between[1])){
            return Cost::where('idUser','=',$idUser)->whereBetween('date',$Between)->sum('amount');
        }else{
            return Cost::where('idUser','=',$idUser)->sum('amount');
        }
    }
    public function sumSalary($Between)
    {
       
        $idUser = idUser();
        if(!empty($Between[0])||!empty($Between[1])){
            return Salary::where('idUser','=',$idUser)->whereBetween('date',$Between)->sum('amount');
        }else{
            return Salary::where('idUser','=',$idUser)->sum('amount');
        }
    }
    public function sumInvest($Between){
        $idUser = idUser();
        if(!empty($Between[0])||!empty($Between[1])){
            return Invest::where('idUser','=',$idUser)->whereBetween('date',$Between)->sum('amount');
        }else{
            return Invest::where('idUser','=',$idUser)->sum('amount');
        }
    }
    public function sumLendloan($Between){
        $idUser = idUser();
        if(!empty($Between[0])||!empty($Between[1])){
            return Lendloan::where('idUser','=',$idUser)->whereBetween('date',$Between)->sum('amount');
        }else{
            return Lendloan::where('idUser','=',$idUser)->sum('amount');
        }
    }
    public function sumDebt($Between){
        $idUser = idUser();
        if(!empty($Between[0])||!empty($Between[1])){
            return Debt::where('idUser','=',$idUser)->whereBetween('date',$Between)->sum('amount');
        }else{
            return Debt::where('idUser','=',$idUser)->sum('amount');
        }
    }
    public function sumAsset($Between){
        $idUser = idUser();
        return Asset::where('idUser','=',$idUser)->sum('amount')+surplus();
        
    }

    public function getCharDashboard(Request $Request)
    {
        $idUser = idUser();
        $Between =  [$Request->dateBegin, $Request->dateEnd];
        $type = $Request->type;
        if($type=='event'){
           return $this->chartEvent($idUser,$Between);
        }else if($type=='shopping'){
            return $this->chartShopping($idUser,$Between);
        }else if($type=='cost'){
            return $this->chartCost($idUser,$Between);
        }else if($type=='salary'){
            return $this->chartSalary($idUser,$Between);
        }
    }
    public function chartEvent($idUser,$Between)
    {
        $TypeEvent = TypeEvent::get();
        $data = array();
        $color = array();
        $lable = array();
        if(!empty($Between[0])||!empty($Between[1])){
            $sumTotal = Event::where('idUser','=',$idUser)
            ->whereBetween('date',$Between)->sum('amount');
            foreach($TypeEvent as $item){
                $addRow['value'] = Event::where('idUser','=',$idUser)
                ->where('idTypeEvent','=',$item->id)
                ->whereBetween('date',$Between)->sum('amount');
                $addRow['name']= $item->type_name;
    
                $data[] = $addRow;
                $color[]=$item->color;
                $lable[]=$item->type_name;
            }
        }
        else{
            $sumTotal = Event::where('idUser','=',$idUser)->sum('amount');
            foreach($TypeEvent as $item){
                $addRow['value'] = Event::where('idUser','=',$idUser)
                ->where('idTypeEvent','=',$item->id)->sum('amount');
                $addRow['name']= $item->type_name;
                $data[] = $addRow;
                $color[]=$item->color;
                $lable[]=$item->type_name;
            }
        }
        return JSON1(array(
            'sumTotal'=>$sumTotal,
            'lable'=>$lable,
            'color'=>$color,
            'data'=> $data
        ));
    }
    public function chartShopping($idUser,$Between)
    {
        $TypeShopping = TypeShopping::get();
        $data = array();
        $color = array();
        $lable = array();
        if(!empty($Between[0])||!empty($Between[1])){
            $sumTotal = Shopping::where('idUser','=',$idUser)
            ->whereBetween('date',$Between)->sum('amount');
            foreach($TypeShopping as $item){
                $addRow['value'] = Shopping::where('idUser','=',$idUser)
                ->where('idTypeShopping','=',$item->id)
                ->whereBetween('date',$Between)->sum('amount');
                $addRow['name']= $item->type_name;
    
                $data[] = $addRow;
                $color[]=$item->color;
                $lable[]=$item->type_name;
            }
        }
        else{
            $sumTotal = Shopping::where('idUser','=',$idUser)->sum('amount');
            foreach($TypeShopping as $item){
                $addRow['value'] = Shopping::where('idUser','=',$idUser)
                ->where('idTypeShopping','=',$item->id)->sum('amount');
                $addRow['name']= $item->type_name;
                $data[] = $addRow;
                $color[]=$item->color;
                $lable[]=$item->type_name;
            }
        }
        return JSON1(array(
            'sumTotal'=>$sumTotal,
            'lable'=>$lable,
            'color'=>$color,
            'data'=> $data
        ));
    }
    public function chartCost($idUser,$Between)
    {
        $TypeCost = TypeCost::get();
        $data = array();
        $color = array();
        $lable = array();
        if(!empty($Between[0])||!empty($Between[1])){
            $sumTotal = Cost::where('idUser','=',$idUser)
            ->whereBetween('date',$Between)->sum('amount');
            foreach($TypeCost as $item){
                $addRow['value'] = Cost::where('idUser','=',$idUser)
                ->where('idTypeCost','=',$item->id)
                ->whereBetween('date',$Between)->sum('amount');
                $addRow['name']= $item->type_name;
    
                $data[] = $addRow;
                $color[]=$item->color;
                $lable[]=$item->type_name;
            }
        }
        else{
            $sumTotal = Cost::where('idUser','=',$idUser)->sum('amount');
            foreach($TypeCost as $item){
                $addRow['value'] = Cost::where('idUser','=',$idUser)
                ->where('idTypeCost','=',$item->id)->sum('amount');
                $addRow['name']= $item->type_name;
                $data[] = $addRow;
                $color[]=$item->color;
                $lable[]=$item->type_name;
            }
        }
        return JSON1(array(
            'sumTotal'=>$sumTotal,
            'lable'=>$lable,
            'color'=>$color,
            'data'=> $data
        ));
    }
    public function chartSalary($idUser,$Between)
    {
        $TypeSalary = TypeSalary::get();
        $data = array();
        $color = array();
        $lable = array();
        if(!empty($Between[0])||!empty($Between[1])){
            $sumTotal = Salary::where('idUser','=',$idUser)
            ->whereBetween('date',$Between)->sum('amount');
            foreach($TypeSalary as $item){
                $addRow['value'] = Salary::where('idUser','=',$idUser)
                ->where('idTypeSalary','=',$item->id)
                ->whereBetween('date',$Between)->sum('amount');
                $addRow['name']= $item->type_name;
    
                $data[] = $addRow;
                $color[]=$item->color;
                $lable[]=$item->type_name;
            }
        }
        else{
            $sumTotal = Salary::where('idUser','=',$idUser)->sum('amount');
            foreach($TypeSalary as $item){
                $addRow['value'] = Salary::where('idUser','=',$idUser)
                ->where('idTypeSalary','=',$item->id)->sum('amount');
                $addRow['name']= $item->type_name;
                $data[] = $addRow;
                $color[]=$item->color;
                $lable[]=$item->type_name;
            }
        }
        return JSON1(array(
            'sumTotal'=>$sumTotal,
            'lable'=>$lable,
            'color'=>$color,
            'data'=> $data
        ));
    }
    public function postExport (Request $Request)
    {
        return DashboardExport::Export($Request);
    }
    

}