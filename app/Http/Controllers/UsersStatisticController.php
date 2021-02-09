<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UsersStatistic;
use DB;

class UsersStatisticController extends Controller
{
    public function UsersUploadedProduction()
    {
    	$user_id 			= auth()->user()->id;
    	$UsersProduct 		= UsersStatistic::where('user_id', $user_id)->latest()->paginate(10)->fragment('პროდუქცია');
    	$NumberOfAllProduct	= UsersStatistic::where('user_id', $user_id)->get()->sum('number_of_product');
    	$AllProductPrice	= UsersStatistic::where('user_id', $user_id)->get()->sum('production_price');

		$NumberOfProduct 	= count($UsersProduct);

		return view('/dashboard')->with([
											'UsersProduct' 			=> $UsersProduct, 
											'NumberOfProduct' 		=> $NumberOfProduct,
											'NumberOfAllProduct' 	=> $NumberOfAllProduct,
											'AllProductPrice' 		=> $AllProductPrice,

										]);
    }
}
