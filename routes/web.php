<?php

use App\Http\Controllers\LottoController;
use Illuminate\Support\Facades\Route;
use App\Models\Lotto;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/add', function () {
    return view("/add");
});

Route::post("/add",[LottoController::class,"add"]);

Route::get('/', function () {
    
    //you need to recomment this section for the first time running

    /*
    $data=file_get_contents(storage_path("/data.txt"));
    $rows=explode("\n",$data);
    foreach($rows as $row){
        $cols=explode("\t",$row);
        
        $lotto=new Lotto;
        $lotto->year=intval($cols[0]);
        $lotto->week=intval($cols[1]);
        $lotto->date=$cols[2]?$cols[2]:null;
        for($i=1;$i<6;$i++){
            $fieldname="nr$i";
            $lotto->$fieldname=$cols[$i+10];
        }
        $lotto->save();
    }*/

    $result=[];
    for($i=1;$i<6;$i++){
        $field=Lotto::select("nr$i")->get()->pluck("nr$i")->toarray();
        $result=array_merge($result,$field);
    }

    $result=array_count_values($result);

    arsort($result);

    return view("/welcome")->with("result",$result);
});
