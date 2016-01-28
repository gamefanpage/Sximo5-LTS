<?php namespace App\Models\Sximo;

use App\Models\Sximo;

class Module extends Sximo {

	protected $table = 'tb_module';
	protected $primaryKey = 'module_id';

	public function __construct()
	{
		parent::__construct ();


	}

}