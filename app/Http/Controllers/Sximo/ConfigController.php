<?php namespace App\Http\Controllers\sximo;

use App\Http\Controllers\controller;
use App\Models\Core\Groups;
use App\User;
use Illuminate\Http\Request;
use Validator, Input, Redirect; 

class ConfigController extends Controller {

    public function __construct()
    {
    	parent::__construct();
		if( \Auth::check() or \Session::get('gid') != '1')
		{
		//	echo 'redirect';
			return Redirect::to('dashboard');
		};
       
    }

	public function getIndex()
	{	
		$this->data['active'] = '';
		return view('sximo.config.index',$this->data);	
	}


	static function postSave( Request $request )
	{
		
		$rules = array(
			'cnf_appname'=>'required|min:2',
			'cnf_appdesc'=>'required|min:2',
			'cnf_comname'=>'required|min:2',
			'cnf_email'=>'required|email',
		);
		$validator = Validator::make($request->all(), $rules);	
		if (!$validator->fails()) 
		{
			$logo = '';
			if(!is_null(Input::file('logo')))
			{

				$file = Input::file('logo'); 
			 	$destinationPath = public_path().'/sximo/images/'; 
				$filename = $file->getClientOriginalName();
				$extension =$file->getClientOriginalExtension(); //if you need extension of the file
				$logo = 'backend-logo.'.$extension;
				$uploadSuccess = $file->move($destinationPath, $logo);
			}

			$val  =		"<?php \n"; 
			$val .= 	"define('CNF_APPNAME','".$request->input('cnf_appname')."');\n";
			$val .= 	"define('CNF_APPDESC','".$request->input('cnf_appdesc')."');\n";
			$val .= 	"define('CNF_COMNAME','".$request->input('cnf_comname')."');\n";
			$val .= 	"define('CNF_EMAIL','".$request->input('cnf_email')."');\n";	
			$val .= 	"define('CNF_METAKEY','".$request->input('cnf_metakey')."');\n";	
			$val .= 	"define('CNF_METADESC','".$request->input('cnf_metadesc')."');\n";		
			$val .= 	"define('CNF_GROUP','".CNF_GROUP."');\n";	
			$val .= 	"define('CNF_ACTIVATION','".CNF_ACTIVATION."');\n";	
			$val .= 	"define('CNF_MULTILANG','".(!is_null($request->input('cnf_multilang')) ? 1 : 0 )."');\n";
			$val .= 	"define('CNF_LANG','".$request->input('cnf_lang')."');\n";
			$val .= 	"define('CNF_REGIST','".CNF_REGIST."');\n";	
			$val .= 	"define('CNF_FRONT','".CNF_FRONT."');\n";		
			$val .= 	"define('CNF_RECAPTCHA','".CNF_RECAPTCHA."');\n";	
			$val .= 	"define('CNF_THEME','".$request->input('cnf_theme')."');\n";		
			$val .= 	"define('CNF_RECAPTCHAPUBLICKEY','".CNF_RECAPTCHAPUBLICKEY."');\n";
			$val .= 	"define('CNF_RECAPTCHAPRIVATEKEY','".CNF_RECAPTCHAPRIVATEKEY."');\n";
			$val .= 	"define('CNF_MODE','".(!is_null($request->input('cnf_mode')) ? 'production' : 'development' )."');\n";	
			$val .= 	"define('CNF_LOGO','".($logo !=''  ? $logo : CNF_LOGO )."');\n";		
			$val .= 	"define('CNF_ALLOWIP','".CNF_ALLOWIP."');\n";
			$val .= 	"define('CNF_RESTRICIP','".CNF_RESTRICIP."');\n";									

			$val .= 	"?>";
	
			$filename = base_path().'/setting.php';
			$fp=fopen($filename,"w+"); 
			fwrite($fp,$val); 
			fclose($fp); 
			return Redirect::to('sximo/config')->with('messagetext','Setting Has Been Save Successful')->with('msgstatus','success');
		} else {
			return Redirect::to('sximo/config')->with('messagetext', 'The following errors occurred')->with('msgstatus','success')
			->withErrors($validator)->withInput();
		}			
	
	}




	public function getEmail()
	{
		
		$regEmail = base_path()."/resources/views/user/emails/registration.blade.php";
		$resetEmail = base_path()."/resources/views/user/emails/auth/reminder.blade.php";
		$this->data = array(
			'groups'	=> Groups::all(),
			'pageTitle'	=> 'Blast Email',
			'pageNote'	=> 'Send email to users',
			'regEmail' 	=> file_get_contents($regEmail),
			'resetEmail'	=> 	file_get_contents($resetEmail),
			'active'		=> 'email',
		);	
		return view('sximo.config.email',$this->data);		
	
	}
	
	function postEmail( Request $request)
	{
		
		//print_r($_POST);exit;
		$rules = array(
			'regEmail'		=> 'required|min:10',
			'resetEmail'		=> 'required|min:10',				
		);	
		$validator = Validator::make($request->all(), $rules);	
		if ($validator->passes()) 
		{
			$regEmailFile = base_path()."/resources/views/user/emails/registration.blade.php";
			$resetEmailFile = base_path()."/resources/views/user/emails/auth/reminder.blade.php";			
			
			$fp=fopen($regEmailFile,"w+"); 				
			fwrite($fp,$_POST['regEmail']); 
			fclose($fp);	
			
			$fp=fopen($resetEmailFile,"w+"); 				
			fwrite($fp,$_POST['resetEmail']); 
			fclose($fp);
			
			return Redirect::to('sximo/config/email')->with('messagetext', 'Email Has Been Updated')->with('msgstatus','success');	
			
		}	else {

			return Redirect::to('sximo/config/email')->with('messagetext', 'The following errors occurred')->with('msgstatus','success')
			->withErrors($validator)->withInput();
		}
	
	}
	
	public function getSecurity()
	{
		
		$this->data = array(
			'groups'	=> Groups::all(),
			'pageTitle'	=> 'Login And Security',
			'pageNote'	=> 'Login Configuration and Setting',
			'active'	=> 'security'
			
		);
		
	
		return view('sximo.config.security',$this->data);		
	
	}	
	
		

	
	public function postLogin( Request $request)
	{

		$rules = array(

		);
		$validator = Validator::make($request->all(), $rules);	
		if ($validator->passes()) {
			$val  =		"<?php \n"; 
			$val .= 	"define('CNF_APPNAME','".CNF_APPNAME."');\n";
			$val .= 	"define('CNF_APPDESC','".CNF_APPDESC."');\n";
			$val .= 	"define('CNF_COMNAME','".CNF_COMNAME."');\n";
			$val .= 	"define('CNF_EMAIL','".CNF_EMAIL."');\n";
			$val .= 	"define('CNF_METAKEY','".CNF_METAKEY."');\n";	
			$val .= 	"define('CNF_METADESC','".CNF_METADESC."');\n";					
			$val .= 	"define('CNF_GROUP','".$request->input('CNF_GROUP')."');\n";	
			$val .= 	"define('CNF_ACTIVATION','".$request->input('CNF_ACTIVATION')."');\n";	
			$val .= 	"define('CNF_MULTILANG','".CNF_MULTILANG."');\n";
			$val .= 	"define('CNF_LANG','".CNF_LANG."');\n";		
			$val .= 	"define('CNF_REGIST','".(!is_null($request->input('CNF_REGIST')) ? 'true':'false')."');\n";		
			$val .= 	"define('CNF_FRONT','".(!is_null($request->input('CNF_FRONT')) ? 'true':'false')."');\n";		
			$val .= 	"define('CNF_RECAPTCHA','".(!is_null($request->input('CNF_RECAPTCHA')) ? 'true':'false')."');\n";	
			$val .= 	"define('CNF_THEME','".CNF_THEME."');\n";	
			$val .= 	"define('CNF_RECAPTCHAPUBLICKEY','');\n";
			$val .= 	"define('CNF_RECAPTCHAPRIVATEKEY','');\n";
			$val .= 	"define('CNF_MODE','".CNF_MODE."');\n";	
			$val .= 	"define('CNF_LOGO','".CNF_LOGO."');\n";
			$val .= 	"define('CNF_ALLOWIP','".$request->input('CNF_ALLOWIP')."');\n";
			$val .= 	"define('CNF_RESTRICIP','".$request->input('CNF_RESTRICIP')."');\n";									
			$val .= 	"?>";
	
			$filename = '../setting.php';
			$fp=fopen($filename,"w+"); 
			fwrite($fp,$val); 
			fclose($fp); 
			return Redirect::to('sximo/config/security')->with('messagetext','Setting Has Been Save Successful')->with('msgstatus','success');
		} else {
			return Redirect::to('sximo/config/security')->with('messagetext', 'The following errors occurred')->with('msgstatus','error')
			->withErrors($validator)->withInput();
		}	
	}
	
	public function getLog( $type = null)
	{
	
		
		$this->data = array(
			'pageTitle'	=> 'Help Manual',
			'pageNote'	=> 'Documentation',
			'active'	=> 'log'
		);	
		return view('sximo.config.log',$this->data);	
	}
		
	
	public function getClearlog()
	{
		
		$dir = base_path()."/storage/logs";	
		foreach(glob($dir . '/*') as $file) {
			if(is_dir($file))
			{
				//removedir($file);
			} else {

				unlink($file);
			}
		}

		$dir = base_path()."/storage/framework/views";	
		foreach(glob($dir . '/*') as $file) {
			if(is_dir($file))
			{
				//removedir($file);
			} else {
				
				unlink($file);
			}
		}		

		return Redirect::to('sximo/config/log')->with('messagetext','Cache has been cleared !')->with('msgstatus','success');	
	}
	
	function removeDir($dir) {
		foreach(glob($dir . '/*') as $file) {
			if(is_dir($file))
				removedir($file);
			else
				unlink($file);
		}
		rmdir($dir);
	}
	
	public function getTranslation( Request $request, $type = null)
	{
		if(!is_null($request->input('edit')))
		{
			$file = (!is_null($request->input('file')) ? $request->input('file') : 'core.php'); 
			$files = scandir(base_path()."/resources/lang/".$request->input('edit')."/");

			//$str = serialize(file_get_contents('./protected/app/lang/'.$request->input('edit').'/core.php'));
			$str = \File::getRequire(base_path()."/resources/lang/".$request->input('edit').'/'.$file);
			
			
			$this->data = array(
				'pageTitle'	=> 'Help Manual',
				'pageNote'	=> 'Documentation',
				'stringLang'	=> $str,
				'lang'			=> $request->input('edit'),
				'files'			=> $files ,
				'file'			=> $file ,
			);	
			$template = 'edit';
		
		} else {

			$this->data = array(
				'pageTitle'	=> 'Help Manual',
				'pageNote'	=> 'Documentation',
			);	
			$template = 'index';		
		
		}

		return view('sximo.config.translation.'.$template,$this->data);	
	}
	
	public function getAddtranslation()
	{
		return view("sximo.config.translation.create");
	} 
	
	public function postAddtranslation( Request $request)
	{
		$rules = array(
			'name'		=> 'required',
			'folder'	=> 'required|alpha',
			'author'	=> 'required',
		);
		$validator = Validator::make($request->all(), $rules);	
		if ($validator->passes()) {

			$template = base_path();

			$folder = $request->input('folder');
			mkdir( $template."/resources/lang/".$folder ,0777 );	
			
			$info = json_encode(array("name"=> $request->input('name'),"folder"=> $folder , "author" => $request->input('author')));
			$fp=fopen(  $template.'/resources/lang/'.$folder.'/info.json',"w+"); 
			fwrite($fp,$info); 
			fclose($fp); 	
					
			$files = scandir( $template .'/resources/lang/en/');
			foreach($files as $f)
			{
				if($f != "." and $f != ".." and $f != 'info.json')
				{
					copy( $template .'/resources/lang/en/'.$f, $template .'/resources/lang/'.$folder.'/'.$f);
				}
			}
			return Redirect::to('sximo/config/translation')->with('messagetect','New Translation has been added !')->with('msgstatus','success');	;			
			
		} else {
			return Redirect::to('sximo/config/translation')->with('messagetext','Failed to add translation !' )->with('msgstatus','error')->withErrors($validator)->withInput();
		}		
	
	}
	
	public function postSavetranslation( Request $request)
	{
		$template = base_path();
		
		$form  	= "<?php \n"; 
		$form 	.= "return array( \n";
		foreach($_POST as $key => $val)
		{
			if($key !='_token' && $key !='lang' && $key !='file') 
			{
				if(!is_array($val))
				{
					$form .= '"'.$key.'"			=> "'.strip_tags($val).'", '." \n ";
				
				} else {
					$form .= '"'.$key.'"			=> array( '." \n ";
					foreach($val as $k=>$v)
					{
							$form .= '      "'.$k.'"			=> "'.strip_tags($v).'", '." \n ";
					}
					$form .= "), \n";
				}
			}		
		
		}
		$form .= ');';
		//echo $form; exit;
		$lang = $request->input('lang');
		$file	= $request->input('file');
		$filename = $template .'/resources/lang/'.$lang.'/'.$file;
	//	$filename = 'lang.php';
		$fp=fopen($filename,"w+"); 
		fwrite($fp,$form); 
		fclose($fp); 	
		return Redirect::to('sximo/config/translation?edit='.$lang.'&file='.$file)
		->with('messagetext','Translation has been saved !')->with('msgstatus','success');	
	
	} 	
	
	public function getRemovetranslation( $folder )
	{
		self::removeDir( base_path()."/resources/lang/".$folder);
		return Redirect::to('sximo/config/translation')->with('messagetext','Translation has been removed !')->with('msgstatus','success');	
		
	}		


}