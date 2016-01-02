
 {{ Form::open(array('url'=>$pageModule.'/quicksave/', 'class'=>'form-horizontal' ,'id' =>$pageModule.'Form' )) }}

 <div class="table-responsive">
 @if(count($rowData)>=1)
    <table class="table table-striped  " id="{{ $pageModule }}Table">
        <thead>
			<tr>
				<th> No </th>				
				<?php foreach ($tableGrid as $t) :
					if($t['view'] =='1'):
						echo '<th align="'.$t['align'].'">'.SiteHelpers::activeLang($t['label'],(isset($t['language'])? $t['language'] : array())).'</th>';
					endif;
				endforeach; ?>
				<th width="70"></th>
			  </tr>
        </thead>
        <tbody>
        	<?php if($access['is_add'] ==1) :?>
			<tr>
				<td> # </td>
				@foreach ($tableGrid as $t)
					@if($t['view'] =='1')
					<td>						
						{{ SiteHelpers::transForm($t['field'] , $tableForm) }}								
					</td>
					@endif
				@endforeach
				<td >
					<input type="hidden" name="{{$primarykey}}" value="">
					<button type="button"  class=" btn btn-xs btn-info" rel="#{{ $pageModule }}Form" 
					onclick="ajaxInlineSave('#{{ $pageModule }}','{{ URL::to($pageModule.'/quicksave') }}','{{ URL::to($pageModule.'/detailview/form?md='.$filtermd) }}')">
					<i class="fa fa-save"></i> Save </button>
				</td>
			  </tr>	
			  <?php endif; ?>
				
           		<?php $i=0; foreach ($rowData as $row) : $n = ++$i; ?>
                <tr id="{{ $pageModule }}-<?php echo $n;?>">
					<td width="50"> <?php echo $n;?>  </td>
											
					 <?php foreach ($tableGrid as $field) :
						 if($field['view'] =='1') : ?>
						 <td align="<?php echo $field['align'];?>">					 
							<?php 
							$conn = (isset($field['conn']) ? $field['conn'] : array() );
							echo AjaxHelpers::gridFormater($row->$field['field'], $row , $field['attribute'],$conn);?>	
							<span style="display:none;"><?php echo $field['field'].':'.$row->$field['field'];?></span>						 
						 </td>
						 <?php endif;					 
						endforeach; 
					  ?>
					  <td>
					  	<span style="display:none;">{{$primarykey}}:{{$row->$primarykey}}</span>
					  	<?php if($access['is_edit'] ==1) :?>
					  	<a href="javascript:void(0)" class=" btn btn-xs btn-info" onclick="ajaxInlineEdit('#{{ $pageModule }}-{{$n}}');" 	><i class="fa fa-pencil"></i></a>
					  	<?php endif;
					  	if($access['is_remove'] ==1) :?>					  	
					  	<a href="javascript:void(0)" onclick="ajaxInlineRemove('#{{ $pageModule }}-{{$n}}','{{ URL::to($pageModule."/removerow/".$row->$primarykey) }}')" class=" quickRemove btn btn-xs btn-danger" ><i class="fa fa-minus"></i></a>
					  	<?php endif; ?>
					  </td>			 
                </tr>
				
            <?php endforeach;?>
              
        </tbody>
      
    </table>
 	@else

	<div style="margin:100px 0; text-align:center;">
	
		<p> Please fill all master fields form </p>
	</div>
	
	@endif   
    </div>
{{ Form::close() }}
	
<script type="text/javascript">
jQuery(function(){
	$('#{{ $pageModule}}Form input[name="{{ $foreignKey}}"]').val('{{ $foreignVal}}'); $('input[name="{{ $foreignKey}}"]').attr('readonly','1');

})

</script>
