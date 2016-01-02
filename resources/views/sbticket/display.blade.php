<div class="row">
	<div class="col-md-4 well">
		<h5><i class="fa fa-envelope"></i> Submit New Ticket </h5>
		<hr />
		{!! Form::open(array('url'=>'sbticket/save/', 'class'=>'form-vertical','files' => true , 'parsley-validate'=>'','novalidate'=>' ','id'=> 'sbticketFormAjax')) !!}
			<div class="form-group">
				<label> Subject</label>
				<input class="form-control" name="Subject" value="" placeholder="Subject" />
			</div>

			<div class="form-group">
				<label> Message</label>
				<textarea class="form-control" rows="10" name="Description" value="" placeholder="Write your message ....." ></textarea> 
			</div>
			<div class="form-group">
				<label> Priority</label>
				<select class="form-control" name="Priority">
					<option value="normal"> Normal </option>
					<option value="urgent"> Urgent </option>
				</select> 
			</div>

			<div class="form-group">
				
				<button class="btn btn-primary"><i class="fa fa-envelope"></i> Submit Ticket </button>
			</div>
			<input type="hidden" name="Created" value="{{ date("Y-m-d H:i:s") }}">
			<input type="hidden" name="Status" value="open">
			<input type="hidden" name="entry_by" value="{{ Session::get('uid')}}" >
									
		</form>
	</div>

	<div class="col-md-8">
		<h3> My Tickets </h3>
		<hr />
		
<div class="table-responsive">	
	<form id="" action="{{ url('sbticket/destroy') }}" method="post" >
		<div class="text-right">
			<a href="#" onclick="RemoveTickets()" class="btn btn-danger"><i class="fa fa-trash-o"></i> Remove Selected </a>
	    </div>
	    <table id="sbticketTable" class="table table-striped  ">
        <thead>
			<tr>
				<th width="30"> <input type="checkbox" class="checkall" /></th>	
				<th width="20"> Ticket No </th>
				<th align="left">Date</th>
				<th align="left">Subject</th>
				<th align="left">Priority</th>
				<th align="left">Status</th>				
				<th width="70">Action</th>
			  </tr>
        </thead>

        <tbody>
        <?php $i=0; foreach($mytickets as $ticket) { ?>
        	<tr>	
        		<td ><input type="checkbox" class="ids" name="id[]" value="<?php echo $ticket->TicketID ;?>" />  </td>	
	        	<td>#<?php echo $ticket->TicketID;?></td>
	        	<td><?php echo date("F j , y",strtotime($ticket->Created)) ?></td>
	        	<td>
	        	<a href="?view=<?php echo $ticket->TicketID;?>">
	        		<?php echo $ticket->Subject;?>
	        	</a>
	        	</td>
	        	<td><?php echo $ticket->Priority;?></td>
	        	<td><?php

						if($ticket->Status == 'inqueqe')
						{
							$value =  '<button class="btn btn-xs btn-warning">'.ucwords($ticket->Status).'</button>';
						} elseif($ticket->Status == 'close') {
							$value =  '<span class="btn btn-xs btn-success">'.ucwords($ticket->Status).'</button>';
						
						} else {
							$value =  '<button class="btn btn-xs btn-danger">'.ucwords($ticket->Status).'</button>';
						}	
						echo $value ;

	        	?></td>
	        	<td>
	        		<a href="?view=<?php echo $ticket->TicketID;?>" class="btn btn-xs btn-success"><i class="fa fa-search"></i> View </a>
	        		
	        	</td>

        	</tr>        
        <?php }?>	
			
		
                          
        </tbody>
      
    </table>
	</form>		
	
	</div>
	</div>

</div>
<link href="{{ asset('sximo/js/plugins/toastr/toastr.css')}}" rel="stylesheet">
<script type="text/javascript" src="{{ asset('sximo/js/plugins/toastr/toastr.js') }}"></script>
<script type="text/javascript" src="{{ asset('sximo/js/plugins/jquery.form.js') }}"></script>
<script type="text/javascript">
	var currentURL = window.location.href;
	function RemoveTickets()
	{
		var datas = $( '.table :input').serialize();
		if(confirm('Are u sure deleting selected row(s)?')) {
			$.post("{{ url('sbticket/delete') }}" ,datas,function( data ) {
				if(data.status =='success')
				{
					notyMessage(data.message);	
				  
				  window.location.href = currentURL;					
				} else {
					notyMessageError(data.message);	
				}				
			});	
							
		} else {
			return false;
		}
	}

	$(document).ready(function(){

	$(".checkall").click(function() {
		var cblist = $(".ids");
		if($(this).is(":checked"))
		{				
			cblist.prop("checked", !cblist.is(":checked"));
		} else {	
			cblist.removeAttr("checked");
		}	
	});		
		var form = $('#sbticketFormAjax'); 
		form.parsley();
		form.submit(function(){
			
			if(form.parsley('isValid') == true){			
				var options = { 
					dataType:      'json', 
					beforeSubmit : function(){

					},
					success:       function(callback){
						
						  var currentURL = window.location.href;
						  window.location.href = currentURL;
					}  
				}  
				$(this).ajaxSubmit(options); 
				return false;
							
			} else {
				return false;
			}		
		
		});

	})

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
