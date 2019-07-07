<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BmiController extends Controller
{
  function index() {
    return view('bmi');
  }
  function calc(Request $request) {
    $height = $request->height/100;
    $weight = $request->weight;
    $bmi = round($weight/($height*$height),1);
    if($bmi < 18.5){
      $bodytype = "痩せ型";
    }
    elseif($bmi > 25){
      $bodytype = "肥満";
    }else{
      $bodytype = "標準";
    }
    return view('bmi', ['bmi' => $bmi,'bodytype' => $bodytype]);
  }
}
