<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class restapi extends Sximo  {
	
	protected $table = 'tb_restapi';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		return "  SELECT tb_restapi.* FROM tb_restapi  ";
	}	

	public static function queryWhere(  ){
		
		return "  WHERE tb_restapi.id IS NOT NULL ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
