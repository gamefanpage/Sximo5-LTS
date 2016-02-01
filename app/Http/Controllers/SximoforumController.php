<?php namespace App\Http\Controllers;

use App\Http\Controllers;
use App\Models\Sximoforum;
use App\Library\Slimdown;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator as Paginator;
use Mail;
use Redirect;
use Validator;


class SximoforumController extends Controller {

	protected $layout = "layouts.main";
	protected $data = array();
	public $module = 'sximoforum';
	static $per_page = '10';

	public function __construct()
	{

		$this->model = new Sximoforum();

		$this->info = $this->model->makeInfo ($this->module);
		$this->access = $this->model->validAccess ($this->info['id']);

		$this->data = array(
			'pageTitle'  => $this->info['title'],
			'pageNote'   => $this->info['note'],
			'pageModule' => 'sximoforum',
			'return'     => self::returnUrl ()

		);

	}

	public function getIndex(Request $request)
	{

		if ($this->access['is_view'] == 0)
			return Redirect::to ('dashboard')
				->with ('messagetext', \Lang::get ('core.note_restric'))->with ('msgstatus', 'error');

		$sort = (!is_null ($request->input ('sort')) ? $request->input ('sort') : 'ForumID');
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
		$pagination->setPath ('sximoforum');

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
		return view ('sximoforum.index', $this->data);
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
			$this->data['row'] = $this->model->getColumnTable ('forums');
		}
		$this->data['fields'] = \AjaxHelpers::fieldLang ($this->info['config']['forms']);

		$this->data['id'] = $id;

		return view ('sximoforum.form', $this->data);
	}

	public function getShow(Request $request, $id = null)
	{

		if ($this->access['is_detail'] == 0)
			return Redirect::to ('dashboard')
				->with ('messagetext', \Lang::get ('core.note_restric'))->with ('msgstatus', 'error');

		$row = $this->model->getRow ($id);
		if ($row)
		{
			$this->data['row'] = $row;
		} else
		{
			$this->data['row'] = $this->model->getColumnTable ('forums');
		}
		$this->data['fields'] = \AjaxHelpers::fieldLang ($this->info['config']['grid']);

		$topics = "
			SELECT 
				forum_categories.*, 
				COUNT( forum_posts.PostID ) AS posts 
			FROM forum_categories 
			LEFT JOIN forum_posts ON forum_posts.CategoryID  = forum_categories.CategoryID
			WHERE ForumID = '$row->ForumID'
			GROUP BY forum_categories.CategoryID			
		";


		$this->data['topics'] = \DB::select ($topics);

		$this->data['id'] = $id;
		$this->data['access'] = $this->access;

		return view ('sximoforum.view', $this->data);
	}

	function postSave(Request $request)
	{

		$rules = $this->validateForm ();
		$validator = Validator::make ($request->all (), $rules);
		if ($validator->passes ())
		{
			$data = $this->validatePost ('tb_sximoforum');

			$id = $this->model->insertRow ($data, $request->input ('ForumID'));

			if (!is_null ($request->input ('apply')))
			{
				$return = 'sximoforum/update/' . $id . '?return=' . self::returnUrl ();
			} else
			{
				$return = 'sximoforum?return=' . self::returnUrl ();
			}

			// Insert logs into database
			if ($request->input ('ForumID') == '')
			{
				\SiteHelpers::auditTrail ($request, 'New Data with ID ' . $id . ' Has been Inserted !');
			} else
			{
				\SiteHelpers::auditTrail ($request, 'Data with ID ' . $id . ' Has been Updated !');
			}

			return Redirect::to ($return)->with ('messagetext', \Lang::get ('core.note_success'))->with ('msgstatus', 'success');

		} else
		{

			return Redirect::to ('sximoforum/update/' . $id)->with ('messagetext', \Lang::get ('core.note_error'))->with ('msgstatus', 'error')
				->withErrors ($validator)->withInput ();
		}

	}

	public function postDelete(Request $request)
	{

		if ($this->access['is_remove'] == 0)
			return Redirect::to ('dashboard')
				->with ('messagetext', \Lang::get ('core.note_restric'))->with ('msgstatus', 'error');
		// delete multipe rows 
		if (count ($request->input ('ids')) >= 1)
		{
			$this->model->destroy ($request->input ('ids'));

			\SiteHelpers::auditTrail ($request, "ID : " . implode (",", $request->input ('ids')) . "  , Has Been Removed Successfull");

			// redirect
			return Redirect::to ('sximoforum')
				->with ('messagetext', \Lang::get ('core.note_success_delete'))->with ('msgstatus', 'success');

		} else
		{
			return Redirect::to ('sximoforum')
				->with ('messagetext', 'No Item Deleted')->with ('msgstatus', 'error');
		}

	}

	public function getTopic(Request $request, $id = null)
	{

		$topics = " 
			SELECT 
				forum_categories.* , forums.Name as Title 
			FROM forum_categories
			LEFT JOIN forums ON forums.ForumID = forum_categories.ForumID
			WHERE forum_categories.CategoryID = '$id'

		";

		$topics = \DB::select ($topics);
		if (count ($topics) >= 1)
		{

			$total = $totalPost = \DB::table ('forum_posts')->where ('CategoryID', $id)->count ();
			$limit = 10;

			$page = $request->input ('page', 1);
			$offset = ($page - 1) * $limit;
			$limitConditional = ($page != 0 && $limit != 0) ? "LIMIT  $offset , $limit" : '';

			$sql = " 
				SELECT 
					forum_posts.* ,count(forum_comments.CommentID)  as Reply,
					CONCAT(first_name,' ',last_name)  as Starter , avatar , email
				FROM forum_posts
				LEFT JOIN forum_comments ON forum_posts.PostID = forum_comments.PostID
				LEFT JOIN tb_users ON tb_users.id = forum_posts.UserID
				WHERE forum_posts.CategoryID = '$id'
				GROUP BY forum_posts.PostID ORDER BY forum_posts.Posted DESC $limitConditional

			";
			$result = \DB::select ($sql);

			$pagination = new Paginator($result, $total, $limit);
			$this->data['pagination'] = $pagination->setPath ('');


			$this->data['posts'] = $result;
			$this->data['row'] = $topics[0];

			return view ('sximoforum.posts', $this->data);
		} else
		{
			return Redirect::to ('sximoforum')
				->with ('messagetext', 'Topic is not Found !')->with ('msgstatus', 'error');
		}
	}

	public function getPost(Request $request, $id = null)
	{

		$topics = " 
			SELECT 
				forum_posts.* , forum_categories.Name AS Topic,
				forums.Name AS forumTitle ,forums.ForumID,
				avatar , CONCAT(first_name,' ',last_name) AS users , email 
			FROM forum_posts
			LEFT JOIN forum_categories ON forum_categories.CategoryID = forum_posts.CategoryID
			LEFT JOIN forums ON forums.ForumID = forum_categories.ForumID
			LEFT JOIN tb_users ON tb_users.id = forum_posts.UserID
			WHERE forum_posts.PostID = '$id'

		";

		$topics = \DB::select ($topics);
		if (count ($topics) >= 1)
		{
			\DB::table ('forum_posts')->where ('PostID', $id)->increment ('hint', 1);
			$sql = " 
				SELECT 
					forum_comments.* ,tb_users.*
				FROM forum_comments
				LEFT JOIN tb_users ON tb_users.id = forum_comments.UserID
				WHERE forum_comments.PostID = '$id'
				ORDER BY forum_comments.Posted ASC 

			";
			$result = \DB::select ($sql);
			$this->data['comments'] = $result;
			$this->data['row'] = $topics[0];

			return view ('sximoforum.reply', $this->data);
		} else
		{
			return Redirect::to ('sximoforum')
				->with ('messagetext', 'Post is not Found !')->with ('msgstatus', 'error');
		}
	}

	public function postReply(Request $request)
	{
		if (\Session::get ('uid') == '')
		{
			return Redirect::to ('dashboard')
				->with ('messagetext', 'Post is not Found !')->with ('msgstatus', 'error');
		}


		$data = array(
			'PostID'  => $request->input ('PostID'),
			'Comment' => $request->input ('Comment')
		);
		if ($request->input ('CommentID') == '')
		{
			$data['UserID'] = \Session::get ('uid');
			$data['Posted'] = date ('Y-m-d H:i:s');

			\DB::table ('forum_comments')->insert ($data);
		} else
		{
			\DB::table ('forum_comments')->where ('CommentID', $request->input ('CommentID'))->update ($data);
		}


		// Send email to post Thread and all commenter 
		$postThread = \DB::select ("
			SELECT 
				forum_posts.*, email , first_name , last_name
				
			FROM forum_posts 
			LEFT JOIN tb_users ON tb_users.id = forum_posts.UserID
			WHERE PostID ='" . $request->input ('PostID') . "'
		");
		foreach ($postThread as $pt)
		{


			$data['username'] = $pt->first_name . ' ' . $pt->last_name;
			$data['email'] = $pt->email;
			Mail::send ('sximoforum.emailreply', $data, function ($message) use ($data)
			{

				$message->to (trim ($data['email']))->subject ('Sximo Forum Post Reply');
			});
			$emailTreader = $pt->UserID;

		}

		$commented = \DB::select ("
			SELECT 
				DISTINCT(forum_comments.UserID) ,  email , first_name , last_name 
				
			FROM forum_comments 
			LEFT JOIN tb_users ON tb_users.id = forum_comments.UserID
			WHERE PostID ='" . $request->input ('PostID') . "' AND  forum_comments.UserID NOT IN (" . \Session::get ('uid') . ",$emailTreader)
			AND  forum_comments.UserID !='" . \Session::get ('uid') . "'
		");

		foreach ($commented as $c)
		{
			$data['username'] = $c->first_name . ' ' . $c->last_name;
			$data['email'] = $c->email;

			Mail::send ('sximoforum.emailreply', $data, function ($message) use ($data)
			{
				$message->to ($data['email'])->subject ('Sximo Forum Post Reply');
			});

		}

		return Redirect::to ('sximoforum/post/' . $request->input ('PostID'))
			->with ('messagetext', 'Comment Posted successfully !')->with ('msgstatus', 'success');
	}


	public function getDeletereply(Request $request, $CommentID, $PostID)
	{

		if ($CommentID != '0' and $PostID != '0')
		{
			\DB::table ('forum_comments')->where ('CommentID', $CommentID)->delete ();

			return Redirect::to ('sximoforum/post/' . $PostID)
				->with ('messagetext', \Lang::get ('core.note_success_delete'))->with ('msgstatus', 'success');

		} else
		{
			return Redirect::to ('sximoforum')
				->with ('messagetext', 'No Item Deleted')->with ('msgstatus', 'error');
		}

	}


	public function getDeletepost(Request $request, $PostID, $CategoryID)
	{

		if ($PostID != '0' and $CategoryID != '0')
		{
			\DB::table ('forum_posts')->where ('PostID', $PostID)->delete ();
			\DB::table ('forum_comments')->where ('PostID', $PostID)->delete ();

			return Redirect::to ('sximoforum/topic/' . $CategoryID)
				->with ('messagetext', \Lang::get ('core.note_success_delete'))->with ('msgstatus', 'success');

		} else
		{
			return Redirect::to ('sximoforum')
				->with ('messagetext', 'No Item Deleted')->with ('msgstatus', 'error');
		}

	}

	public function getAddpost(Request $request, $CategoryID)
	{


		$this->data['CategoryID'] = $CategoryID;

		return view ('sximoforum.newpost', $this->data);

	}

	public function postSavepost(Request $request)
	{

		$data = array(
			'CategoryID' => $request->input ('CategoryID'),
			'Title'      => $request->input ('Title'),
			'Content'    => $request->input ('Content'),
		);

		if ($request->input ('PostID') == '')
		{
			$data['Posted'] = date ('Y-m-d H:i:s');
			$data['UserID'] = \Session::get ('uid');
			$data['Hint'] = 0;
			$data['Sticky'] = 0;
			$id = \DB::table ('forum_posts')->insertGetId ($data);
			$data['PostID'] = $id;
			Mail::send ('sximoforum.emailpost', $data, function ($message)
			{
				$message->to ('kangopik@gmail.com')->subject ('Sximo Forum new Post !');
			});
		} else
		{
			\DB::table ('forum_posts')->where ('PostID', $request->input ('PostID'))->update ($data);
			$id = $request->input ('PostID');
		}

		return Redirect::to ('sximoforum/topic/' . $request->input ('CategoryID'))
			->with ('messagetext', 'Post Addded successfully !')->with ('msgstatus', 'success');
	}

	public function postDeletetopic(Request $request)
	{

		if ($this->access['is_remove'] == 0)
			return Redirect::to ('dashboard')
				->with ('messagetext', \Lang::get ('core.note_restric'))->with ('msgstatus', 'error');
		// delete multipe rows 
		if (count ($request->input ('ids')) >= 1)
		{
			\DB::table ('forum_categories')->whereIn ('CategoryID', $request->input ('ids'))->delete ();
			\DB::table ('forum_posts')->whereIn ('CategoryID', $request->input ('ids'))->delete ();

			// redirect
			return Redirect::to ('sximoforum/show/' . $request->input ('ForumID'))
				->with ('messagetext', \Lang::get ('core.note_success_delete'))->with ('msgstatus', 'success');

		} else
		{
			return Redirect::to ('sximoforum')
				->with ('messagetext', 'No Item Deleted')->with ('msgstatus', 'error');
		}

	}


	public function getAddtopic(Request $request, $ForumID)
	{
		$this->data['ForumID'] = $ForumID;

		return view ('sximoforum.newtopic', $this->data);

	}

	public function postSavetopic(Request $request)
	{

		$data = array(
			'ForumID'  => $request->input ('ForumID'),
			'Name'     => $request->input ('Name'),
			'Note'     => $request->input ('Note'),
			'Ordering' => $request->input ('Ordering'),
		);
		\DB::table ('forum_categories')->insert ($data);

		return Redirect::to ('sximoforum/show/' . $request->input ('ForumID'))
			->with ('messagetext', 'Topic Addded successfully !')->with ('msgstatus', 'success');
	}

	public function getMail()
	{
		$data = array('username' => 'uing', 'Comment' => 'hait', 'PostID' => 10);
		Mail::send ('sximoforum.emailreply', $data, function ($message)
		{
			// $message->from('us@example.com', 'Laravel');

			$message->to ('kangopik@gmail.com')->subject ('tester');
		});
	}


}