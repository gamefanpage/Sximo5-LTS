<?php namespace App\Http\Controllers;

use App\Http\Controllers;
use Illuminate\Http\Request;


class SximoapiController extends Controller {

	public function __construct( Request $request)
	{
		parent::__construct();
		$model = ucwords($request->input('module'));
		$model = '\\App\\Models\\'.$model;
		$this->model = new $model();	

	}

	public function index( Request $request)
	{		
		$check = self::authentication( $request);
		if(is_array($check))
		{
			return \Response::json($check);
		} else {

			$class 			= ucwords($request->input('module'));
		  	$config	 		= $this->model->makeInfo( $class );	

		  	$tables 		= $config['config']['grid'];

		  	$page 			= (!is_null($request->input('page')) or $request->input('page') != 0 ) ? $request->input('page') : 1 ;		
			$param			= array('page'=> $page , 'sort'=>'', 'order'=>'asc','limit'=>''  );
			if(!is_null($request->input('limit')) or $request->input('limit') != 0 ) $param['limit'] = $request->input('limit');
			if(!is_null($request->input('order'))) $param['order'] = $request->input('order');
			if(!is_null($request->input('sort'))) $param['sort'] = $request->input('sort');	
			
						
				
			$results 		= 	$this->model->getRows( $param ); 

			$json = array();
			foreach($results['rows'] as $row)
			{
				$rows = array();
				foreach($tables as $table)
				{				
					$conn = (isset($table['conn']) ? $table['conn'] : array() );
					$rows[$table['field']] = \SiteHelpers::gridDisplay($row->$table['field'],$table['field'],$conn)	;		
					//$rows[$table['field']] = '';				
					
				}
				$json[] = $rows;

			}


			$jsonData = array(
				'total'		=> $results['total'],
				'rows'		=> $json ,
				'control'	=> $param ,
				'key'		=> $config['key']

			);

			if(!is_null($request->input('option')) && $request->input('option') =='true')
			{
				$label = array();	
				foreach($tables as $table)
				{
					$label[] = $table['label'];
				}	
				
				$field = array();	
				foreach($tables as $table)
				{
					$field[] = $table['field'];
				}
				$jsonData['option'] = array(
						'label'	=> $label ,
						'field'	=> $field
					);			

			}


			return \Response::json($jsonData,200);

		}	
	}

	public function show( Request $request, $id )
	{	

		$check = self::authentication( $request);
		if(is_array($check))
			return \Response::json($check);
		

		$class 			= ucwords($request->input('module'));
	  	$config	 		= 	$this->model->makeInfo( $class );	
	  	$tables 		=	$config['config']['grid'];			
		$jsonData 			= 	$this->model->getRow( $id );
		return \Response::json($jsonData,200);

	}


	public function store( Request $request )
	{

		$check = self::authentication( $request);
		if(is_array($check))
			return \Response::json($check);

		$class 			= ucwords($request->input('module'));
		$this->info		= 	$this->model->makeInfo( $class );	
		$data 			= $this->validatePost($this->info['table']);
		exit;
		unset($data['entry_by']);
		$id 			= $this->model->insertRow($data , '' );		

		return \Response::json(array('data'=> 'success'),200);
	}

	public function update( Request $request, $id  )
	{

		$check = self::authentication( $request);
		if(is_array($check))
			return \Response::json($check);

		$class 			= ucwords($request->input('module'));
		$this->info		= 	$this->model->makeInfo( $class );	
		$data 			= $this->validatePost($this->info['key']);
		unset($data['entry_by']);
		$id 			= $this->model->insertRow($data , $id );		

		return \Response::json(array('data'=> 'success'),200);
	}

	public function destroy( Request $request, $id )
	{
		$check = self::authentication( $request);
		if(is_array($check))
			return \Response::json($check);
		

		$class     = ucwords($request->input('module'));
		$results   =	$this->model->find($id);
		if(is_null($results))
		{
				return \Response::json("not found",404);
		}
		 
		$success	=	$results->delete();
		 
		if(!$success)
		{
			return \Response::json("error deleting",500);
		}
		 
		return \Response::json("success",200);

	}		

	public static function authentication( $request )
	{

		if(is_null($request->input('module'))) 
				return array(array('status'=>'error','message'=>' Please Define Module Name to accessed '),400);		
					
			if(!isset($_SERVER['PHP_AUTH_USER']) && !isset($_SERVER['PHP_AUTH_PW']))
			{
		        return array([
		            'error' => true,
		            'message' => 'Not authenticated',
		            'code' => 401], 401
		        );		
			} else {
				
				$user = $_SERVER['PHP_AUTH_USER'];
				$key = $_SERVER['PHP_AUTH_PW'];
				
				$auth = \DB::table('tb_restapi')
						->join('tb_users', 'tb_users.id', '=', 'tb_restapi.apiuser')
						->where('apikey',"$key")->where("email","$user")->get();

				
				if(count($auth) <=0 )
				{
					 return array([
						'error' => true,
						'message' => 'Invalid authenticated params !',
						'code' => 401], 401
					);	
				}  else {
				
					$row = $auth[0];
					$modules = explode(',',str_replace(" ","",$row->modules));
					if(!in_array($request->input('module'), $modules))
					{				
						 return array([
							'error' => true,
							'message' => 'You Dont Have Authorization Access!',
							'code' => 401], 401
						);				
					} 		
				
				}
			}			
	}				

}