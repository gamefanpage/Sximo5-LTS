	<div class="wrapper-header ">
		<div class="container">
			<div class="row">
				<div class="col-sm-6 ">
				  <div class="page-title">
					<h3> {{ $row->title }} </h3>
				  </div>
				</div>
				<div class="col-sm-6 ">
				  <ul class="breadcrumb pull-right">
					<li><a href="{{ url('') }}">Home</a></li>
					<li><a href="{{ url('blog') }}">Blog</a></li>
					<li><a href="{{ url('blog?category='.$row->alias) }}">{{ $row->alias }}</a></li>
					<li class="active"> {{ $row->title }}	 </li>
				  </ul>		
				</div>
			</div>		  
		</div>
	</div>



<div class="page-content container">


  

	<div class="row" style="margin-bottom:50px;">
	<div class="col-md-9">
	@if(Session::has('message'))	  
		   {!! Session::get('message') !!}
	@endif		
		<div class="blog-post ">
			<div class="post-item">
				
				<div class="blog-info-small">
				<i class="fa fa-user icon-muted"></i>  <span>   </span>   
				<i class="fa fa-calendar icon-muted"></i>  <span> {{ date("M j, Y " , strtotime($row->created)) }} </span> 
				<i class="fa fa-comment-o icon-muted"></i>   <span>  {{ $row->comments }} comment(s)  </span> 
							
				
				</div>				
				<div class="summary">
	            @if(file_exists('./uploads/images/'.$row->image) && $row->image !='' )
	                <div style="padding-bottom:10px"><img src="{{ asset('uploads/images/'.$row->image)}}" class="img-responsive" /></div>
	            @endif
            
				{!! SiteHelpers::renderHtml( str_replace('<hr>',"",$row->content)) !!}</div>
				
            @if($access['is_edit'] ==1)
            <a  href="{{ URL::to('blog/update/'.$row->blogID.'?return='.$return) }}" class="tips btn btn-xs btn-white text-primary" title="{{ Lang::get('core.btn_edit') }}"><i class="fa fa-edit "></i> Edit </a>
            @endif
            @if($access['is_remove'] ==1)
              <a href="javascript://ajax"  onclick="SximoDelete();" class="tips btn btn-xs btn-white text-danger" title="{{ Lang::get('core.btn_remove') }}">
              <i class="fa fa-minus-circle "></i>&nbsp;{{ Lang::get('core.btn_remove') }}</a>
            @endif   
			</div>	
		</div>
		<hr />

		<h5 id="comments" class="text-success"> ( {{ $row->comments }} )  Comment(s) </h5>
		<hr />
		<div class="comment-list">
		@foreach($comments as $com)
			<div class="comm" >	
				<div class="info">{{ date("F j, Y " , strtotime($com['created'])) }} | {{ $com['name'] }} says :  </div>
				<div class="body">{!! SiteHelpers::BBCode2Html($com['comment']) !!}</div>
				@if(Session::get('gid') == 1 or $com['user_id'] == Session::get('uid'))
					<div class="action"><a href="{{ url('blog/removecomm/'.$com['commentID'].'/'.$row->slug) }}" class="btn btn-white btn-xs text-danger"><i class="fa fa-trash-o"></i> Remove </a></div>
				@endif	
				
			</div>
		@endforeach			
		</div>
		
		@if(Auth::check())
		 {!! Form::open(array('url'=>'blog/savecomment/',  'parsley-validate'=>'','novalidate'=>' ', 'class'=>'form-vertical')) !!}
			<div class="form-group "> 
				
					<label>Post Your Comment</label>
					<textarea placeholder="Type your comment" rows="5" id="comment_area" name="comment" class="form-control markItUp"></textarea> 
				
			</div>
		
			<div class="form-group "> 
				
					<label>&nbsp;</label>
					<button class="btn btn-success" type="submit">Submit comment</button> 
				
			</div> 
			<input type="hidden" name="blogID" value="{{ $id }}" />
			<input type="hidden" name="alias" value="{{ $alias }}" />
		{!! Form::close() !!}	
		@else 
		<div class="alert alert-danger"> Please login to post comment </div>
		@endif	
	
	</div>
		
	
	<div class="col-md-3">
		@include('blog.sidebar')
	</div>
	
	</div>
	
</div>

<script type="text/javascript" >
   $(document).ready(function() {
     // $(".markItUp").markItUp(mySettings );
   });
</script>
<style type="text/css">
  .blog-info-small { font-size: 11px; padding: 10px 0; color: #777;} 
  .blog-info-small a { color: #777;}
  .comment-list { margin-bottom: 20px;}
  .comm .info { font-weight: bold; padding: 10px 0;}
  .comm .body { color: #777; padding-bottom: 10px; border-bottom: dotted 1px #ddd; } 

</style>