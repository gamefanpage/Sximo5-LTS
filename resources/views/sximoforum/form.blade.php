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
				<li class="active">{{ Lang::get('core.addedit') }} </li>
			</ul>

		</div>

		<div class="page-content-wrapper">

			<ul class="parsley-error-list">
				@foreach($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
			<div class="sbox">
				<div class="sbox-title"><h4><i class="fa fa-table"></i></h4></div>
				<div class="sbox-content">

					{!! Form::open(array('url'=>'sximoforum/save?return='.$return, 'class'=>'form-horizontal','files' => true , 'parsley-validate'=>'','novalidate'=>' ')) !!}
					<div class="col-md-12">
						<fieldset>
							<legend> Sximo Forum</legend>

							<div class="form-group  ">
								<label for="ForumID" class=" control-label col-md-4 text-left"> ForumID </label>

								<div class="col-md-6">
									{!! Form::text('ForumID', $row['ForumID'],array('class'=>'form-control', 'placeholder'=>'',   )) !!}
								</div>
								<div class="col-md-2">

								</div>
							</div>
							<div class="form-group  ">
								<label for="Name" class=" control-label col-md-4 text-left"> Name </label>

								<div class="col-md-6">
									{!! Form::text('Name', $row['Name'],array('class'=>'form-control', 'placeholder'=>'',   )) !!}
								</div>
								<div class="col-md-2">

								</div>
							</div>
							<div class="form-group  ">
								<label for="Note" class=" control-label col-md-4 text-left"> Note </label>

								<div class="col-md-6">
									{!! Form::text('Note', $row['Note'],array('class'=>'form-control', 'placeholder'=>'',   )) !!}
								</div>
								<div class="col-md-2">

								</div>
							</div>
							<div class="form-group  ">
								<label for="Icon" class=" control-label col-md-4 text-left"> Icon </label>

								<div class="col-md-6">
									{!! Form::text('Icon', $row['Icon'],array('class'=>'form-control', 'placeholder'=>'',   )) !!}
								</div>
								<div class="col-md-2">

								</div>
							</div>
							<div class="form-group  ">
								<label for="Color" class=" control-label col-md-4 text-left"> Color </label>

								<div class="col-md-6">
									{!! Form::text('Color', $row['Color'],array('class'=>'form-control', 'placeholder'=>'',   )) !!}
								</div>
								<div class="col-md-2">

								</div>
							</div>
							<div class="form-group  ">
								<label for="Active" class=" control-label col-md-4 text-left"> Active </label>

								<div class="col-md-6">
									{!! Form::text('Active', $row['Active'],array('class'=>'form-control', 'placeholder'=>'',   )) !!}
								</div>
								<div class="col-md-2">

								</div>
							</div>
						</fieldset>
					</div>


					<div style="clear:both"></div>


					<div class="form-group">
						<label class="col-sm-4 text-right">&nbsp;</label>

						<div class="col-sm-8">
							<button type="submit" name="apply" class="btn btn-info btn-sm"><i class="fa  fa-check-circle"></i> {{ Lang::get('core.sb_apply') }}</button>
							<button type="submit" name="submit" class="btn btn-primary btn-sm"><i class="fa  fa-save "></i> {{ Lang::get('core.sb_save') }}</button>
							<button type="button" onclick="location.href='{{ URL::to('sximoforum?return='.$return) }}' " class="btn btn-success btn-sm "><i
										class="fa  fa-arrow-circle-left "></i> {{ Lang::get('core.sb_cancel') }} </button>
						</div>

					</div>

					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		$(document).ready(function () {


			$('.removeCurrentFiles').on('click', function () {
				var removeUrl = $(this).attr('href');
				$.get(removeUrl, function (response) {
				});
				$(this).parent('div').empty();
				return false;
			});

		});
	</script>
@stop