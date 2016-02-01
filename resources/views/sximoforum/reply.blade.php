@extends('layouts.app')

@section('content')
	<?php use App\Library\Slimdown; ?>

	<div class="page-content row">
		<!-- Page header -->
		<div class="page-header">
			<div class="page-title">
				<h3> {{ $pageTitle }}
					<small>{{ $pageNote }}</small>
				</h3>
			</div>
			<ul class="breadcrumb">
				<li><a href="{{ URL::to('dashboard') }}">{{ Lang::get('core.home') }}</a></li>
				<li><a href="{{ URL::to('sximoforum?return='.$return) }}">{{ $pageTitle }}</a></li>
				<li><a href="{{ URL::to('sximoforum/show/'.$row->ForumID) }}"> {{ $row->forumTitle }} </a></li>
				<li class="active"><a href="{{ URL::to('sximoforum/topic/'.$row->CategoryID) }}"> {{ $row->Topic }} </a></li>
			</ul>
		</div>

		<div class="page-content-wrapper m-t">

			<div class="sbox">
				<div class="sbox-title"><h5><i class="fa fa-comment"></i> {{ $row->forumTitle }} >> {{ $row->Topic }} </h5>

					<div class="sbox-tools">
						<a href="{{ url('sximoforum/topic/'.$row->CategoryID)}}" class="btn btn-xs btn-white"><i class="fa fa-arrow-circle-left"></i> Back To Posts</a>
					</div>
				</div>
				<div class="sbox-content">

					<div style="min-height:300px;" class="table-responsive">
						<table class="table  ">
							<thead>
							<tr>
								<th width="200"></th>
								<th> Post Detail</th>
							</tr>
							</thead>
							<tbody>
							<tr>
								<td class="text-center profiler" style="width:200px !important;" width="200">

									<?php if( file_exists ('./uploads/users/' . $row->avatar) && $row->avatar != '') { ?>
									<img src="{{ URL::to('uploads/users').'/'.$row->avatar }} " border="0" width="60" class="img-circle"/>
									<?php  } else { ?>
									<img alt="" src="http://www.gravatar.com/avatar/{{ md5($row->email) }}" width="60" class="img-circle"/>
									<?php } ?>
									<br/>
									Started : {{ $row->users}} <br/>
									<b> Posted </b> : {{ date('M j, Y',strtotime($row->Posted)) }}


								</td>
								<td>
									<div class="displayPost">
										<h3> {{ $row->Title }}  </h3>
										<?php echo SiteHelpers::BBCode2Html (strip_tags ($row->Content)); ?>
										<hr/>
										Posted : {{ date('M j, Y',strtotime($row->Posted)) }} <br/><br/><br/>
									</div>
									<div class="displayEdit" style="display:none; ">
										@if(\Session::get('uid') == $row->UserID or \Session::get('gid') ==1)


											{!! Form::open(array('url'=>'sximoforum/savepost', 'class'=>'form-vertical','files' => true , 'parsley-validate'=>'','novalidate'=>' ' ,'id'=>'formpost'
										   )) !!}

											<div class="form-group  ">
												<label for="Topic" class=" control-label text-left"> Title </label>
												{!! Form::text('Title', $row->Title  ,array('class'=>'form-control', 'placeholder'=>' ','required'=>'true','style'=>'padding:5px; background:#eee;'   )) !!}

											</div>

											<div class="form-group  ">
												<div for="Topic" class=" control-label text-left"> Post Content</div>
												<textarea class="form-control markItUp" rows="10" name="Content" requried="true">{{ $row->Content }}</textarea>

											</div>

											<div class="form-group  ">
												<button class="btn btn-primary"> Submit</button>
												<button class="btn btn-danger" type="button" onclick="$('.displayEdit').hide(); $('.displayPost').show();"> Close</button>
												<input type="hidden" name="CategoryID" value="{{ $row->CategoryID }}">
												<input type="hidden" name="PostID" value="{{ $row->PostID }}">
											</div>



											{!! Form::close() !!}
									</div>


									<hr/>
									<a href="javascript:void(0)" class="text-success  editPost"><i class="fa fa-edit"></i> Edit Post </a> |
									<a href="{{ url::to('sximoforum/deletepost/'.$row->PostID.'/'.$row->CategoryID)}}" class="text-danger  confirmDelete"><i class="fa fa-trash-o"></i> Delete Post </a>
									<br/><br/><br/>
									@endif

								</td>

							</tr>

							@foreach($comments as $comm)
								<tr>
									<td class="text-center profiler" style="width:200px !important;" width="200">
										<?php if( file_exists ('./uploads/users/' . $comm->avatar) && $comm->avatar != '') { ?>
										<img src="{{ URL::to('uploads/users').'/'.$comm->avatar }} " border="0" width="60" class="img-circle"/>
										<?php  } else { ?>
										<img alt="" src="http://www.gravatar.com/avatar/{{ md5($comm->email) }}" width="60" class="img-circle"/>
										<?php } ?>
										<br/>
										Started : {{ $comm->first_name}} {{ $comm->last_name}} <br/>
										<b> Posted </b> : {{ date('M j, Y',strtotime($comm->Posted)) }}


									</td>
									<td>
										<div class="displayComment" id="disCom-{{ $comm->CommentID}}" style="overflow:auto;">
											{!!  SiteHelpers::BBCode2Html($comm->Comment)  !!}
										</div>

										@if(\Session::get('uid') == $comm->UserID or \Session::get('gid') ==1)
											<hr/>
											<div class="displayEditComment" id="comm-{{ $comm->CommentID}}" style="display:none">
												{!! Form::open(array('url'=>'sximoforum/reply', 'class'=>'form-vertical','files' => true , 'parsley-validate'=>'','novalidate'=>' ' ,'id'=>'formpost'
											   )) !!}

												<textarea class="form-control markItUp" rows="10" name="Comment" requried="true">{{ $comm->Comment }} </textarea>

												<div class="form-group  ">
													<button class="btn btn-primary"> Submit</button>
													<button class="btn btn-danger" type="button" onclick="$('.displayEditComment').hide(); $('.displayComment').show();"> Close</button>
													<input type="hidden" name="PostID" value="{{ $comm->PostID }}">
													<input type="hidden" name="CommentID" value="{{ $comm->CommentID }}">
												</div>
												{!! Form::close() !!}
											</div>
											<a href="javascript:void(0)" class="text-success  editComment" code="{{ $comm->CommentID}}"><i class="fa fa-edit"></i> Edit Comment </a> |
											<a href="{{ url::to('sximoforum/deletereply/'.$comm->CommentID.'/'.$row->PostID)}}" class="text-danger confirmDelete"><i class="fa fa-trash-o"></i> Delete
											                                                                                                                                                    Comment
											</a> <br/><br/><br/>
										@endif
									</td>
								</tr>

							@endforeach
							<tr>
								<td class="text-center profiler" style="width:200px !important;" width="200">

									<img alt="" src="http://www.gravatar.com/avatar/{{ md5(Session::get('eid')) }}" width="60" class="img-circle"/>
									<br/>
									{{ Session::get('fid')}}

								</td>
								<td>
									{!! Form::open(array('url'=>'sximoforum/reply', 'class'=>'form-horizontal','files' => true , 'parsley-validate'=>'','novalidate'=>' ')) !!}
									<textarea class="form-control markItUp" rows="10" name="Comment" requried="true"></textarea> <br/>
									<button class="btn btn-primary"> Post Comment</button>
									<input type="hidden" name="PostID" value="{{ $row->PostID }}">
									{!! Form::close() !!}
								</td>
							</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		$(function () {
			$('.confirmDelete').click(function () {
				if (confirm(' Are u sure delete comment')) {
					return true;
				} else {
					return false;
				}
				return false;
			});

			$('.editPost').click(function () {
				$('.displayEdit').show();
				$('.displayPost').hide();

			});

			$('.editComment').click(function () {
				var id = $(this).attr('code');
				$('#comm-' + id).show();
				$('#disCom-' + id).hide();


			});
		})
	</script>
	<style type="text/css">
		table.table tr td {
			padding: 10px;
		}

		.profiler {
			background: #f9f9f9;
		}
	</style>

	<link href="{{ asset('sximo/js/plugins/markitup/sets/bbcode/style.css') }}" rel="stylesheet">
	<script type="text/javascript" src="{{ asset('sximo/js/plugins/markitup/sets/bbcode/set.js') }}"></script>

@stop      
