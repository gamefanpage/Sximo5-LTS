@extends('layouts.app')


@section('content')

<script type="text/javascript" src="{{ asset('sximo/js/plugins/chartjs/Chart.min.js') }}"></script>
<div class="page-content row">
	<div class="page-header">
	  <div class="page-title">
		<h3><i class="fa fa-desktop"></i> Dashboard <small> Summary info site </small></h3>
	  </div>
		  
	</div>
	<div class="page-content-wrapper">  
	
	
	@if(Auth::check() && Auth::user()->group_id == 1)

<section>
	<div class="row m-l-none m-r-none m-t  white-bg shortcut " >
		<div class="col-sm-6 col-md-3 b-r  p-sm ">
			<span class="pull-left m-r-sm text-navy"><i class="fa fa-plus-circle"></i></span> 
			<a href="{{ URL::to('sximo/module') }}" class="clear">
				<span class="h3 block m-t-xs"><strong>  {{ Lang::get('core.dash_i_module') }}  </strong>
				</span> <small class="text-muted text-uc">  {{ Lang::get('core.dash_module') }}</small>
			</a>
		</div>
		<div class="col-sm-6 col-md-3 b-r  p-sm">
			<span class="pull-left m-r-sm text-info">	<i class="fa fa-cogs"></i></span>
			<a href="{{ URL::to('sximo/config') }}" class="clear">
				<span class="h3 block m-t-xs"><strong> {{ Lang::get('core.dash_i_setting') }}</strong>
				</span> <small class="text-muted text-uc">   {{ Lang::get('core.dash_setting') }} </small> 
			</a>
		</div>
		<div class="col-sm-6 col-md-3 b-r  p-sm">
			<span class="pull-left m-r-sm text-warning">	<i class="fa fa-sitemap"></i></span>
			<a href="{{ URL::to('sximo/menu') }}" class="clear">
			<span class="h3 block m-t-xs"><strong>  {{ Lang::get('core.dash_i_sitemenu') }} </strong></span>
			<small class="text-muted text-uc">  {{ Lang::get('core.dash_sitemenu') }}  </small> </a>
		</div>
		<div class="col-sm-6 col-md-3 b-r  p-sm">
			<span class="pull-left m-r-sm ">	<i class="fa fa-users"></i></span>
			<a href="{{ URL::to('core/users') }}" class="clear">
			<span class="h3 block m-t-xs"><strong> {{ Lang::get('core.dash_i_usergroup') }}</strong>
			</span> <small class="text-muted text-uc">  {{ Lang::get('core.dash_usergroup') }} </small> </a>
		</div>
	</div> 
</section>	

	
	<div class="row m-t">
		<div class="col-md-12">
			<div class="sbox">
				<div class="sbox-title"> <h3> Recent Users <small> ( Last Activity ) </small> </h3> </div>
				<div class="sbox-content">
					<div class="row">
						<div class="col-md-12">
						<div class="table-responsive" >
							<table class="table table-striped">
								<tr>
									<th>  </th>
									<th> Users </th>
									<th> Last Activity </th>
								</tr>
							@foreach($online_users as $user)
								<tr>
									<td>  {!! SiteHelpers::showUploadedFile($user->avatar,'/uploads/users/') !!}</td>
									<td>{{ $user->first_name}} {{ $user->last_name}}</td>
									<td> {{ date("Y-m-d H:i:s", $user->last_activity) }}</td>
								</tr>
							@endforeach	

							</table>
							</div>
						</div>
						
					</div>
				
						
				</div>
			</div>
		</div>
		
		
	
	</div>
	@endif
</div>	
	
</div>



@stop