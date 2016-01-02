<?php namespace App\Http\Controllers;

use App\Http\Controllers\controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator as Paginator;
use Validator, Input, Redirect ; 


class BlogController extends Controller {

	protected $layout = "layouts.main";
	protected $data = array();	
	public $module = 'blog';
	static $per_page	= '10';

	public function __construct()
	{
		
		$this->beforeFilter('csrf', array('on'=>'post'));
		$this->model = new Blog();
		
		$this->info = $this->model->makeInfo( $this->module);
		$this->access = $this->model->validAccess($this->info['id']);
	
		$this->data = array(
			'pageTitle'	=> 	$this->info['title'],
			'pageNote'	=>  $this->info['note'],
			'pageModule'=> 'blog',
			'return'	=> self::returnUrl()
			
		);
		
	}

	public function getIndex( Request $request)
	{



		$sort = (!is_null($request->input('sort')) ? $request->input('sort') : 'created'); 
		$order = (!is_null($request->input('order')) ? $request->input('order') : 'desc');
		// End Filter sort and order for query 
		// Filter Search for query		
		$filter = (!is_null($request->input('search')) ? $this->buildSearch() : '');
		if(!is_null($request->input('category'))) 
			$filter .= " AND tb_blogcategories.alias ='".$request->input('category')."' ";
		
		$page = $request->input('page', 1);
		$params = array(
			'page'		=> $page ,
			'limit'		=> (!is_null($request->input('rows')) ? filter_var($request->input('rows'),FILTER_VALIDATE_INT) : static::$per_page ) ,
			'sort'		=> $sort ,
			'order'		=> $order,
			'params'	=> $filter,
			'global'	=> (isset($this->access['is_global']) ? $this->access['is_global'] : 0 )
		);
		$total = $this->model->totalBlog( $filter);
		// Get Query 
		$results = $this->model->getRows( $params );		
		
		// Build pagination setting
		$page = $page >= 1 && filter_var($page, FILTER_VALIDATE_INT) !== false ? $page : 1;	
		$pagination = new Paginator($results['rows'], $total, $params['limit']);	
		$pagination->setPath('blog');
		
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
		
		// Master detail link if any 
		$this->data['subgrid']	= (isset($this->info['config']['subgrid']) ? $this->info['config']['subgrid'] : array()); 

		$this->data['blogcategories']			= Blog::summaryCategory();
		$this->data['clouds']					= Blog::clouds();
		$this->data['recent']					= Blog::recentPosts();

		$this->data['pageMetakey'] =  CNF_METAKEY ;
		$this->data['pageMetadesc'] = CNF_METADESC ;

		$this->data['pages'] = 'blog.index';
		$page = 'layouts.'.CNF_THEME.'.index';
		return view($page,$this->data);
	}	

	function getRead( Request $request, $id = null)
	{
		
		$row = Blog::getRowBlog($id);

		if($row)
		{
			$this->data['row'] =  $row;
			$this->data['id'] = $row->blogID;
			$this->data['alias'] =  $row->slug;
	
			$this->data['blogcategories']			= Blog::summaryCategory();
			$this->data['clouds']					= Blog::clouds();
			$this->data['recent']					= Blog::recentPosts();
			$this->data['comments']					= Blog::getComments($row->blogID);
			$this->data['access']		= $this->access;
			
			$this->data['pageMetakey'] =  CNF_METAKEY ;
			$this->data['pageMetadesc'] = CNF_METADESC ;
			$this->data['pageTitle'] = $row->title;

			$this->data['pages'] = 'blog.view';
			$page = 'layouts.'.CNF_THEME.'.index';
			return view($page,$this->data);

		} else {
			return redirect('blog')->with('message', \SiteHelpers::alert('error',' Article not found !'));
		}	
	}

	function getCategory( Request $request , $id = null )
	{
		if($id == null ) 
			return redirect('blog')->with('message', SiteHelpers::alert('error','Could not find category'));
		self::getIndex( $request , 'category' ,$id );
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
			$this->data['row'] =  $row;
		} else {
			$this->data['row'] = $this->model->getColumnTable('tb_blogs'); 
		}
			$this->data['id'] = $id;
		return view('blog.form',$this->data);

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
			$this->data['row'] = $this->model->getColumnTable('tb_blogs'); 
		}
		
		$this->data['id'] = $id;
		$this->data['access']		= $this->access;
		return view('blog.view',$this->data);	
	}	

	function postSave( Request $request)
	{
		
		$rules = $this->validateForm();
		$validator = Validator::make($request->all(), $rules);	
		if ($validator->passes()) {
			$data = $this->validatePost('tb_blog');
			$data['slug'] =\SiteHelpers::seoUrl( trim($request->input('title')));
			$id = $this->model->insertRow($data , $request->input('blogID'));
			
			if(!is_null($request->input('apply')))
			{
				$return = 'blog/update/'.$id.'?return='.self::returnUrl();
			} else {
				$return = 'blog?return='.self::returnUrl();
			}

			// Insert logs into database
			if($request->input('blogID') =='')
			{
				\SiteHelpers::auditTrail( $request , 'New Data with ID '.$id.' Has been Inserted !');
			} else {
				\SiteHelpers::auditTrail($request ,'Data with ID '.$id.' Has been Updated !');
			}

			return Redirect::to($return)->with('messagetext',\Lang::get('core.note_success'))->with('msgstatus','success');
			
		} else {

			return Redirect::to('blog/update/'.$id)->with('messagetext',\Lang::get('core.note_error'))->with('msgstatus','error')
			->withErrors($validator)->withInput();
		}	
	
	}	

	public function getRemove( $id )
	{
		if($this->access['is_remove'] ==0) 
			return redirect('blog')->with('message', \SiteHelpers::alert('error','You dont have authorized to delete !'));

		\DB::table('tb_blogs')->where('blogID',$id)->delete();
		\DB::table('tb_blogcomments')->where('blogID',$id)->delete();

		return redirect('blog')->with('message', \SiteHelpers::alert('success','Post Has Been Removed Successfull'));

	}
	public function postDelete( Request $request)
	{
		
		if($this->access['is_remove'] ==0) 
			return Redirect::to('dashboard')
				->with('messagetext', \Lang::get('core.note_restric'))->with('msgstatus','error');
		// delete multipe rows 
		if(count($request->input('id')) >=1)
		{
			$this->model->destroy($request->input('id'));
			
			\SiteHelpers::auditTrail( $request , "ID : ".implode(",",$request->input('id'))."  , Has Been Removed Successfull");
			// redirect
			return Redirect::to('blog')
        		->with('messagetext', \Lang::get('core.note_success_delete'))->with('msgstatus','success'); 
	
		} else {
			return Redirect::to('blog')
        		->with('messagetext','No Item Deleted')->with('msgstatus','error');				
		}

	}	


	function postSavecomment( Request $request, $id =0)
	{

		$rules = array(
			'comment' => 'required'	
		);
		$validator = Validator::make($request->all(), $rules);	
		if ($validator->passes()) {
			$data = array(
				'comment'	=> $request->input("comment"),
				'blogID'	=> $request->input("blogID"),
				'created'	=> date("Y-m-d H:i:s"),
				'user_id'	=> \Session::get('uid')
				
			);
			$ID = \DB::table("tb_blogcomments")->insert($data);		
			return redirect('blog/read/'.$request->input('alias'))->with('message', \SiteHelpers::alert('success',\Lang::get('core.note_success')));
		} else {
			return redirect('blog/read/'.$request->input('alias'))->with('message', \SiteHelpers::alert('error',\Lang::get('core.note_error')))
			->withErrors($validator)->withInput();
		}	
	
	}			

	public function getRemovecomm( Request $request, $id , $alias )
	{
		
		if(\Session::get('gid') != 1) 
			return Redirect::to('')
				->with('message', \SiteHelpers::alert('error',\Lang::get('core.note_restric')));
						
		// delete multipe rows 
	
		 \DB::table('tb_blogcomments')->where('commentID',$id)->delete();   
		// redirect
		\Session::flash('message', \SiteHelpers::alert('success','Comment has been removed !'));
		return redirect('blog/read/'.$alias);
	}	

	public function getCategories()
	{
		$this->data['access']		= $this->access;
		$this->data['categories'] = \DB::table('tb_blogcategories')->get();
		return view('blog.categories',$this->data);
	}

	public function postCategoriesdelete( Request $request)
	{
		if($this->access['is_remove'] ==0) 
			return Redirect::to('blog/categories')
				->with('messagetext', \Lang::get('core.note_restric'))->with('msgstatus','error');
		// delete multipe rows 
		if(count($request->input('id')) >=1)
		{
			//$this->model->destroy($request->input('id'));
			$ids = count($_POST['id']);
			for($i=0; $i<count($ids); $i++)
			{
				\DB::table('tb_blogcategories')->where('CatID',$_POST['id'][$i])->delete();
				\DB::table('tb_blogs')->where('CatID',$_POST['id'][$i])->delete();
			}

			return Redirect::to('blog/categories')
        		->with('messagetext', \Lang::get('core.note_success_delete'))->with('msgstatus','success'); 
	
		} else {
			return Redirect::to('blog/categories')
        		->with('messagetext','No Item Deleted')->with('msgstatus','error');				
		}
	}	

	public function getCategoriesupdate( $id  = '')
	{
		if($id == '')
		{

			$this->data['row'] = array(
				'name'		=> '',
				'alias'		=>'',
				'enable'	=> 1 ,
				'CatID'		=> ''
			);

		} else {
			$row = \DB::table('tb_blogcategories')->where('CatID',$id)->get();
			$row = $row[0];
			$this->data['row'] = array(
				'name'		=> $row->name,
				'alias'		=> $row->alias,
				'enable'	=> 1 ,
				'CatID'		=> $row->CatID
			);			
		}

		return view('blog.categoriesupdate',$this->data);
	}

	public function  postCategoriessave( Request $request)
	{
		$rules = array();
		$validator = Validator::make($request->all(), $rules);	
		if ($validator->passes()) {
			$data = array(
				'name'	=> trim($request->input('name')),
				'enable'=> 1 ,

				);
			$data['alias'] =\SiteHelpers::seoUrl( trim($request->input('name')));
			if($request->input('CatID') == '')
			{
				\DB::table('tb_blogcategories')->insert($data);
			} else {
				\DB::table('tb_blogcategories')->where('CatID',$request->input('CatID'))->update($data);	
			}
			
			return redirect('blog/categories')->with('messagetext',\Lang::get('core.note_success'))->with('msgstatus','success');
			
		} else {

			return redirect('blog/categories')->with('messagetext',\Lang::get('core.note_error'))->with('msgstatus','error')
			->withErrors($validator)->withInput();
		}
	}			

}