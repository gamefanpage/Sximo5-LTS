<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Input;
use Mail;
use Redirect;
use Validator;

class HomeController extends Controller {

	public function __construct()
	{
		parent::__construct ();
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{


		if (CNF_FRONT == 'false' && $request->segment (1) == '') :
			return Redirect::to ('dashboard');
		endif;

		$page = $request->segment (1);
		if ($page != '') :
			$content = \DB::table ('tb_pages')->where ('alias', '=', $page)->where ('status', '=', 'enable')->get ();
			//print_r($content);
			//return '';
			if (count ($content) >= 1)
			{

				$row = $content[0];
				$this->data['pageTitle'] = $row->title;
				$this->data['pageNote'] = $row->note;
				$this->data['pageMetakey'] = ($row->metakey != '' ? $row->metakey : CNF_METAKEY);
				$this->data['pageMetadesc'] = ($row->metadesc != '' ? $row->metadesc : CNF_METADESC);

				$this->data['breadcrumb'] = 'active';

				if ($row->access != '')
				{
					$access = json_decode ($row->access, true);
				} else
				{
					$access = array();
				}

				// If guest not allowed 
				if ($row->allow_guest != 1)
				{
					$group_id = \Session::get ('gid');
					$isValid = (isset($access[$group_id]) && $access[$group_id] == 1 ? 1 : 0);
					if ($isValid == 0)
					{
						return Redirect::to ('')
							->with ('message', \SiteHelpers::alert ('error', Lang::get ('core.note_restric')));
					}
				}
				if ($row->template == 'backend')
				{
					$page = 'pages.' . $row->filename;
				} else
				{
					$page = 'layouts.' . CNF_THEME . '.index';
				}
				//print_r($this->data);exit;

				$filename = base_path () . "/resources/views/pages/" . $row->filename . ".blade.php";
				if (file_exists ($filename))
				{
					$this->data['pages'] = 'pages.' . $row->filename;

					//	print_r($this->data);exit;
					return view ($page, $this->data);
				} else
				{
					return Redirect::to ('')
						->with ('message', \SiteHelpers::alert ('error', \Lang::get ('core.note_noexists')));
				}

			} else
			{
				return Redirect::to ('')
					->with ('message', \SiteHelpers::alert ('error', \Lang::get ('core.note_noexists')));
			}


		else :
			$this->data['pageTitle'] = 'Home';
			$this->data['pageNote'] = 'Welcome To Our Site';
			$this->data['breadcrumb'] = 'inactive';
			$this->data['pageMetakey'] = CNF_METAKEY;
			$this->data['pageMetadesc'] = CNF_METADESC;

			$this->data['pages'] = 'pages.home';
			$page = 'layouts.' . CNF_THEME . '.index';

			return view ($page, $this->data);
		endif;


	}

	public function  getLang($lang = 'en')
	{
		\Session::put ('lang', $lang);

		return Redirect::back ();
	}

	public function  getSkin($skin = 'sximo')
	{
		\Session::put ('themes', $skin);

		return Redirect::back ();
	}

	public function  postContact(Request $request)
	{
		$rules = array(
				'name'    => 'required',
				'sender'  => 'required|email',
				'phone'   => 'required',
				'postal'  => 'required',
				'subject' => 'required',
				'message' => 'required',
		);
		$validator = Validator::make (Input::all (), $rules);
		if ($validator->passes ())
		{

			$data = array('name'    => $request->input ('name'), 'sender' => $request->input ('sender'), 'phone' => $request->input ('phone'), 'postal' => $request->input ('postal'),
						  'subject' => $request->input ('subject'), 'notes' => $request->input ('message'));

			$subject = $request->input ('subject');
			Mail::send ('emails.contact', $data, function ($message) use ($data, $subject)
			{
				/* @var $message \Illuminate\Mail\Message */
				$message->subject ($subject);
				$message->from (env ('MAIL_FROM_ADDRESS'), env ('MAIL_FROM_NAME'));
				$message->to (CNF_CONTACTEMAIL, env ('MAIL_FROM_NAME'));
				$message->replyTo ($data['sender'], $data['name']);
			});



			return Redirect::to ($request->input ('redirect'))->with ('message', \SiteHelpers::alert ('success', 'Thank You , Your message has been sent !'));

		} else
		{
			return Redirect::to ($request->input ('redirect'))->with ('message', \SiteHelpers::alert ('error', 'The following errors occurred'))
				->withErrors ($validator)->withInput ();
		}
	}
}
