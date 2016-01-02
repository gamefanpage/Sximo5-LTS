<?php namespace App\Http\Controllers;

use App\Http\Controllers\controller;
use App\Models\Sbticket;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator as Paginator;
use Validator, Input, Redirect ; 

class SbticketController extends Controller {

	protected $layout = "layouts.main";
	protected $data = array();	
	public $module = 'sbticket';
	static $per_page	= '10';
	
	public function __construct() 
	{
		parent::__construct();
		$this->model = new Sbticket();
		
		$this->info = $this->model->makeInfo( $this->module);
		$this->access = $this->model->validAccess($this->info['id']);
	
		$this->data = array(
			'pageTitle'			=> 	$this->info['title'],
			'pageNote'			=>  $this->info['note'],
			'pageModule'		=> 'sbticket',
			'pageUrl'			=>  url('sbticket'),
			'return' 			=> 	self::returnUrl()	
		);
		
			
				
	} 

	public static function display( )
	{
		
		if(!\Auth::check())
			return '<p class="text-center alert alert-danger">Please Login to submit Ticket </p>';
		$data = array();
		$task = \Input::get('view');
		if($task !='')
		{
			$rest = \DB::table('sb_tickets')->where('TicketID',$task)->get();
			if( count($rest) >=1)
			{
				
				$data['row'] = $rest[0];

				return view('sbticket.displayreply',$data);					

			} else {
				echo 'No Ticket Found !';
			}

		} else {
			$data = array();
			$data['mytickets'] = \DB::table('sb_tickets')->where('entry_by',\Session::get('uid'))->orderby('Created','desc')->get();
			return view('sbticket.display',$data);		
		}	
	}
	
	public function getIndex()
	{
		if($this->access['is_view'] ==0) 
			return Redirect::to('dashboard')->with('messagetext',\Lang::get('core.note_restric'))->with('msgstatus','error');
				
		$this->data['access']		= $this->access;	
		return view('sbticket.index',$this->data);
	}	

	public function postData( Request $request)
	{ 
		$sort = (!is_null($request->input('sort')) ? $request->input('sort') : $this->info['setting']['orderby']); 
		$order = (!is_null($request->input('order')) ? $request->input('order') : $this->info['setting']['ordertype']);
		// End Filter sort and order for query 
		// Filter Search for query		
		$filter = (!is_null($request->input('search')) ? $this->buildSearch() : '');

		
		$page = $request->input('page', 1);
		$params = array(
			'page'		=> $page ,
			'limit'		=> (!is_null($request->input('rows')) ? filter_var($request->input('rows'),FILTER_VALIDATE_INT) : $this->info['setting']['perpage'] ) ,
			'sort'		=> $sort ,
			'order'		=> $order,
			'params'	=> $filter,
			'global'	=> (isset($this->access['is_global']) ? $this->access['is_global'] : 0 )
		);
		// Get Query 
		$results = $this->model->getRows( $params );		
		
		// Build pagination setting
		$page = $page >= 1 && filter_var($page, FILTER_VALIDATE_INT) !== false ? $page : 1;	
		$pagination = new Paginator($results['rows'], $results['total'], $params['limit']);	
		$pagination->setPath('sbticket/data');
		
		$this->data['param']		= $params;
		$this->data['rowData']		= $results['rows'];
		// Build Pagination 
		$this->data['pagination']	= $pagination;
		// Build pager number and append current param GET
		$this->data['pager'] 		= $this->injectPaginate();	
		// Row grid Number 
		$this->data['i']			= ($page * $params['limit'])- $params['limit']; 
		// Grid Configuration 
		$this->data['tableGrid'] 	= $this->info['config']['grid'];
		$this->data['tableForm'] 	= $this->info['config']['forms'];
		$this->data['colspan'] 		= \SiteHelpers::viewColSpan($this->info['config']['grid']);		
		// Group users permission
		$this->data['access']		= $this->access;
		// Detail from master if any
		$this->data['setting'] 		= $this->info['setting'];
		
		// Master detail link if any 
		$this->data['subgrid']	= (isset($this->info['config']['subgrid']) ? $this->info['config']['subgrid'] : array()); 
		// Render into template
		return view('sbticket.table',$this->data);

	}

			
	function getUpdate(Request $request, $id = null)
	{

		if($id =='')
		{
			if($this->access['is_add'] ==0 )
			return Redirect::to('dashboard')->with('messagetext',\Lang::get('core.note_restric'))->with('msgstatus','error');
		}	
		
		if($id !='')
		{
			if($this->access['is_edit'] ==0 )
			return Redirect::to('dashboard')->with('messagetext',\Lang::get('core.note_restric'))->with('msgstatus','error');
		}				
				
		$row = $this->model->find($id);
		if($row)
		{
			$this->data['row'] 		=  $row;
		} else {
			$this->data['row'] 		= $this->model->getColumnTable('sb_tickets'); 
		}
		$this->data['setting'] 		= $this->info['setting'];
		$this->data['fields'] 		=  \AjaxHelpers::fieldLang($this->info['config']['forms']);
		
		$this->data['id'] = $id;



		return view('sbticket.form',$this->data);
	}	

	public function getShow( $id = null)
	{
	
		if($this->access['is_detail'] ==0) 
			return Redirect::to('dashboard')
				->with('messagetext', Lang::get('core.note_restric'))->with('msgstatus','error');
					
		$row = $this->model->getRow($id);
		if($row)
		{
			$this->data['row'] =  $row;
		} else {
			$this->data['row'] = $this->model->getColumnTable('sb_tickets'); 
		}
		
		$this->data['id'] = $id;
		$this->data['access']		= $this->access;
		$this->data['setting'] 		= $this->info['setting'];
		$this->data['fields'] 		= \AjaxHelpers::fieldLang($this->info['config']['forms']);
		$this->data['Comments']		= \DB::table('sb_ticketcomments')->where('TicketID',$id)->get();
		return view('sbticket.view',$this->data);	
	}	

	public function getComment( Request $request , $id = 0)
	{
		$this->data['Comments']		= \DB::select("
			SELECT sb_ticketcomments.* ,CONCAT(first_name,' ',last_name) AS author ,avatar , email   FROM sb_ticketcomments
			LEFT JOIN tb_users ON tb_users.id = sb_ticketcomments.UserID
			WHERE TicketID ='".$id."' ORDER BY Posted ASC
			");
	
		$this->data['TicketID'] = $id;
		return view('sbticket.reply',$this->data);		
	}

	public function postSavereply(  Request $request ){
		$data = array(
			'TicketID' 	=> $request->input('TicketID'),
			'Comments'	=> $request->input('comments'),
			'Posted'	=> date("Y-m-d H:i:s"),
			'UserID'	=> \Session::get('uid')
		);	
			\DB::table('sb_ticketcomments')->insert($data);

		return response()->json(array(
			'status'=>'success',
			'message'=> 'Reply has been sent !'
		));			
	}
	public function getRemovereply( Request $request , $id = 0)
	{
		\DB::table('sb_ticketcomments')->where('CommentID',$id)->delete();
		return response()->json(array(
			'status'=>'success',
			'message'=> 'Reply has been removed !'
		));			
	}

	function postCopy( Request $request)
	{
		
	    foreach(\DB::select("SHOW COLUMNS FROM sb_tickets ") as $column)
        {
			if( $column->Field != 'TicketID')
				$columns[] = $column->Field;
        }
		$toCopy = implode(",",$request->input('id'));
		
				
		$sql = "INSERT INTO sb_tickets (".implode(",", $columns).") ";
		$sql .= " SELECT ".implode(",", $columns)." FROM sb_tickets WHERE TicketID IN (".$toCopy.")";
		\DB::insert($sql);
		return response()->json(array(
			'status'=>'success',
			'message'=> \Lang::get('core.note_success')
		));	
	}		

	function postSave( Request $request, $id =0)
	{
		
		$rules = $this->validateForm();
		$validator = Validator::make($request->all(), $rules);	
		if ($validator->passes()) {
			
			$data = $this->validatePost('sb_tickets');
			$data['entry_by'] = \Session::get('uid');
			$id = $this->model->insertRow($data , $request->input('TicketID'));
			
			return response()->json(array(
				'status'=>'success',
				'message'=> \Lang::get('core.note_success')
				));	
			
		} else {

			$message = $this->validateListError(  $validator->getMessageBag()->toArray() );
			return response()->json(array(
				'message'	=> $message,
				'status'	=> 'error'
			));	
		}	
	
	}	

	public function postDelete( Request $request)
	{

		if($this->access['is_remove'] ==0) {   
			return response()->json(array(
				'status'=>'error',
				'message'=> \Lang::get('core.note_restric')
			));
			die;

		}		
		// delete multipe rows 
		if(count($request->input('id')) >=1)
		{
			$this->model->destroy($request->input('id'));
			\DB::table('sb_ticketcomments')->whereIn('TicketID',$request->input('id'))->delete();
			
			return response()->json(array(
				'status'=>'success',
				'message'=> \Lang::get('core.note_success_delete')
			));
		} else {
			return response()->json(array(
				'status'=>'error',
				'message'=> \Lang::get('core.note_error')
			));

		} 		

	}			

}