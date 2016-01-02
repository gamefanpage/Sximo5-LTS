<div class="row">

	<div class="col-md-4 well">
		<h3> Ticket Detail </h3>
		<hr />
		<table class="table">
			<tr>
				<td> Ticket No </td>
				<td> #{{ $row->TicketID }}</td>
			</tr>
			<tr>	
				<td> Priority </td>
				<td> {{ $row->Priority }} </td>
			<tr>	
				<td> Author </td>
				<td> {!! SiteHelpers::gridDisplayView($row->entry_by,'entry_by','1:tb_users:id:first_name|last_name') !!} </td>
			</tr>
			<tr>	
				<td> Status </td>
				<td> <span class="label label-primary but"> {{ $row->Status }}</span> </td>
			</tr>
		</table>	
	</div>

	<div class="col-md-8">
		<h3> {{ $row->Subject }}</h3>
		<hr />
		<div style="padding:20px; background:#fff; border:solid 1px #eee;"> 
		{!! $row->Description!!}
		</div>
		<hr />
		<div id="RelpyList"> 

		</div>	
		<div>
		{!! Form::open(array('url'=>'sbticket/savereply', 'class'=>'form-horizontal','files' => true , 'parsley-validate'=>'','novalidate'=>' ','id'=> 'sbticketFormAjax')) !!}
			<textarea class="form-control replyComment" placeholder="Reply Ticket" name="comments"></textarea>
			<input type="hidden" name="TicketID" value="{{ $row->TicketID }}">
		<br />
		<button class="btn btn-primary " type="submit"  id="buttonReply"> Relpy Comment </button>
		{!! Form::close() !!}
		</div>
	</div>

</div>
</div>	
<link href="{{ asset('sximo/js/plugins/toastr/toastr.css')}}" rel="stylesheet">
<script type="text/javascript" src="{{ asset('sximo/js/plugins/toastr/toastr.js') }}"></script>
<script type="text/javascript" src="{{ asset('sximo/js/plugins/jquery.form.js') }}"></script>
<script>
$(document).ready(function(){

	$.get('{{ url("sbticket/comment/".$row->TicketID)}}',function(callback){
		$('#RelpyList').html(callback)
	});

	var form = $('#sbticketFormAjax'); 
	form.parsley();
	form.submit(function(){
		$('.replyComment').attr('readonly','1');
		$('#buttonReply').html(' Posting  ....... ')
		if(form.parsley('isValid') == true){			
			var options = { 
				dataType:      'json', 
				beforeSubmit :  '',
				success:       function(callback){
					notyMessage(callback.message);	
					$.get('{{ url("sbticket/comment/".$row->TicketID)}}',function(output){
						$('#RelpyList').html(output);
						$('.replyComment').removeAttr('readonly');
						$('.replyComment').val('');
						$('#buttonReply').html(' Relpy Comment ')
					});


				}  
			}  
			$(this).ajaxSubmit(options); 
			return false;
						
		} else {
			$('.replyComment').attr('readonly','0');
			return false;
		}		
	
	});	
});

function notyMessage(message)
{

	toastr.success("success", message);
	toastr.options = {
		  "closeButton": true,
		  "debug": false,
		  "positionClass": "toast-bottom-right",
		  "onclick": null,
		  "showDuration": "300",
		  "hideDuration": "1000",
		  "timeOut": "5000",
		  "extendedTimeOut": "1000",
		  "showEasing": "swing",
		  "hideEasing": "linear",
		  "showMethod": "fadeIn",
		  "hideMethod": "fadeOut"

	}	
	
}
</script>	