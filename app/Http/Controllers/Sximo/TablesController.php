<?php namespace App\Http\Controllers\sximo;

use App\Http\Controllers\controller;
use App\Groups;
use App\Models\Sximo\Module;
use App\User;
use Illuminate\Http\Request;
use Validator, Input, Redirect; 

class TablesController extends Controller 
{

	public function __construct()
	{
		parent::__construct();
	}	

   	public function getIndex()
	{
		$this->data['tables'] = Module::getTableList($this->db);    
		return view('sximo.tables.index',$this->data);
	}   
    
    public function getTableconfig( $table = null )
    {
            
        //DB::select("SHOW COLUMNS FROM $table");
        $columns = array();
        $info = \DB::select("SHOW TABLE STATUS FROM `" . $this->db . "` WHERE `name` = '" . $table . "'");
        if(count($info)>=1)
        {
            $info = $info[0];
        }
        if($table != null)
        {
            foreach(\DB::select("SHOW FULL COLUMNS FROM `$table`") as $column)
            {
              // echo '<pre>';print_r($column);echo '</pre>';
                $columns[] = $column;
            }
        }   
        $this->data['default'] = array('NULL','USER_DEFINED','CURRENT_TIMESTAMP');
        $this->data['tbtypes'] = array('bigint','binary','bit','blob','bool','boolean','char','date','datetime','decimal','double','enum','float','int','longblob','longtext','mediumblob','mediuminit','mediumtext','numerice','real','set','smallint','text','time','timestamp','tinyblob','tinyint','tinytext','varbinary','varchar','year');
        
        $this->data['engine'] = array('MyISAM','InnoDB');
        $this->data['info'] = $info;
                
        $this->data['columns'] = $columns;
        $this->data['table'] = $table;
        $this->data['action'] = ($table ==null ? 'sximo/tables/tables/'.$table : 'sximo/tables/tableinfo/'.$table ) ;
        return view('sximo.tables.config',$this->data);
    }   

    public function postTables( Request $request, $currtable = null )
    {
        $table  = $request->input('table_name');
        $engine = $request->input('engine');

        $comma = ",";
        $sql = "CREATE TABLE `" . $table . "` (\n";
        $posts = $request->input('fields');
        for($i=0; $i<count($posts);$i++)
        {
            $field      = $request->input('fields')[$i];
            if(!empty($field ))
            {
                $type       = $request->input('types')[$i];
                $lenght     = self::lenght($type,$request->input('lenghts')[$i]);
                $default    = $request->input('defaults')[$i];
                $null       = (isset($request->input('null')[$i]) ? 'NOT NULL' : '') ;
                $ai         = (isset($request->input('ai')[$i]) ? 'AUTO_INCREMENT' : '') ;   

                if ($null != "" and $ai =='AUTO_INCREMENT') {
                    $default = '';  
                } elseif ($null == "" && $default !='') {

                    $default = "DEFAULT '".$default."'";
                } else {     
                    if($null == 'NOT NULL')   
                    {
                        $default = " ";
                    }  else {
                        $default = " DEFAULT NULL ";
                    }           
                    
                }

                    $sql .= " `$field` $type $lenght  $null $default $ai ". ",\n";  
            }

        }
        $primarykey         = $request->input('key');
        if(count(   $primarykey ) >=1 )
        {
            $ai = array();
            for($i=0; $i<count($posts);$i++)
            {
                if(isset($request->input('key')[$i]) )
                {
                    $ai[] = $request->input('fields')[$i]; 
                }
            }   
            
            $sql .= 'PRIMARY KEY (`'.implode('`,`', $ai).'`)'. "\n";    
        }
       
        $sql .= ") ENGINE=$engine DEFAULT CHARSET=utf8 ";

        //if($table == null) 
    //  {
            try {

                \DB::select( $sql );

            }catch(Exception $e){

                 echo "<pre>";
                    echo $e;
                    echo "</pre>";
                    exit;
                return \Response::json(array('status'=>'error','message'=> $e));
            }

            return \Response::json(array('status'=>'success','message'=>''));

            
        //} else {
        //  return Response::json(array('status'=>'success','message'=>''));
    //  }


        
    }

    public function postTableremove(Request $request)
    {
        //print_r($_POST);exit;
        if(!is_null($request->input('id')) && count($request->input('id')) >=1 )
        {
            $ids = $request->input('id');
            for($i=0; $i<count($ids);$i++)
            {
                $table = $ids[$i];
                $sql = 'DROP TABLE IF EXISTS `' . $table . '`';
                \DB::select($sql);   
            }
            return Redirect::to('sximo/tables')->with('messagetext', 'Table(s) has been deleted')->with('msgstatus','success');  
        } 
        return Redirect::to('sximo/tables')->with('messagetext','error','No Table(s) deleted !')->with('msgstatus','error');  

    }       

    public function postTableinfo( $table )
    {
        
        $info = DB::select("SHOW TABLE STATUS FROM `" . $this->db . "` WHERE `name` = '" . $table . "'");
        if(count($info)>=1)
        {
            $info = $info[0];

            $table_name = trim($request->input('table_name'));
            $engine = trim($request->input('engine'));

            if($table_name != $info->Name )
            {
                $sql = "RENAME TABLE `" . $info->Name . "` TO  `" . $table_name . "`";  
                try {

                    DB::select( $sql );

                }catch(Exception $e){
                    return Response::json(array('status'=>'error','message'=> $e));
                }               
            }
            if($engine != $info->Engine )
            {
                 
                  $sql = "ALTER TABLE `" . $table_name . "` ENGINE = " . $engine;
                try {

                    DB::select( $sql );

                }catch(Exception $e){
                    return Response::json(array('status'=>'error','message'=> $e));
                }                 
            }   
            return Response::json(array('status'=>'success','message'=> ''));       

        }   


    }

    public function getTablefieldremove( $table,$field)
    {

        $sql = "ALTER TABLE `" . $table . "` DROP COLUMN `" . $field . "`";
        try {

            \DB::statement( $sql );

        }catch(Exception $e){
            return \Response::json(array('status'=>'error','message'=> $e));
        }

        return \Response::json(array('status'=>'success','message'=>''));
    }

    public function getTablefieldedit( $table )
    {
        //return Response::json(array('status'=>'success','message'=>''));
        $fields = $_GET;
        foreach($fields as $key=>$val)
        {
            $this->data[$key] = $val; 
        }

        $this->data['table'] = $table;
        $this->data['tbtypes'] = array('bigint','binary','bit','blob','bool','boolean','char','date','datetime','decimal','double','enum','float','int','longblob','longtext','mediumblob','mediuminit','mediumtext','numerice','real','set','smallint','text','time','timestamp','tinyblob','tinyint','tinytext','varbinary','varchar','year');

        return view('sximo.tables.field',$this->data);
    }
    public function postTablefieldsave( Request $request, $table )
    {

        extract($_POST);

        $type       = $request->input('type');
        $lenght     = self::lenght($type,$request->input('lenght'));
        $default    = $request->input('default');
        $null       = (!is_null($request->input('null')) ? 'NOT NULL' : '') ;
        $ai         = (!is_null($request->input('ai')) ? 'AUTO_INCREMENT' : '') ;    

        if ($null != "" and $ai =='AUTO_INCREMENT') {
            $default = '';  
        } elseif ($null == "" && $default !='') {

                $default = "DEFAULT '".$default."'";
        } else {     
            if($null == 'NOT NULL')   
            {
                $default = "";
            }  else {
                $default = " DEFAULT NULL ";
            }           
            
        }
        $currentfield = $request->input('currentfield');
        if( $currentfield !='')
        {
            if($currentfield == $field )
            {
                $sql = " ALTER TABLE `" . $table . "` MODIFY COLUMN `$field` $type  $lenght   $null $default $ai ";
            }   else {
                $sql = " ALTER TABLE `" . $table . "` CHANGE  `$currentfield` `$field`  $type $lenght   $null $default $ai ";
            }

        } else {
               $sql = " ALTER TABLE `" . $table . "` ADD COLUMN `$field` $type  $lenght   $null $default $ai ";
        }

        

        try {

            \DB::statement( $sql );

        }catch(Exception $e){
            return \Response::json(array('status'=>'error','message'=> $e));
        }

        return \Response::json(array('status'=>'success','message'=>''));
    }   

    static function lenght( $type , $lenght)
    {
        if($lenght == '')
        {
            switch (strtolower(trim( $type))) {
                default ;
                    $lenght = '';
                    break;
                case 'bit':
                   $lenght = '(1)';
                    break;
                case 'tinyint':
                    $lenght = '(4)';
                    break;
                case 'smallint':
                    $lenght = '(6)';
                    break;
                case 'mediumint':
                   $lenght = '(9)';
                    break;
                case 'int':
                    $lenght = '(11)';
                    break;
                case 'bigint':
                   $lenght = '(20)';
                    break;
                case 'decimal':
                    $lenght = '(10,0)';
                    break;
                case 'char':
                    $lenght = '(50)';
                    break;
                case 'varchar':
                   $lenght = '(255)';
                    break;
                case 'binary':
                    $lenght = '(50)';
                    break;
                case 'varbinary':
                    $lenght = '(255)';
                    break;
                case 'year':
                    $lenght = '(4)';
                    break;

            }
            return $lenght;
        } else {
             return "( $lenght )" ;
        }       
    }

    public function getMysqleditor()
    {
        
        return view('sximo.tables.editor');
    }   

    public function postMysqleditor( Request $request)
    {

        $sql = $request->input('statement');
        preg_match_all( '/[\s]*(CREATE|DROP|TRUNCATE)(.*);/Usi',$sql, $sql_table );
        preg_match_all( '/[\s]*(INSERT|UPDATE|DELETE)(.*)[\s\)]+;/Usi',$sql, $sql_row );        
        
        
        try {
            foreach ( $sql_table[0] as $k => $sql ){
              $res = \DB::select( $sql );
            }

            foreach ( $sql_row[0] as $k => $sql ){
              $res = \DB::select( $sql );
            }           
            
        }catch(Exception $e){
            
            return \Response::json(array('status'=>'error','message'=> $e));
        }

        return \Response::json(array('status'=>'success','message'=>''));
    }             


}