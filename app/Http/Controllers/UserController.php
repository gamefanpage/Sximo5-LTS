<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\User;
use Socialize;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator as Paginator;
use Validator, Input, Redirect ; 

class UserController extends Controller {

	
	protected $layout = "layouts.main";

	public function __construct() {
		parent::__construct();

	} 

	public function getRegister() {
        
		if(CNF_REGIST =='false') :    
			if(\Auth::check()):
				 return Redirect::to('')->with('message',\SiteHelpers::alert('success','Youre already login'));
			else:
				 return Redirect::to('user/login');
			  endif;
			  
		else :
				
				return view('user.register');  
		 endif ; 
           
	

	}

	public function postCreate( Request $request) {
	
		$rules = array(
			'firstname'=>'required|alpha_num|min:2',
			'lastname'=>'required|alpha_num|min:2',
			'email'=>'required|email|unique:tb_users',
			'password'=>'required|between:6,12|confirmed',
			'password_confirmation'=>'required|between:6,12'
			);	
		if(CNF_RECAPTCHA =='true') $rules['recaptcha_response_field'] = 'required|recaptcha';
				
		$validator = Validator::make($request->all(), $rules);

		if ($validator->passes()) {
			$code = rand(10000,10000000);
			
			$authen = new User;
			$authen->first_name = $request->input('firstname');
			$authen->last_name = $request->input('lastname');
			$authen->email = trim($request->input('email'));
			$authen->activation = $code;
			$authen->group_id = 3;
			$authen->password = \Hash::make($request->input('password'));
			if(CNF_ACTIVATION == 'auto') { $authen->active = '1'; } else { $authen->active = '0'; }
			$authen->save();
			
			$data = array(
				'firstname'	=> $request->input('firstname') ,
				'lastname'	=> $request->input('lastname') ,
				'email'		=> $request->input('email') ,
				'password'	=> $request->input('password') ,
				'code'		=> $code
				
			);
			if(CNF_ACTIVATION == 'confirmation')
			{ 
			
				$to = $request->input('email');
				$subject = "[ " .CNF_APPNAME." ] REGISTRATION "; 			
				$message = view('user.emails.registration', $data);
				$headers  = 'MIME-Version: 1.0' . "\r\n";
				$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
				$headers .= 'From: '.CNF_APPNAME.' <'.CNF_EMAIL.'>' . "\r\n";
					mail($to, $subject, $message, $headers);	
				
				$message = "Thanks for registering! . Please check your inbox and follow activation link";
								
			} elseif(CNF_ACTIVATION=='manual') {
				$message = "Thanks for registering! . We will validate you account before your account active";
			} else {
   			 	$message = "Thanks for registering! . Your account is active now ";         
			
			}	


			return Redirect::to('user/login')->with('message',\SiteHelpers::alert('success',$message));
		} else {
			return Redirect::to('user/register')->with('message',\SiteHelpers::alert('error','The following errors occurred')
			)->withErrors($validator)->withInput();
		}
	}
	
	public function getActivation( Request $request  )
	{
		$num = $request->input('code');
		if($num =='')
			return Redirect::to('user/login')->with('message',\SiteHelpers::alert('error','Invalid Code Activation!'));
		
		$user =  User::where('activation','=',$num)->get();
		if (count($user) >=1)
		{
			\DB::table('tb_users')->where('activation', $num )->update(array('active' => 1,'activation'=>''));
			return Redirect::to('user/login')->with('message',\SiteHelpers::alert('success','Your account is active now!'));
			
		} else {
			return Redirect::to('user/login')->with('message',\SiteHelpers::alert('error','Invalid Code Activation!'));
		}
		
		
	
	}

	public function getLogin() {
	
		if(\Auth::check())
		{
			return Redirect::to('')->with('message',\SiteHelpers::alert('success','Youre already login'));

		} else {
			$this->data['socialize'] =  config('services');
			return View('user.login',$this->data);
			
		}	
	}

	public function postSignin( Request $request) {
		
		$rules = array(
			'email'=>'required|email',
			'password'=>'required',
		);		
		if(CNF_RECAPTCHA =='true') $rules['captcha'] = 'required|captcha';
		$validator = Validator::make(Input::all(), $rules);
		if ($validator->passes()) {	

			$remember = (!is_null($request->get('remember')) ? 'true' : 'false' );
			
			if (\Auth::attempt(array('email'=>$request->input('email'), 'password'=> $request->input('password') ), $remember )) {
				if(\Auth::check())
				{
					$row = User::find(\Auth::user()->id); 
	
					if($row->active =='0')
					{
						// inactive 
						\Auth::logout();
						return Redirect::to('user/login')->with('message', \SiteHelpers::alert('error','Your Account is not active'));
	
					} else if($row->active=='2')
					{
						// BLocked users
						\Auth::logout();
						return Redirect::to('user/login')->with('message', \SiteHelpers::alert('error','Your Account is BLocked'));
					} else {
						\DB::table('tb_users')->where('id', '=',$row->id )->update(array('last_login' => date("Y-m-d H:i:s")));
						\Session::put('uid', $row->id);
						\Session::put('gid', $row->group_id);
						\Session::put('eid', $row->email);
						\Session::put('ll', $row->last_login);
						\Session::put('fid', $row->first_name.' '. $row->last_name);	
						if(!is_null($request->input('language')))
						{
							\Session::put('lang', $request->input('language'));	
						} else {
							\Session::put('lang', 'en');	
						}  
							if(CNF_FRONT =='false') :
							return Redirect::to('dashboard');						
						else :
							return Redirect::to('');
						endif;							
											
					}			
					
				}			
				
			} else {
				return Redirect::to('user/login')
					->with('message', \SiteHelpers::alert('error','Your username/password combination was incorrect'))
					->withInput();
			}
		} else {
		
				return Redirect::to('user/login')
					->with('message', \SiteHelpers::alert('error','The following  errors occurred'))
					->withErrors($validator)->withInput();
		}	
	}

	public function getProfile() {
		
		if(!\Auth::check()) return redirect('user/login');
		
		
		$info =	User::find(\Auth::user()->id);
		$this->data = array(
			'pageTitle'	=> 'My Profile',
			'pageNote'	=> 'View Detail My Info',
			'info'		=> $info,
		);
		return view('user.profile',$this->data);
	}
	
	public function postSaveprofile( Request $request)
	{
		if(!\Auth::check()) return Redirect::to('user/login');
		$rules = array(
			'first_name'=>'required|alpha_num|min:2',
			'last_name'=>'required|alpha_num|min:2',
			);	
			
		if($request->input('email') != \Session::get('eid'))
		{
			$rules['email'] = 'required|email|unique:tb_users';
		}	
				
		$validator = Validator::make($request->all(), $rules);

		if ($validator->passes()) {
			
			
			if(!is_null(Input::file('avatar')))
			{
				$file = $request->file('avatar'); 
				$destinationPath = './uploads/users/';
				$filename = $file->getClientOriginalName();
				$extension = $file->getClientOriginalExtension(); //if you need extension of the file
				 $newfilename = \Session::get('uid').'.'.$extension;
				$uploadSuccess = $request->file('avatar')->move($destinationPath, $newfilename);				 
				if( $uploadSuccess ) {
				    $data['avatar'] = $newfilename; 
				} 
				
			}		
			
			$user = User::find(\Session::get('uid'));
			$user->first_name 	= $request->input('first_name');
			$user->last_name 	= $request->input('last_name');
			$user->email 		= $request->input('email');
			if(isset( $data['avatar']))  $user->avatar  = $newfilename; 			
			$user->save();

			return Redirect::to('user/profile')->with('messagetext','Profile has been saved!')->with('msgstatus','success');
		} else {
			return Redirect::to('user/profile')->with('messagetext','The following errors occurred')->with('msgstatus','error')
			->withErrors($validator)->withInput();
		}	
	
	}
	
	public function postSavepassword( Request $request)
	{
		$rules = array(
			'password'=>'required|between:6,12',
			'password_confirmation'=>'required|between:6,12'
			);		
		$validator = Validator::make($request->all(), $rules);
		if ($validator->passes()) {
			$user = User::find(\Session::get('uid'));
			$user->password = \Hash::make($request->input('password'));
			$user->save();

			return Redirect::to('user/profile')->with('message', \SiteHelpers::alert('success','Password has been saved!'));
		} else {
			return Redirect::to('user/profile')->with('message', \SiteHelpers::alert('error','The following errors occurred')
			)->withErrors($validator)->withInput();
		}	
	
	}	
	
	public function getReminder()
	{
	
		return view('user.remind');
	}	

	public function postRequest( Request $request)
	{

		$rules = array(
			'credit_email'=>'required|email'
		);	
		
		$validator = Validator::make(Input::all(), $rules);
		if ($validator->passes()) {	
	
			$user =  User::where('email','=',$request->input('credit_email'));
			if($user->count() >=1)
			{
				$user = $user->get();
				$user = $user[0];
				$data = array('token'=>$request->input('_token'));	
				$to = $request->input('credit_email');
				$subject = "[ " .CNF_APPNAME." ] REQUEST PASSWORD RESET "; 			
				$message = view('user.emails.auth.reminder', $data);
				$headers  = 'MIME-Version: 1.0' . "\r\n";
				$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
				$headers .= 'From: '.CNF_APPNAME.' <'.CNF_EMAIL.'>' . "\r\n";
					mail($to, $subject, $message, $headers);				
			
				
				$affectedRows = User::where('email', '=',$user->email)
								->update(array('reminder' => $request->input('_token')));
								
				return Redirect::to('user/login')->with('message', \SiteHelpers::alert('success','Please check your email'));	
				
			} else {
				return Redirect::to('user/login')->with('message', \SiteHelpers::alert('error','Cant find email address'));
			}

		}  else {
			return Redirect::to('user/login')->with('message', \SiteHelpers::alert('error','The following errors occurred')
			)->withErrors($validator)->withInput();
		}	 
	}	
	
	public function getReset( $token = '')
	{
		if(\Auth::check()) return Redirect::to('dashboard');

		$user = User::where('reminder','=',$token);
		if($user->count() >=1)
		{
			$data = array('verCode'=>$token);
			return view('user.remind',$data);	
		} else {
			return Redirect::to('user/login')->with('message', \SiteHelpers::alert('error','Cant find your reset code'));
		}
		
	}	
	
	public function postDoreset( Request $request , $token = '')
	{
		$rules = array(
			'password'=>'required|alpha_num|between:6,12|confirmed',
			'password_confirmation'=>'required|alpha_num|between:6,12'
			);		
		$validator = Validator::make($request->all(), $rules);
		if ($validator->passes()) {
			
			$user =  User::where('reminder','=',$token);
			if($user->count() >=1)
			{
				$data = $user->get();
				$user = User::find($data[0]->id);
				$user->reminder = '';
				$user->password = \Hash::make($request->input('password'));
				$user->save();			
			}

			return Redirect::to('user/login')->with('message',\SiteHelpers::alert('success','Password has been saved!'));
		} else {
			return Redirect::to('user/reset/'.$token)->with('message', \SiteHelpers::alert('error','The following errors occurred')
			)->withErrors($validator)->withInput();
		}	
	
	}	

	public function getLogout() {
		\Auth::logout();
		\Session::flush();
		return Redirect::to('')->with('message', \SiteHelpers::alert('info','Your are now logged out!'));
	}

	function getSocialize( $social )
	{
		return Socialize::with($social)->redirect();
	}

	function getAutosocial( $social )
	{
		$user = Socialize::with($social)->user();
		$user =  User::where('email',$user->email)->first();
		return self::autoSignin($user);		
	}


	function autoSignin($user)
	{

		if(is_null($user)){
		  return Redirect::to('user/login')
				->with('message', \SiteHelpers::alert('error','You have not registered yet '))
				->withInput();
		} else{

		    Auth::login($user);
			if(Auth::check())
			{
				$row = User::find(\Auth::user()->id); 

				if($row->active =='0')
				{
					// inactive 
					Auth::logout();
					return Redirect::to('user/login')->with('message', \SiteHelpers::alert('error','Your Account is not active'));

				} else if($row->active=='2')
				{
					// BLocked users
					Auth::logout();
					return Redirect::to('user/login')->with('message', \SiteHelpers::alert('error','Your Account is BLocked'));
				} else {
					Session::put('uid', $row->id);
					Session::put('gid', $row->group_id);
					Session::put('eid', $row->group_email);
					Session::put('fid', $row->first_name.' '. $row->last_name);	
					if(CNF_FRONT =='false') :
						return Redirect::to('dashboard');						
					else :
						return Redirect::to('');
					endif;					
					
										
				}
				
				
			}
		}

	}
	
}