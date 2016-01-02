<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class sbproject extends Sximo  {
	
	protected $table = 'sb_projects';
	protected $primaryKey = 'ProjectID';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		return "  SELECT sb_projects.*,sb_clients.* 
	FROM sb_projects 
 LEFT JOIN sb_clients ON sb_projects.ClientID = sb_clients.ClientID ";
	}	

	public static function queryWhere(  ){
		
		return "  WHERE sb_projects.ProjectID IS NOT NULL ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
