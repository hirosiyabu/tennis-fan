<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SeizaController extends Controller
{
  function index() {
    return view('seiza');
  }
  function calc(Request $request) {
    $month = $request->month;
    $day = $request->day;
    //	星座名	時期
    //	水瓶座	1/20～2/18
    //	魚座/	2/19～3/20
    //	牡羊座/　3/21～4/19
    //	牡牛座/	4/20～5/20
    //	双子座/　5/21～6/21
    //	蟹座/	6/22～7/22
    //	獅子座/　7/23～8/22
    //	乙女座/　8/23～9/22
    //	天秤座/　9/23～10/23
    //	蠍座/　　10/24～11/21
    //	射手座/　11/22～12/21
    //	山羊座/	12/22～1/19
 
  if (($month == 1 && $day >= 20) || ($month == 2 && $day <= 18)){
     $seiza = "水瓶座";
  }
  elseif (($month == 2 && $day >= 19) || ($month == 3 && $day <= 20)){
     $seiza = "魚座";
  }
  elseif (($month == 3 && $day >= 21) || ($month == 4 && $day <= 19)){
     $seiza = "牡羊座";
  }
  elseif (($month == 4 && $day >= 20) || ($month == 5 && $day <= 20)){
     $seiza = "牡牛座";
  }
  elseif (($month == 5 && $day >= 21) || ($month == 6 && $day <= 21)){
     $seiza = "双子座";
  }
  elseif (($month == 6 && $day >= 22) || ($month == 7 && $day <= 22)){
     $seiza = "蟹座";
  }
  elseif (($month == 7 && $day >= 23) || ($month == 8 && $day <= 22)){
     $seiza = "獅子座";
  }
  elseif (($month == 8 && $day >= 23) || ($month == 9 && $day <= 22)){
     $seiza = "乙女座";
  }
  elseif (($month == 9 && $day >= 23) || ($month == 10 && $day <= 23)){
     $seiza = "天秤座";
  }
  elseif (($month == 10 && $day >= 24) || ($month == 11 && $day <= 21)){
     $seiza = "蠍座";
  }
  elseif (($month == 11 && $day >= 22) || ($month == 12 && $day <= 21)){
     $seiza = "射手座";
  }
  else{
     $seiza = "山羊座";
  }
    return view('seiza', ['seiza' => $seiza]);
  }
}
