<?php namespace App\Http\Controllers\sximo;

use App\Http\Controllers\controller;
use App\Groups;
use Illuminate\Http\Request;
use Validator, Input, Redirect; 



class DashboardController extends Controller {

	public function __construct()
	{
		//$this->middleware('auth');
	}

	public function getIndex( Request $request )
	{

		return view('dashboard.index');
	}	


}