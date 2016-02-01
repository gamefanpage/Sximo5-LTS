@extends('layouts.app')

@section('content')
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
				<li><a href="{{ URL::to('sximoforum/show/'.$row->ForumID) }}"> {{ $row->Title }} </a></li>
				<li class="active"> {{ $row->Name }} </li>
			</ul>
		</div>

		<div class="page-content-wrapper m-t">

			<div class="sbox">
				<div class="sbox-title"><h5><i class="fa fa-table"></i> {{ $row->Title }} >> {{ $row->Name }} </h5>

					<div class="sbox-tools">
						<a href="{{ url('sximoforum/addpost/'.$row->CategoryID)}}" onclick="SximoModal(this.href,'Create New Post'); return false;" class="btn btn-xs btn-white"><i
									class="fa fa-plus"></i> Create New Post </a>
					</div>
				</div>
				<div class="sbox-content">

					<p> {!! $row->Note !!} </p>


					<div style="min-height:300px;" class="table-responsive">
						<table class="table table-striped ">
							<thead>
							<tr>
								<th width="120"> Posted</th>
								<th> Posts</th>
								<th width="50"> View</th>
								<th width="30"> Reply</th>
								<th width="150"> Started</th>
							</tr>
							</thead>
							<tbody>
							@foreach($posts as $post)
								<tr>
									<td>{{ date('M j, Y',strtotime($post->Posted)) }}</td>
									<td onclick="window.location.href='{{ url('sximoforum/post/'.$post->PostID) }}'" style="cursor:pointer">
										<h4><a href="{{ url('sximoforum/post/'.$post->PostID) }}"> {{ $post->Title }} </a></h4>

										<p>
											{{ strip_tags(substr($post->Content,0,255)) }} ... More
										</p>

									</td>
									<td>{{ $post->Hint}}</td>
									<td>{{ $post->Reply}}</td>
									<td class="text-center">
										<?php if( file_exists ('./uploads/users/' . $post->avatar) && $post->avatar != '') { ?>
										<img src="{{ URL::to('uploads/users').'/'.$post->avatar }} " border="0" width="40" class="img-circle"/>
										<?php  } else { ?>
										<img alt="" src="http://www.gravatar.com/avatar/{{ md5($post->email) }}" width="40" class="img-circle"/>
										<?php } ?>
										<br/>

										{{ $post->Starter}}
									</td>

								</tr>

							@endforeach
							</tbody>
						</table>
						<hr/>
						<div class="text-center">
							{!! $pagination->render() !!}
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@stop      
