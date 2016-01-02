@extends('layouts.app')

@section('content')
<?php use \App\Http\Controllers\SbprojectController; ?>
<div class="page-content row">
    <!-- Page header -->
    <div class="page-header">
      <div class="page-title">
        <h3> {{ $pageTitle }} <small>{{ $pageNote }}</small></h3>
      </div>
      <ul class="breadcrumb">
        <li><a href="{{ URL::to('dashboard') }}">{{ Lang::get('core.home') }}</a></li>
		<li><a href="{{ URL::to('sbproject?return='.$return) }}">{{ $pageTitle }}</a></li>
        <li class="active"> {{ Lang::get('core.detail') }} </li>
      </ul>
	 </div>  
	 
	 
 	<div class="page-content-wrapper m-t">   

	<div class="col-md-8">
		<h3>{{ $row->ProjectName }}  </h3>
		
	<table class="table " >
		<tbody>	
	
				
					<tr>
						<td width='30%' class='label-view text-right'>Description</td>
						<td>{!! $row->Description !!} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Status</td>
						<td>{!!  SbprojectController::Status($row->Status )!!}</td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Progress</td>
						<td>
							 <div class="progress ">
							  <div class="progress-bar progress-bar-striped  progress-bar-success" role="progressbar" aria-valuenow="{!! $row->Progress !!}"
							  aria-valuemin="0" aria-valuemax="100" style="width:{!! $row->Progress !!}%">
							   {!! $row->Progress !!}% ( Complete)
							  </div>
							</div>	


							
							<p>Project completed in  {!! $row->Progress !!}%. Remaining close the project, sign a contract and invoice.</p>
						</td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Teams</td>
						<td>
							{!!  SbprojectController::showTeam($row->Teams )!!}
						</td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Created</td>
						<td>{{ $row->Created }} </td>	
					</tr>
					<tr>
						<td width='30%' class='label-view text-right'>Last Update</td>
						<td>{{ $row->LastUpdate }} </td>	
					</tr>
					<tr>
						<td width='30%' class='label-view text-right'>Due Date</td>
						<td>{{ $row->DueDate }} </td>	
					</tr>									
		</tbody>	
	</table>   

	 </div>

	 <div class="col-md-4">
	 	<h3> About The {{ $row->Company }} </h3> 
	 	<hr />
	 	{{ $row->About }}

	 </div>
	


	</div>
</div>
	  
<style type="text/css">
	
	.table tr td{ padding: 8px 10px !important; }
</style>	  
@stop