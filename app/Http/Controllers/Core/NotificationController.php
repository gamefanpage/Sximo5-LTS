<?php namespace App\Http\Controllers\Core;

use App\Http\Controllers\controller;

class NotificationController extends Controller {

	public function __construct()
	{

	}	

	public function getIndex()
	{
		$result = \DB::table('tb_notification')->where('userid',\Session::get('uid'))->where('is_read','0')->get();
		return view('core.notification.index');

	}

	public function getLoad()
	{	
		$result = \DB::table('tb_notification')->where('userid',\Session::get('uid'))->where('is_read','0')->get();

		$data = array();
		foreach($result as $row)
		{
			$data[] = array(
					'url'	=> $row->url,
					'title'	=> $row->note ,
					'icon'	=> $row->icon,
					'date'	=> date("d/m/y",strtotime($row->created))
				);
		}
	
		$data = array(
			'total'	=> count($result) ,
			'note'	=> $data
			);	
		 return response()->json($data);	
	}

}