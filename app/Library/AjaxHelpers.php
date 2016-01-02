<?php


class AjaxHelpers
{

	public static function gridFormater($val , $row, $attribute = array() , $arr = array()) 
	{

		if($attribute['image']['active'] =='1' && $attribute['image']['active'] !='') {
			$val =  SiteHelpers::showUploadedFile($val,$attribute['image']['path']) ;
		}
		// Handling Quick Display As 
		if(isset($arr['valid']) && $arr['valid'] ==1)
		{
			$fields = str_replace("|",",",$arr['display']);			

			if(isset( $arr['multiple']) && $arr['multiple'] =='1')
			{
				$Q = DB::select(" SELECT ".$fields." FROM ".$arr['db']." WHERE ".$arr['key']." IN (".$val.") ");
				if(count($Q) >= 1 )
				{	
					$fields = explode("|",$arr['display']);


					$val = array();
					foreach($Q as $values)
					{
						$v= '';
						$v .= (isset($fields[0]) && $fields[0] !='' ?  $values->$fields[0].' ' : '');
						$v .= (isset($fields[1]) && $fields[1] !=''  ? $values-> $fields[1].' ' : '');
						$v .= (isset($fields[2]) && $fields[2] !=''  ? $values->$fields[2].' ' : '');
						$val[] = $v;
					}

					$val = implode(", ",$val);
				}	

			} else {
				$Q = DB::select(" SELECT ".$fields." FROM ".$arr['db']." WHERE ".$arr['key']." = '".$val."' ");
				if(count($Q) >= 1 )
				{					
					$rowObj = $Q[0];
					$fields = explode("|",$arr['display']);
					$v= '';
					$v .= (isset($fields[0]) && $fields[0] !='' ?  $rowObj->$fields[0].' ' : '');
					$v .= (isset($fields[1]) && $fields[1] !=''  ? $rowObj-> $fields[1].' ' : '');
					$v .= (isset($fields[2]) && $fields[2] !=''  ? $rowObj->$fields[2].' ' : '');
					$val = $v;
				} 	
			}				
		} 	
		
		// Handling format function 	
		if(isset($attribute['formater']['active']) and $attribute['formater']['active']  ==1)
		{
			$val = $attribute['formater']['value'];
			foreach($row as $k=>$i)
			{
				if (preg_match("/$k/",$val))
					$val = str_replace($k,$i,$val);				
			}
			$c = explode("|",$val);
			if(isset($c[0]) && class_exists($c[0]))
			{
				$val = call_user_func( array($c[0],$c[1]), str_replace(":",",",$c[2])); 
				//$val = $c[2];
			}	
			
		}
		// Handling Link  function 	
		if(isset($attribute['hyperlink']['active']) && $attribute['hyperlink']['active'] ==1 && $attribute['hyperlink']['link'] != '')
		{	
	
			$attr = '';
			$linked = $attribute['hyperlink']['link'];
			foreach($row as $k=>$i)
			{
				
				if (preg_match("/$k/",$attribute['hyperlink']['link']))
					$linked = str_replace($k,$i, $linked);				
			}
			if($attribute['hyperlink']['target'] =='modal')
			{
				$attr = "onclick='SximoModal(this.href); return false'";
			}
			
			$val =  "<a href='".URL::to($linked)."'  $attr style='display:block' >".$val." <span class='fa fa-arrow-circle-right pull-right'></span></a>";
		}
		
		
		
		return $val;
		
	}	
	
	static public function fieldLang( $fields ) 
	{ 
		$l = array();
		foreach($fields as $fs)
		{			
			foreach($fs as $f)
				$l[$fs['field']] = $fs; 									
		}
		return $l;	
	}	
	
	static public function instanceGrid(  $class) 
	{
		$data = array(
			'class'	=> $class ,
		);
		return View::make('admin.module.utility.instance',$data);
	
	}  

	static function inlineFormType( $field  ,$forms )
	{
		$type = '';
		foreach($forms as $f)
		{
			if($f['field'] == $field )
			{
				$type = ($f['type'] !='file' ? $f['type'] : ''); 			
			}	
		}
		if($type =='select' || $type="radio" || $type =='checkbox')
		{
			$type = 'select';
		} else if($type=='file') {
			$type = '';
		} else {
			$type = 'text';
		}
		return $type;
	}

	static public function buttonAction( $module , $access , $id , $setting)
	{

		$html ='<div class=" action dropup" >';
		if($access['is_detail'] ==1) {
			if($setting['view-method'] != 'expand')
			{
				$onclick = " onclick=\"ajaxViewDetail('#".$module."',this.href); return false; \"" ;
				if($setting['view-method'] =='modal')
						$onclick = " onclick=\"SximoModal(this.href,'View Detail'); return false; \"" ;
				$html .= '<a href="'.URL::to($module.'/show/'.$id).'" '.$onclick.' class="btn btn-xs btn-white tips" title="'.Lang::get('core.btn_view').'"><i class="fa fa-search"></i></a>';
			}
		}
		if($access['is_edit'] ==1) {
			$onclick = " onclick=\"ajaxViewDetail('#".$module."',this.href); return false; \"" ;
			if($setting['form-method'] =='modal')
					$onclick = " onclick=\"SximoModal(this.href,'Edit Form'); return false; \"" ;			
			
			$html .= ' <a href="'.URL::to($module.'/update/'.$id).'" '.$onclick.'  class="btn btn-xs btn-white tips" title="'.Lang::get('core.btn_edit').'"><i class="fa  fa-edit"></i></a>';
		}
		$html .= '</div>';
		return $html;
	}	

	static public function buttonActionInline( $id ,$key )
	{
		$divid = 'form-'.$id;	
		$html = '
		<div class="actionopen" style="display:none">
			<button onclick="saved(\''.$divid.'\')" class="btn btn-primary btn-xs" type="button"><i class="fa  fa-save"></i></button>
			<button onclick="canceled(\''.$divid.'\')" class="btn btn-danger btn-xs " type="button"><i class="fa  fa-repeat"></i></button>
			<input type="hidden" value="'.$id.'" name="'.$key.'">
		</div>	
		';
		return $html;
	}			

	static public function buttonActionCreate( $module  ,$method = 'newpage')
	{
		$onclick = " onclick=\"ajaxViewDetail('#".$module."',this.href); return false; \"" ;
		if($method['form-method'] =='modal')
				$onclick = " onclick=\"SximoModal(this.href,'Create Detail'); return false; \"" ;


		$html = '
			<a href="'.URL::to($module.'/update').'" class="tips btn btn-sm btn-white"  title="'.Lang::get('core.btn_create').'" '.$onclick.'>
			<i class="fa fa-plus "></i> '.Lang::get('core.btn_create').'</a>
		';
		return $html;
	}

	static public function htmlExpandGrid()
	{

		return View::make('sximo.module.utility.extendgrid');
	}

	static public function oneToMany( $field , $field2 ='' , $field3 = '')
	{

		return $field . $field2 . $field3;
	}

	public static function myFunc( $param )
	{

		return 'hahai = '.$param ;
	}




}