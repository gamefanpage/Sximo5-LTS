<?php namespace App\Library;

use Illuminate\Pagination\LengthAwarePaginator as Paginator;
class PublicHelpers 
{
	protected $Models;
	protected $class;

	public function __construct( $models , $class)
	{
		
		$this->models = $models ;
		$this->class = $class ;
		$this->conf = array() ;		


	}

	static public function init( $models , $class , $conf = array())
	{
		$task = \Input::get('task');
		switch($task)
		{
			default:

			   $config	 	= 	$models->makeInfo( $class );				  
		        extract( array_merge( array(
					'limit'  	=> 10 ,
					'sort' 		=>  $config['key'] ,
					'order' 	=> 'asc' ,
					'params' 	=> '' ,

		        ), $conf ));
				
				
					
				$data = array();
					
				$page = \Input::get('page', 1);
				$sort = (!is_null(\Input::get('sort')) ? \Input::get('sort') : $sort); 
				$order = (!is_null(\Input::get('order')) ? \Input::get('order') : $order );		
				$params = array(
					'page'		=> $page ,
					'limit'		=> (!is_null(\Input::get('rows')) ? filter_var(\Input::get('rows'),FILTER_VALIDATE_INT) : $limit) ,
					'sort'		=> $sort ,
					'order'		=> $order,

				);
					
				$results 	= 	$models->getRows($params );
				$data['key']				=  $config['key'];
				$data['rowData']		= $results['rows'];
				$data['tableGrid'] 		= $config['config']['grid'];
				
				$page = $page >= 1 && filter_var($page, FILTER_VALIDATE_INT) !== false ? $page : 1;	
				$pagination = new Paginator($results['rows'], $results['total'],$params['limit']);
				$pagination->setPath($class);		
				$data['pagination']	= $pagination;
				// Build pager number and append current param GET
				// Row grid Number 
				$data['i']			= ($page * $params['limit'])- $params['limit']; 	
					
				return view('public.index',$data);	

				break;
				
			case 'view':

				$id = \Input::get('id');
				$results = 	$models->getRow($id );
				if(count($results)>=1)
				{
					$config	 = 	$models->makeInfo( $class );
					$data['tableGrid'] 		= $config['config']['grid'];
					$data['row']		= $results;
				
					return view('public.view',$data);	
				} else {
					return "NO PAGE FOUND !";
				}

				break;			
		}
	
	}
}