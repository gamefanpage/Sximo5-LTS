<?php namespace App\Http\Controllers;

use App\Http\Controllers;
use App\Models\Sbproject;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator as Paginator;
use Redirect;
use Validator;


class SbprojectController extends Controller {

	protected $layout = "layouts.main";
	protected $data = array();
	public $module = 'sbproject';
	static $per_page = '10';

	public function __construct()
	{
		$this->model = new Sbproject();

		$this->info = $this->model->makeInfo ($this->module);
		$this->access = $this->model->validAccess ($this->info['id']);

		$this->data = array(
			'pageTitle'  => $this->info['title'],
			'pageNote'   => $this->info['note'],
			'pageModule' => 'sbproject',
			'return'     => self::returnUrl ()

		);

	}

	public function getIndex(Request $request)
	{

		if ($this->access['is_view'] == 0)
			return Redirect::to ('dashboard')
				->with ('messagetext', \Lang::get ('core.note_restric'))->with ('msgstatus', 'error');

		$sort = (!is_null ($request->input ('sort')) ? $request->input ('sort') : 'ProjectID');
		$order = (!is_null ($request->input ('order')) ? $request->input ('order') : 'asc');
		// End Filter sort and order for query 
		// Filter Search for query		
		$filter = (!is_null ($request->input ('search')) ? $this->buildSearch () : '');


		$page = $request->input ('page', 1);
		$params = array(
			'page'   => $page,
			'limit'  => (!is_null ($request->input ('rows')) ? filter_var ($request->input ('rows'), FILTER_VALIDATE_INT) : static::$per_page),
			'sort'   => $sort,
			'order'  => $order,
			'params' => $filter,
			'global' => (isset($this->access['is_global']) ? $this->access['is_global'] : 0)
		);
		// Get Query 
		$results = $this->model->getRows ($params);

		// Build pagination setting
		$page = $page >= 1 && filter_var ($page, FILTER_VALIDATE_INT) !== false ? $page : 1;
		$pagination = new Paginator($results['rows'], $results['total'], $params['limit']);
		$pagination->setPath ('sbproject');

		$this->data['rowData'] = $results['rows'];
		// Build Pagination 
		$this->data['pagination'] = $pagination;
		// Build pager number and append current param GET
		$this->data['pager'] = $this->injectPaginate ();
		// Row grid Number 
		$this->data['i'] = ($page * $params['limit']) - $params['limit'];
		// Grid Configuration 
		$this->data['tableGrid'] = $this->info['config']['grid'];
		$this->data['tableForm'] = $this->info['config']['forms'];
		$this->data['colspan'] = \SiteHelpers::viewColSpan ($this->info['config']['grid']);
		// Group users permission
		$this->data['access'] = $this->access;
		// Detail from master if any

		// Master detail link if any 
		$this->data['subgrid'] = (isset($this->info['config']['subgrid']) ? $this->info['config']['subgrid'] : array());

		// Render into template
		return view ('sbproject.index', $this->data);
	}


	function getUpdate(Request $request, $id = null)
	{

		if ($id == '')
		{
			if ($this->access['is_add'] == 0)
				return Redirect::to ('dashboard')->with ('messagetext', \Lang::get ('core.note_restric'))->with ('msgstatus', 'error');
		}

		if ($id != '')
		{
			if ($this->access['is_edit'] == 0)
				return Redirect::to ('dashboard')->with ('messagetext', \Lang::get ('core.note_restric'))->with ('msgstatus', 'error');
		}

		$row = $this->model->find ($id);
		if ($row)
		{
			$this->data['row'] = $row;
		} else
		{
			$this->data['row'] = $this->model->getColumnTable ('sb_projects');
		}
		$this->data['fields'] = \AjaxHelpers::fieldLang ($this->info['config']['forms']);

		$this->data['id'] = $id;

		return view ('sbproject.form', $this->data);
	}

	public function getShow($id = null)
	{

		if ($this->access['is_detail'] == 0)
			return Redirect::to ('dashboard')
				->with ('messagetext', Lang::get ('core.note_restric'))->with ('msgstatus', 'error');

		$row = $this->model->getRow ($id);
		if ($row)
		{
			$this->data['row'] = $row;
		} else
		{
			$this->data['row'] = $this->model->getColumnTable ('sb_projects');
		}
		$this->data['fields'] = \AjaxHelpers::fieldLang ($this->info['config']['grid']);

		$this->data['id'] = $id;
		$this->data['access'] = $this->access;

		return view ('sbproject.view', $this->data);
	}

	function postSave(Request $request)
	{

		$rules = $this->validateForm ();
		$validator = Validator::make ($request->all (), $rules);
		if ($validator->passes ())
		{
			$data = $this->validatePost ('tb_sbproject');
			if ($request->input ('ProjectID') == '')
			{
				$data['Created'] = date ("Y-m-d");
			} else
			{
				unset($data['Created']);
				$data['LastUpdate'] = date ("Y-m-d");

			}

			$id = $this->model->insertRow ($data, $request->input ('ProjectID'));

			if (!is_null ($request->input ('apply')))
			{
				$return = 'sbproject/update/' . $id . '?return=' . self::returnUrl ();
			} else
			{
				$return = 'sbproject?return=' . self::returnUrl ();
			}

			// Insert logs into database
			if ($request->input ('ProjectID') == '')
			{
				\SiteHelpers::auditTrail ($request, 'New Data with ID ' . $id . ' Has been Inserted !');
			} else
			{
				\SiteHelpers::auditTrail ($request, 'Data with ID ' . $id . ' Has been Updated !');
			}

			return Redirect::to ($return)->with ('messagetext', \Lang::get ('core.note_success'))->with ('msgstatus', 'success');

		} else
		{

			return Redirect::to ('sbproject/update/' . $id)->with ('messagetext', \Lang::get ('core.note_error'))->with ('msgstatus', 'error')
				->withErrors ($validator)->withInput ();
		}

	}

	public function postDelete(Request $request)
	{

		if ($this->access['is_remove'] == 0)
			return Redirect::to ('dashboard')
				->with ('messagetext', \Lang::get ('core.note_restric'))->with ('msgstatus', 'error');
		// delete multipe rows 
		if (count ($request->input ('id')) >= 1)
		{
			$this->model->destroy ($request->input ('id'));

			\SiteHelpers::auditTrail ($request, "ID : " . implode (",", $request->input ('id')) . "  , Has Been Removed Successfull");

			// redirect
			return Redirect::to ('sbproject')
				->with ('messagetext', \Lang::get ('core.note_success_delete'))->with ('msgstatus', 'success');

		} else
		{
			return Redirect::to ('sbproject')
				->with ('messagetext', 'No Item Deleted')->with ('msgstatus', 'error');
		}

	}

	static public function showTeam($val = '')
	{

		$value = '';
		if ($val != '')
		{
			$sql = \DB::table ('tb_users')->whereIn ('id', explode (',', $val))->get ();
			foreach ($sql as $v)
			{
				$avatar = '<img alt="" src="http://www.gravatar.com/avatar/' . md5 ($v->email) . '" class="img-circle tips" width="30" title="' . $v->first_name . ' ' . $v->last_name . '"/> ';
				$files = './uploads/users/' . $v->avatar;
				if ($v->avatar != '')
				{
					if (file_exists ($files))
					{
						$avatar = '<img src="' . asset ('uploads/users') . '/' . $v->avatar . '" border="0" width="30" class="img-circle tips" title="' . $v->first_name . ' ' . $v->last_name . '" /> ';
					}
				}

				$value .= $avatar;
			}
		}

		return $value;
	}

	static public function Status($Status)
	{

		if ($Status == 'active'):
			return '<span class="label label-primary"> Active </span>';
		elseif ($Status == 'inactive'):
			return '<span class="label label-success"> In Active </span>';
		elseif ($Status == 'suspended'):
			return '<span class="label label-warning"> Suspended </span>';
		else:
			return '<span class="label label-danger"> Canceled </span>';
		endif;

	}


}