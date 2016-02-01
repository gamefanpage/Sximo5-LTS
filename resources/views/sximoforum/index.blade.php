@extends('layouts.app')

@section('content')
	{{--*/ usort($tableGrid, "SiteHelpers::_sort") /*--}}
	<div class="page-content row">
		<!-- Page header -->
		<div class="page-header">
			<div class="page-title">
				<h3> {{ $pageTitle }}
					<small>{{ $pageNote }}</small>
				</h3>
			</div>

			<ul class="breadcrumb">
				<li><a href="{{ URL::to('dashboard') }}"> Dashboard </a></li>
				<li class="active">{{ $pageTitle }}</li>
			</ul>

		</div>


		<div class="page-content-wrapper m-t">

			<div class="sbox">
				<div class="sbox-title"><h5><i class="fa fa-table"></i></h5>

					<div class="sbox-tools">
						<a href="{{ url($pageModule) }}" class="btn btn-xs btn-white tips" title="Clear Search"><i class="fa fa-trash-o"></i> Clear Search </a>
						@if(Session::get('gid') ==1)
							<a href="{{ URL::to('sximo/module/config/'.$pageModule) }}" class="btn btn-xs btn-white tips" title=" {{ Lang::get('core.btn_config') }}"><i class="fa fa-cog"></i></a>
						@endif
					</div>
				</div>
				<div class="sbox-content">
					<div class="toolbar-line ">
						@if($access['is_add'] ==1)
							<a href="{{ URL::to('sximoforum/update') }}" class="tips btn btn-sm btn-white" title="{{ Lang::get('core.btn_create') }}">
								<i class="fa fa-plus-circle "></i>&nbsp;{{ Lang::get('core.btn_create') }}</a>
						@endif
						@if($access['is_remove'] ==1)
							<a href="javascript://ajax" onclick="SximoDelete();" class="tips btn btn-sm btn-white" title="{{ Lang::get('core.btn_remove') }}">
								<i class="fa fa-minus-circle "></i>&nbsp;{{ Lang::get('core.btn_remove') }}</a>
						@endif
						<a href="{{ URL::to( 'sximoforum/search') }}" class="btn btn-sm btn-white" onclick="SximoModal(this.href,'Advance Search'); return false;"><i class="fa fa-search"></i>
							Search</a>
						@if($access['is_excel'] ==1)
							<a href="{{ URL::to('sximoforum/download?return='.$return) }}" class="tips btn btn-sm btn-white" title="{{ Lang::get('core.btn_download') }}">
								<i class="fa fa-download"></i>&nbsp;{{ Lang::get('core.btn_download') }} </a>
						@endif

					</div>
					{!! Form::open(array('url'=>'sximoforum/delete/', 'class'=>'form-horizontal' ,'id' =>'SximoTable' )) !!}
					@foreach ($rowData as $row)
						<div class="col-md-3">
							<div style="height:290px; background:#fff; border:solid 1px #eee; margin-bottom:20px; padding:5px 10px;">
								<h4 style="color:#{{ $row->Color}}"><i class="{{ $row->Icon}}"></i> {{ $row->Name }}</h4>
								<hr/>
								<div class="text-center" style="font-size:10px; height:120px; border-bottom:solid 1px #eee; margin-bottom:5px;">
									{{ $row->Note }}
								</div>

								<div class="text-center" style="height:20px; border-top:solid 1px #eee; padding-top:10px;">
									@if($access['is_detail'] ==1)
										<a href="{{ URL::to('sximoforum/show/'.$row->ForumID.'?return='.$return)}}" class="tips btn btn-xs btn-primary" title="{{ Lang::get('core.btn_view') }}"><i
													class="fa  fa-search "></i> Start Discussion</a>
									@endif
									@if($access['is_edit'] ==1)
										<a href="{{ URL::to('sximoforum/update/'.$row->ForumID.'?return='.$return) }}" class="tips btn btn-xs btn-success" title="{{ Lang::get('core.btn_edit') }}"><i
													class="fa fa-edit "></i></a>
										<input type="checkbox" class="ids" name="ids[]" value="{{ $row->ForumID }}"/>
									@endif


								</div>

							</div>
						</div>
					@endforeach
					{!! Form::close() !!}


					@include('footer')
				</div>
			</div>
		</div>
	</div>
	<script>
		$(document).ready(function () {

			$('.do-quick-search').click(function () {
				$('#SximoTable').attr('action', '{{ URL::to("sximoforum/multisearch")}}');
				$('#SximoTable').submit();
			});

		});
	</script>
@stop