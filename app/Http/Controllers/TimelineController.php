<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TimelineController extends Controller
{
   /**
    * Handle the incoming request.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
   public function __invoke(Request $request)
   {
      $following = Auth::user()->follows->pluck('id');
      //   whereIn('key', [1,2,3,4])
      $statuses = Auth::user()->timeline();

      return view('timeline', compact('statuses'));
   }
}
