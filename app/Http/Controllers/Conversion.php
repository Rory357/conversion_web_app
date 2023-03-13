<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class Conversion extends Controller
{
    public function index() {
        $users = DB::select('select * from conversions');
        return view('conversion_view',['users'=>$users]);
    }

    public function convertMetricToImperial() {

        $fromValue = $_POST['fromVal'];
        $fromUnit = $_POST['fromUnit'];
        $toUnit = $_POST['toUnit'];

        $arr = array(
            "cm to in"=>"* 0.39",
            "cm to m"=>"/ 100",
            "cm to km"=>"/ 100000",
            "cm to ft"=>"/ 30.48",
            "cm to mi"=>"/ 160900",
            "m to cm"=>"* 100",
            "m to in"=>"* 39.37",
            "m to km"=>"/ 1000",
            "m to ft"=>"* 3.281",
            "m to mi"=>"/ 1609",
            "km to ft"=>"* 3281",
            "km to in"=>"* 3937",
            "km to m"=>"* 1000",
            "km to cm"=>"* 100000",
            "km to mi"=>"/ 1.609",
            "ft to cm"=>"* 30,48",
            "ft to km"=>"/ 3281",
            "ft to m"=>"/ 3.281",
            "ft to in"=>"* 12",
            "ft to mi"=>"/ 5280",
            "in to cm"=>"* 2.54",
            "in to m"=>"* 100",
            "in to km"=>"/ 39370",
            "in to ft"=>"/ 12",
            "in to mi"=>"/ 63360",
            "mi to km"=>"* 1.609",
            "mi to cm"=>"* 160900",
            "mi to m"=>"* 1609",
            "mi to ft"=>"* 5280",
            "mi to in"=>"* 63360",
            "C to F"=>"+ 32",
            "F to C"=>"/ 1.8",
        );

        $toString = $fromUnit." to ".$toUnit;

        foreach($arr as $key=>$val){

            if($key == $toString){


                // $intString = int($val);

                if($key == "C to F"){

                    $fromValue = $fromValue * 1.8;


                }
                elseif($key == "F to C"){
                    $fromValue = $fromValue - 32;

                }



                $value = $fromValue.$val;
                eval('$value = (' . $value. ');');

                echo $value;
                // $value = $fromValue.$val;
            }

        }
    }

}
