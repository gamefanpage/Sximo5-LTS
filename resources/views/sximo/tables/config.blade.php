{!! Form::open(array('url'=>$action, 'class'=>'form-horizontal','id'=>'saveform' , 'parsley-validate'=>'','novalidate'=>' ')) !!}
			<div class="col-md-6 form-horizontal">
				<div class="form-group">
					<label class="col-md-4"> Table Name </label>
					<div class="col-md-8">
						<input type="text" name="table_name" required="true" value="<?php if(isset($info->Name)) echo $info->Name;?>" class="form-control" >
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-4"> Storage Engine </label>
					<div class="col-md-8">
						<select class="form-control" name="engine" required="true">
							@foreach($engine as $e)
							 <option value="{{ $e }}" <?php if(isset($info->Engine) && $info->Engine ==$e) echo 'selected';?> >{{ $e }}</option>
							@endforeach
						</select>
					</div>	
				</div>

				@if($table !='')	
				<div class="form-group">
					<label class="col-md-4">  </label>
					<div class="col-md-8">
						<button type="submit" class=" btn btn-xs btn-danger"> Change Table Info  </button>
					</div>	
				</div>			
				@endif									
			</div>
			<div style="clear:both;"></div>
			<hr />
			
			
		
		<div class="table-responsive" style="background:#fff;">
			<table class="table table-striped" id="tables">
				<thead>
					<tr>
						
						<th> Column Name  </th>
						<th > DataType </th>
						<th  > Lenght/Values </th>
						<th > Default </th>
						
						<th width="75" > Not Null ? </th>
						<th > Key </th>
						<th > A_I </th>
						<th width="75" > Action </th>
					</tr>
				</thead>
				<tbody>
				@if(count($columns) >=1)
				@foreach($columns as $column)
					<tr class="" id="field-{{ $column->Field }}">
						
						<td>{{ $column->Field }}</td>
						<td>
						<?php
						$types = explode('(', $column->Type);
						preg_match("/\((.*)\)/i", $column->Type,$typeVal);
						$type = $types[0];
						$length = (isset($typeVal[1]))?$typeVal[1]:'';
						?>	
						{{ $type }}					
				
						</td>
						<td>{{ $length }}</td>
						<td>                       
                        {{ $column->Default }}						
						</td>
						
						<td> @if($column->Null =='NO') <i class="text-success fa fa-check-circle"></i> @else <i class="text-danger fa fa-minus-circle"></i>  @endif</td>
						<td>
						@if($column->Key =='PRI') <i class="text-success fa fa-check-circle"></i> @else <i class="text-danger fa fa-minus-circle"></i>  @endif
						</td>
						<td>
						@if($column->Extra =='auto_increment') <i class="text-success fa fa-check-circle"></i> @else <i class="text-danger fa fa-minus-circle"></i>  @endif	
						</td>
						<td>
							<?php $info = 'field='.$column->Field.'&type='.$type.'&lenght='.$length.'&default='.$column->Default.'&notnull='.$column->Null.'&key='.$column->Key.'&ai='.$column->Extra; ?>
							<a href="{{ URL::TO('sximo/tables/tablefieldedit/'.$table.'?'.$info) }}" class="btn btn-xs btn-primary" onclick="SximoModal(this.href,'Edit New Column : {{$column->Field}} '); return false;" ><i class="fa fa-edit "></i></a>
							<a href="{{ URL::TO('sximo/tables/tablefieldremove/'.$table.'/'.$column->Field) }}" rel="#field-{{ $column->Field }}" class="removedField  btn btn-xs btn-danger"><i class="fa fa-minus"></i></a>
						</td>
										
					</tr>
				@endforeach
				@else
					<tr class="clone clonedInput">
						
						<td><input type="text" name="fields[]" value="" class="form-control" required="true" ></td>
						<td>					
                        <select name="types[]" class="form-control" >
							@foreach($tbtypes as $t)
							 <option value="{{ $t }}" >{{ $t }}</option>
							@endforeach
                        </select>					
						</td>
						<td>

						<input type="text" name="lenghts[]" value="" class="form-control" ></td>
						<td>                        

                        
                        <input type="text" name="defaults[]" class="form-control" />							
						</td>
						
						<td><input type="checkbox" name="null[]" value="1"  /></td>
						<td><input type="checkbox" name="key[]" value="1"/></td>
						<td><input type="checkbox"name="ai[]" value="1"/></td>
						<td>
							
							<a onclick=" $(this).parents('.clonedInput').remove(); return false" href="#" class="remove btn btn-xs btn-danger">-</a>	
						</td>
										
					</tr>

				@endif
				</tbody>
			
			</table>
		
		</div>
		<hr />
		@if($table == '')
		<a href="javascript:void(0);" class="addC btn btn-xs btn-info" rel=".clone"><i class="fa fa-plus"></i> New Field</a>	
			<hr />
			<button type="submit" class="btn btn-xs btn-primary"> Save Table Change(s)</button>
		@else
		<a href="{{ URL::TO('sximo/tables/tablefieldedit/'.$table) }}" class="btn btn-xs btn-info" onclick="SximoModal(this.href,'Add New Column'); return false;" ><i class="fa fa-plus"></i> Add New Field</a>
		@endif	

{!! Form::close() !!}				
<script type="text/javascript">
	$(document).ready(function(){
		$('.addC').relCopy({});	
		$('.removedField').click(function(){
			var url = $(this).attr('href');
			var id =  $(this).attr('rel');
			if(confirm('are u sure remove this field ?'))
			{
				$('.ajaxLoading').show();
				$.get( url , function( data ) {
					
					$('.ajaxLoading').hide();
					$(id).remove();
					
				});

				
			}
			return false;
		});

	});
</script>			

  <script type="text/javascript">
 $(document).ready(function(){
 		var form = $('#saveform');
		form.parsley();
		form.submit(function(){
			
			if(form.parsley('isValid') == true){			
				var options = { 
					dataType:      'json', 
					beforeSubmit :  showRequest,
					success:       showResponse  
				}  
				$(this).ajaxSubmit(options); 
				return false;
							
			} else {
				return false;
			}		
		
		});		

 });
function showRequest()
{
	$('.ajaxLoading').show();
}  
function showResponse(data)  {		
	
	if(data.status == 'success')
	{
		window.location.href = '{{ URL::TO("sximo/tables") }}';
		
	} else {
		alert(data.message);
	}	
	$('.ajaxLoading').hide();
} 

</script>		