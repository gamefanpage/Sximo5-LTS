<?php
$tpl['masterdetailmodel'] = str_replace("/","","\$this->modelview = new  \App\Models\/".$module."();");
$tpl['masterdetaildelete'] = '\DB::table(\''.$info['table'].'\')->where(\''.$info['key'].'\',$request->input(\'id\'))->delete();';
$tpl['masterdetailform'] = '	

	@if($subgrid[\'access\'][\'is_add\'] == \'1\')				
	<hr /><div class="clr clear"></div>	
	
	<h5> '.$info['title'].' </h5>
	
	<div class="table-responsive">
	    <table class="table table-striped ">
	        <thead>
				<tr>
					@foreach ($subgrid[\'tableGrid\'] as $t)
						@if($t[\'view\'] ==\'1\' && $t[\'field\'] !=\''.$info['master_key'].'\')
							<th>
							{{ SiteHelpers::activeLang($t[\'label\'],(isset($t[\'language\'])? $t[\'language\'] : array())) }}
							</th>
						@endif
					@endforeach
					<th></th>	
				  </tr>

	        </thead>

        <tbody>
        @if(count($subgrid[\'rowData\'])>=1)
            @foreach ($subgrid[\'rowData\'] as $rows)
	            <tr class="clone clonedInput">									
					 @foreach ($subgrid[\'tableGrid\'] as $field)
						 @if($field[\'view\'] ==\'1\' && $field[\'field\'] !=\''.$info['master_key'].'\')
						 <td>					 
						 	{!! SiteHelpers::bulkForm($field[\'field\'] , $subgrid[\'tableForm\'] , $rows->$field[\'field\']) !!}							 
						 </td>
						 @endif					 
					 
					 @endforeach
					 <td>
					 	<a onclick=" $(this).parents(\'.clonedInput\').remove(); return false" href="#" class="remove btn btn-xs btn-danger">-</a>
					 	<input type="hidden" name="counter[]">
					 </td>
				</tr>  
			@endforeach
			

		@else

            <tr class="clone clonedInput">								
			 @foreach ($subgrid[\'tableGrid\'] as $field)

				 @if($field[\'view\'] ==\'1\' && $field[\'field\'] !=\''.$info['master_key'].'\')
				 <td>					 
				 	{!! SiteHelpers::bulkForm($field[\'field\'] , $subgrid[\'tableForm\'] ) !!}							 
				 </td>
				 @endif					 
			 
			 @endforeach
				 <td>
				 	<a onclick=" $(this).parents(\'.clonedInput\').remove(); return false" href="#" class="remove btn btn-xs btn-danger">-</a>
				 	<input type="hidden" name="counter[]">
				 </td>
			
			</tr> 	
		@endif	


        </tbody>	

     	</table>  
    	<input type="hidden" name="enable-masterdetail" value="true">
    </div><br /><br />
     
     <a href="javascript:void(0);" class="addC btn btn-xs btn-info" rel=".clone"><i class="fa fa-plus"></i> New Item</a>
     <hr />		
	@endif
     ';

$tpl['masterdetailview'] ='	
	@if($subgrid[\'access\'][\'is_detail\'] == \'1\')	
		<hr />	
		<h5> '.$info['title'].' </h5>
	
		<div class="table-responsive">
	    <table class="table table-striped ">
	        <thead>
				<tr>
					<th class="number"> No </th>
						@foreach ($subgrid[\'tableGrid\'] as $t)
						@if($t[\'view\'] ==\'1\')
							<th>
								{{ SiteHelpers::activeLang($t[\'label\'],(isset($t[\'language\'])? $t[\'language\'] : array())) }}
							</th>
						@endif
					@endforeach
					
				  </tr>
	        </thead>

	        <tbody>
	            @foreach ($subgrid[\'rowData\'] as $row)
	            <tr>
					<td width="30">  </td>		
				 @foreach ($subgrid[\'tableGrid\'] as $field)
					 @if($field[\'view\'] ==\'1\' )
					 <td>					 
					 	@if($field[\'attribute\'][\'image\'][\'active\'] ==\'1\')
							{!! SiteHelpers::showUploadedFile($row->$field[\'field\'],$field[\'attribute\'][\'image\'][\'path\']) !!}
						@else	
							{{--*/ $conn = (isset($field[\'conn\']) ? $field[\'conn\'] : array() ) /*--}}
							{!! SiteHelpers::gridDisplay($row->$field[\'field\'],$field[\'field\'],$conn) !!}	
						@endif						 
					 </td>
					 @endif					 
				 
				 @endforeach
				@endforeach
				</tr> 


	        </tbody>	

	     </table>   
	     </div>
	@endif
     ';     

$tpl['masterdetailjs'] = '$(\'.addC\').relCopy({});';     
