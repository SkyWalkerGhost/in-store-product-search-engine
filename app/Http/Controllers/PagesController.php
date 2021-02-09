<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Jenssegers\Agent\Agent;
use DB;


class PagesController extends Controller
{
    public function welcome()
    {
   
    	return view('/welcome');
    }


}
