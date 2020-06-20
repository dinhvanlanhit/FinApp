<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Event;
use App\Models\Shopping;
use App\Models\Salary;
use App\Models\Cost;

use App\Models\TypeCost;
use App\Models\TypeEvent;
use App\Models\TypeSalary;
use Auth;
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
    public function postDashboard(Request $Request)
    {
        $Between =  [$Request->dateBegin, $Request->dateEnd];
        $data=array(
            'sumEvent'=>$this->sumEvent($Between),
            'sumShopping'=>$this->sumShopping($Between),
            'sumCost'=>$this->sumCost($Between),
            'sumSalary'=>$this->sumSalary($Between),
        );
        return JSON1($data);
    }
    public function sumEvent($Between)
    {
        $idUser = Auth::user()->id;
        return Event::where('idUser','=',$idUser)->whereBetween('date',$Between)->sum('amount');
    }
    public function sumShopping($Between)
    {
        $idUser = Auth::user()->id;
        return Shopping::where('idUser','=',$idUser)->whereBetween('date',$Between)->sum('amount');
    }
    public function sumCost($Between)
    {
        $idUser = Auth::user()->id;
        return Cost::where('idUser','=',$idUser)->whereBetween('date',$Between)->sum('amount');
    }
    public function sumSalary($Between)
    {
        $idUser = Auth::user()->id;
        return Salary::where('idUser','=',$idUser)->whereBetween('date',$Between)->sum('amount');
    }
    public function getCharEvent(Request $Request)
    {
        $idUser = Auth::user()->id;
        $Between =  [$Request->dateBegin, $Request->dateEnd];
        $TypeEvent = TypeEvent::get();
        $data = array();
        $color = array();
        $lable = array();
        if(!empty($Request->dateBegin)||!empty($Request->dateEnd)){
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
        // dd($data);
    }
    

}