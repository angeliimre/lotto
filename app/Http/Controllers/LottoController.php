<?php

namespace App\Http\Controllers;

use App\Models\Lotto;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LottoController extends Controller
{
    function add(Request $r){
        Validator::extend('check_exists',function($attribute,$value,$parameters,$validator){
            $yearweek=date('YW',strtotime($value));

            $d=Lotto::take(1)->first();

            if($yearweek<=date("YW",strtotime($d->date))){
                return false;
            }
            return true;
        });
        Validator::extend('check_unique',function($attribute,$value,$parameters,$validator) use ($r){
            $index=intval(ltrim($attribute,"nr"));
            for($i=1;$i<$index;$i++){
                $seged="nr$i";
                if($r->$seged==$value){
                    return false;
                }
            }
            return true;
        });

        $validator=Validator::make($r->all(),[
            'date'=>'required|date|check_exists',
            'nr1'=>'required',
            'nr2'=>'required|check_unique',
            'nr3'=>'required|check_unique',
            'nr4'=>'required|check_unique',
            'nr5'=>'required|check_unique'
        ],[
            'date.check_exists'=>'A dátum nem lehet korábbi, mint az előző húzás hetéé',
            'check_unique'=>'A :attribute számnak egyedi értékűnek kell lenni',
            '*.required'=>'Minden mező kitöltése kötelező!'
        ]);
        if($validator->fails()){
            //dd($validator->errors()->all());
            return redirect()->back()->withInput()->withErrors($validator);
        }
        $validated=$validator->validated();

        $lotto=new Lotto;
        $lotto->date=$validated['date'];
        $lotto->week=date("W",strtotime($validated['date']));
        $lotto->year=date("Y",strtotime($validated['date']));

        $lotto->nr1=$validated['nr1'];
        $lotto->nr2=$validated['nr2'];
        $lotto->nr3=$validated['nr3'];
        $lotto->nr4=$validated['nr4'];
        $lotto->nr5=$validated['nr5'];
        $lotto->save();
        return redirect()->back()->with("success","sikeres mentés");
    }
}
