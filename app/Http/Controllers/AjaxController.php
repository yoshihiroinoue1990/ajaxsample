<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Prefecture;

class AjaxController extends Controller
{
    public function index(){
        return view('ajax.index');
    }
    
    public function create(Request $request){
        return view('ajax.index');
    }
    
    public function selectPrefecture(Request $request){
        $arr_prefectures = Prefecture::where('area_id', $request->area)->get();
        $arrOption = array();
        foreach($arr_prefectures as $prefecture){
            array_push($arrOption,'<option value="'.$prefecture['id'].'">'.$prefecture['prefecture_name'].'</option>');
           // $html .= '<option value="'.$prefecture['id'].'">'.$prefecture['prefecture_name'].'</option>';
        }
        return $arrOption;
    }
}


