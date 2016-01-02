{!! Form::open(array('url'=>'sximo/tables/mysqleditor', 'class'=>'form-vertical','id'=>'saveform' , 'parsley-validate'=>'','novalidate'=>' ')) !!}
		<div class="result"></div>
		<div class="form-group">
			<label class=""> MySQL Query Statement <br />
			

			</label>	
			<small> Write your MySQL Query statement and execute </small>		
				<textarea name="statement" required="true" rows="15" class="form-control"></textarea>
			
		</div>
	
		<div class="form-group">
			<label class="">  </label>			
			<button type="submit" class="btn btn-sm btn-primary"> Execute Query Statement </button>
			
		</div>
	
{!! Form::close() !!}		

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
			return false;	
		
		});		

 });
function showRequest()
{
	$('.ajaxLoading').show();
}  
function showResponse(data)  {	

	alert(data.status);
	if(data.status == 'success')
	{
		window.location.href = '{!! url("sximo/tables") !!}';
		
	} else {
		var message = 'Ops Someting Goes Wrong !!<br />' + data.message.errorInfo[2];
		notyMessageError(message);	
		
	}	
	$('.ajaxLoading').hide();
} 

</script>	