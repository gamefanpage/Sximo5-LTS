<?php namespace App\Models;

use App\Models\Sximo;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class sbclient extends Sximo  {
	
	protected $table = 'sb_clients';
	protected $primaryKey = 'ClientID';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		return "  SELECT sb_clients.* FROM sb_clients  ";
	}	

	public static function queryWhere(  ){
		
		return "  WHERE sb_clients.ClientID IS NOT NULL ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
