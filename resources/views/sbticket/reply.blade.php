	@if(count($Comments) >=1)
	<div class="comment-list">
		<ul class="comment-list">
		@foreach($Comments as $row)
			<li>
				<div class="avatar">
					@if(file_exists('./uploads/users/'.$row->avatar) && $row->avatar !='')
						<img src="{{ asset('uploads/users/'.$row->avatar)}}" class="img-circle" width="50">
					@else 
						<img alt="" src="http://www.gravatar.com/avatar/<?php echo md5($row->email);?>" class="img-circle" width="50">
					@endif
					

				</div>
				<div class="comments">
					<div class="dates">
						<i class="fa fa-user"></i> {{ $row->author }} | <i class="fa fa-calendar"></i> {{ date("F j , y",strtotime($row->Posted)) }}
						@if(Session::get('gid') == 1 or $row->entry_by == Session::get('uid'))
						<a onclick="removeComm('{{ $row->CommentID}}')" class="collapse-close pull-right btn btn-xs btn-danger" href="javascript:void(0)">
			<i class="fa fa fa-times"></i></a>
						@endif
					</div> 
					{{ $row->Comments }}
				</div>

				<div class="clear clr clearfix"></div>
				
			</li>
		
		@endforeach
		</ul>
		<div class="clear clr clearfix"></div>
	</div<	
	@else
		<p><b> No Conversation Found ! </b> </p>
	@endif
	<hr />

	<style type="text/css">
	ul.comment-list { margin: 0; padding: 0; list-style: none;}
	ul.comment-list li { padding:10px 0; border-bottom: solid 1px #eee; clear: both;}
	ul.comment-list li .avatar{ width: 50px;  float: left; min-height: 50px; }
	ul.comment-list li .comments{  margin-left: 60px; border: solid 1px #ddd; border-radius: 5px; padding:5px 20px; background: #fff;}
	ul.comment-list li .comments .dates{ font-weight: bold; margin-bottom: 10px; border-bottom: dotted 1px #eee; padding:5px 0; }
	</style>
	<script type="text/javascript">
	function removeComm( id)
	{
		if(confirm('Delete comment ?'))
		{
			$('.ajaxLoading').show();
			$.get("{{ url('sbticket/removereply/')}}/"+id,function(callback){
				notyMessage(callback.message);	
				$.get('{{ url("sbticket/comment/".$TicketID)}}',function(output){
					$('#RelpyList').html(output);
					$('.ajaxLoading').hide();
				});
			})
		
		} else {
			return false;
		}
	}
	</script>