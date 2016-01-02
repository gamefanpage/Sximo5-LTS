@extends('layouts.app')

@section('content')

  <div class="page-content row">
    <!-- Page header -->
    <div class="page-header">
      <div class="page-title">
        <h3> {{ $pageTitle }} <small>{{ $pageNote }}</small></h3>
      </div>
      <ul class="breadcrumb">
        <li><a href="{{ URL::to('dashboard') }}">{{ Lang::get('core.home') }}</a></li>
		<li><a href="{{ URL::to('sbproject?return='.$return) }}">{{ $pageTitle }}</a></li>
        <li class="active">{{ Lang::get('core.addedit') }} </li>
      </ul>
	  	  
    </div>
 
 	<div class="page-content-wrapper">

		<ul class="parsley-error-list">
			@foreach($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
<div class="sbox animated fadeInRight">
	<div class="sbox-title"> <h4> <i class="fa fa-table"></i> </h4></div>
	<div class="sbox-content"> 	

		 {!! Form::open(array('url'=>'sbproject/save?return='.$return, 'class'=>'form-horizontal','files' => true , 'parsley-validate'=>'','novalidate'=>' ')) !!}
<div class="col-md-12">
						<fieldset><legend> Project Manager</legend>
									
								  <div class="form-group hidethis " style="display:none;">
									<label for="ProjectID" class=" control-label col-md-4 text-left"> ProjectID </label>
									<div class="col-md-6">
									  {!! Form::text('ProjectID', $row['ProjectID'],array('class'=>'form-control', 'placeholder'=>'',   )) !!} 
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> 					
								  <div class="form-group  " >
									<label for="Project Name" class=" control-label col-md-4 text-left"> Project Name <span class="asterix"> * </span></label>
									<div class="col-md-6">
									  {!! Form::text('ProjectName', $row['ProjectName'],array('class'=>'form-control', 'placeholder'=>'', 'required'=>'true'  )) !!} 
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> 					
								  <div class="form-group  " >
									<label for="Description" class=" control-label col-md-4 text-left"> Description </label>
									<div class="col-md-6">
									  <textarea name='Description' rows='5' id='Description' class='form-control '  
				           >{{ $row['Description'] }}</textarea> 
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> 					
								  <div class="form-group  " >
									<label for="Client" class=" control-label col-md-4 text-left"> Client <span class="asterix"> * </span></label>
									<div class="col-md-6">
									  <select name='ClientID' rows='5' id='ClientID' class='select2 ' required  ></select> 
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> 					
								  <div class="form-group  " >
									<label for="Status" class=" control-label col-md-4 text-left"> Status <span class="asterix"> * </span></label>
									<div class="col-md-6">
									  
					<label class='radio radio-inline'>
					<input type='radio' name='Status' value ='inactive' required @if($row['Status'] == 'inactive') checked="checked" @endif > In Active </label>
					<label class='radio radio-inline'>
					<input type='radio' name='Status' value ='active' required @if($row['Status'] == 'active') checked="checked" @endif > Active </label>
					<label class='radio radio-inline'>
					<input type='radio' name='Status' value ='suspended' required @if($row['Status'] == 'suspended') checked="checked" @endif > Suspended </label>
					<label class='radio radio-inline'>
					<input type='radio' name='Status' value ='canceled' required @if($row['Status'] == 'canceled') checked="checked" @endif > Canceled </label> 
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> 					
								  <div class="form-group  " >
									<label for="Progress" class=" control-label col-md-4 text-left"> Progress <span class="asterix"> * </span></label>
									<div class="col-md-6">
									  {!! Form::text('Progress', $row['Progress'],array('class'=>'form-control', 'placeholder'=>'', 'required'=>'true'  )) !!} 
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> 					
								  <div class="form-group  " >
									<label for="Teams" class=" control-label col-md-4 text-left"> Teams </label>
									<div class="col-md-6">
									  <select name='Teams[]' multiple rows='5' id='Teams' class='select2 '   ></select> 
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> 					
								  <div class="form-group hidethis " style="display:none;">
									<label for="Created" class=" control-label col-md-4 text-left"> Created </label>
									<div class="col-md-6">
									  {!! Form::text('Created', $row['Created'],array('class'=>'form-control', 'placeholder'=>'',   )) !!} 
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> 					
								  <div class="form-group hidethis " style="display:none;">
									<label for="LastUpdate" class=" control-label col-md-4 text-left"> LastUpdate </label>
									<div class="col-md-6">
									  {!! Form::text('LastUpdate', $row['LastUpdate'],array('class'=>'form-control', 'placeholder'=>'',   )) !!} 
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> 					
								  <div class="form-group  " >
									<label for="DueDate" class=" control-label col-md-4 text-left"> DueDate </label>
									<div class="col-md-6">
									  
				<div class="input-group m-b" style="width:150px !important;">
					{!! Form::text('DueDate', $row['DueDate'],array('class'=>'form-control date')) !!}
					<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
				</div> 
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> </fieldset>
			</div>
			
			

		
			<div style="clear:both"></div>	
				
					
				  <div class="form-group">
					<label class="col-sm-4 text-right">&nbsp;</label>
					<div class="col-sm-8">	
					<button type="submit" name="apply" class="btn btn-info btn-sm" ><i class="fa  fa-check-circle"></i> {{ Lang::get('core.sb_apply') }}</button>
					<button type="submit" name="submit" class="btn btn-primary btn-sm" ><i class="fa  fa-save "></i> {{ Lang::get('core.sb_save') }}</button>
					<button type="button" onclick="location.href='{{ URL::to('sbproject?return='.$return) }}' " class="btn btn-success btn-sm "><i class="fa  fa-arrow-circle-left "></i>  {{ Lang::get('core.sb_cancel') }} </button>
					</div>	  
			
				  </div> 
		 
		 {!! Form::close() !!}
	</div>
</div>		 
</div>	
</div>			 
   <script type="text/javascript">
	$(document).ready(function() { 
		
		
		$("#ClientID").jCombo("{{ URL::to('sbproject/comboselect?filter=sb_clients:ClientID:Company') }}",
		{  selected_value : '{{ $row["ClientID"] }}' });
		
		$("#Teams").jCombo("{{ URL::to('sbproject/comboselect?filter=tb_users:id:first_name|last_name') }}",
		{  selected_value : '{{ $row["Teams"] }}' });
		 

		$('.removeCurrentFiles').on('click',function(){
			var removeUrl = $(this).attr('href');
			$.get(removeUrl,function(response){});
			$(this).parent('div').empty();	
			return false;
		});		
		
	});
	</script>		 
@stop