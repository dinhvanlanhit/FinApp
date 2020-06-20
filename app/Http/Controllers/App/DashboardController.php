<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Event;
use App\Models\Shopping;
use App\Models\Salary;
use App\Models\Cost;
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
    

}