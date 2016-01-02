<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class sbticket extends Sximo  {
	
	protected $table = 'sb_tickets';
	protected $primaryKey = 'TicketID';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		return "  SELECT sb_tickets.* FROM sb_tickets  ";
	}	

	public static function queryWhere(  ){
		
		return "  WHERE sb_tickets.TicketID IS NOT NULL ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
