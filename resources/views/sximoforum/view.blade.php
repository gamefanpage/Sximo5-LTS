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
				<li class="active"> {{ Lang::get('core.detail') }} </li>
			</ul>
		</div>


		<div class="page-content-wrapper m-t">

			<div class="sbox">
				<div class="sbox-title">

					<h5><i class="fa fa-comment"></i> {{ $row->Name }} </h5>

					<div class="sbox-tools">
						<a href="{{ URL::to('sximoforum?return='.$return) }}" class="tips btn btn-xs btn-white pull-right" title="{{ Lang::get('core.btn_back') }}"><i
									class="fa fa-arrow-circle-left"></i>&nbsp;{{ Lang::get('core.btn_back') }}</a>
						@if($access['is_add'] ==1)

							<a href="{{ URL::to('sximoforum/update/'.$id.'?return='.$return) }}" class="tips btn btn-xs btn-white pull-right" title="{{ Lang::get('core.btn_edit') }}"><i
										class="fa fa-edit"></i>&nbsp;{{ Lang::get('core.btn_edit') }}</a>
							<a href="{{ URL::to('sximoforum/addtopic/'.$row->ForumID.'?return='.$return) }}" class="tips btn btn-xs btn-white pull-right" title="Create New Topic"
							   onclick="SximoModal(this.href,'New Topic'); return false;"><i class="fa fa-plus"></i>&nbsp;Create New Topic </a>

						@endif

						@if($access['is_remove'] ==1)
							<a href="#" class="tips btn btn-xs btn-white pull-right" onclick="SximoDelete();" title="Create New Topic"><i class="fa fa-trash-o"></i>&nbsp;Delete</a>

						@endif
					</div>


				</div>
				<div class="sbox-content" style="background:#fff;">

					<p>
						{{ $row->Note }}
					</p>

					{!! Form::open(array('url'=>'sximoforum/deletetopic/', 'class'=>'form-horizontal' ,'id' =>'SximoTable' )) !!}
					<table class="table table-striped table-bordered">
						<thead>
						<tr>
							@if($access['is_remove'] ==1)
								<th><input type="checkbox" class="checkall"/></th>
							@endif
							<th> Topic</th>
							<th> Posts</th>

						</tr>
						</thead>
						<tbody>
						@foreach($topics as $topic)
							<tr>
								@if($access['is_remove'] ==1)
									<td width="50">
										<input type="checkbox" class="ids" name="ids[]" value="{{ $topic->CategoryID }}"/>
									</td>
								@endif
								<td>
									<h4><a href="{{ url('sximoforum/topic/'.$topic->CategoryID) }}"><i class="{{ $row->Icon }}"></i> {{ $topic->Name }} </a></h4>

									<p>{{ $topic->Note}}</p>
								</td>
								<td>{{ $topic->posts}}</td>


							</tr>

						@endforeach
						</tbody>
					</table>
					<input name="ForumID" value="{{ $row->ForumID }}" type="hidden"/>
					{!! Form::close() !!}


				</div>
			</div>

		</div>
	</div>

@stop