<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class {class} extends Sximo  {
	
	protected $table = '{table}';
	protected $primaryKey = '{key}';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		return " {sql_select} ";
	}	

	public static function queryWhere(  ){
		
		return " {sql_where} ";
	}
	
	public static function queryGroup(){
		return " {sql_group} ";
	}
	

}
