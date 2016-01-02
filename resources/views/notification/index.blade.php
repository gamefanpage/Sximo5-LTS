@extends('layouts.app')

@section('content')
{{--*/ usort($tableGrid, "SiteHelpers::_sort") /*--}}
  <div class="page-content row">
    <!-- Page header -->
    <div class="page-header">
      <div class="page-title">
        <h3> {{ $pageTitle }} <small>{{ $pageNote }}</small></h3>
      </div>

      <ul class="breadcrumb">
        <li><a href="{{ URL::to('dashboard') }}"> Dashboard </a></li>
        <li class="active">{{ $pageTitle }}</li>
      </ul>	  
	  
    </div>
	
	
	<div class="page-content-wrapper m-t">	 
	    <div class="toolbar-line ">
			
			@if($access['is_remove'] ==1)
			<a href="javascript://ajax"  onclick="SximoDelete();" class="tips btn btn-sm btn-danger pull-right" title="{{ Lang::get('core.btn_remove') }}">
			<i class="fa fa-minus-circle "></i>&nbsp;{{ Lang::get('core.btn_remove') }}</a>
			@endif 		
			<div class="clr clear"></div>
			<hr />
		 
		</div> 	
		 {!! Form::open(array('url'=>'notification/delete/', 'class'=>'form-horizontal' ,'id' =>'SximoTable' )) !!}	
		<ul class="notification">
		 @foreach ($rowData as $row)
		 	<li>
		 		<input type="checkbox" class="ids" name="id[]" value="{{ $row->id }}" />
		 			<i class="{!! $row->icon !!}"></i> <a href="{!! $row->url !!}">{!! $row->title !!} </a> <span class="pull-right text-muted small">{{ date("d/m/y",strtotime($row->created)) }} </span>
		 		<div> {!! $row->note !!}</div>	
		 	</li>
		@endforeach
		</ul>
		 {!! Form::close() !!}	
		 @include('footer')	

	  
</div>	
<style type="text/css">
	
	ul.notification { margin: 0; padding: 0; list-style: none;}
	ul.notification li { padding:5px 0 15px 0; border-bottom: solid 1px #ddd}
	ul.notification li div{ padding-left: 15px; }

</style>		
@stop