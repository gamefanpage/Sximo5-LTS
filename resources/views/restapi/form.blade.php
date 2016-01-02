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
		<li><a href="{{ URL::to('restapi?return='.$return) }}">{{ $pageTitle }}</a></li>
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

		 {!! Form::open(array('url'=>'restapi/save?return='.$return, 'class'=>'form-horizontal','files' => true , 'parsley-validate'=>'','novalidate'=>' ')) !!}
<div class="col-md-12">
						<fieldset><legend> restapi</legend>
									
								  <div class="form-group hidethis " style="display:none;">
									<label for="Id" class=" control-label col-md-4 text-left"> Id </label>
									<div class="col-md-6">
									  {!! Form::text('id', $row['id'],array('class'=>'form-control', 'placeholder'=>'',   )) !!} 
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> 					
								  <div class="form-group  " >
									<label for="Apiuser" class=" control-label col-md-4 text-left"> Apiuser <span class="asterix"> * </span></label>
									<div class="col-md-6">
									  <select name='apiuser' rows='5' id='apiuser' class='select2 ' required  ></select> 
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> 					
								  @if($row['id'] !='')
								  <div class="form-group  " >
									<label for="Apikey" class=" control-label col-md-4 text-left"> 
									Api Key </label>
									<div class="col-md-6">
									  {!! Form::text('apikey', $row['apikey'],array('class'=>'form-control', 'placeholder'=>'','readonly'=>'1' ,'style'=>'background : #fff !important;'   )) !!} 
									 <p><small><i>  Use this apikey with useremail as basic authorization access to all your registered modules </i> </small></p>
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> 
								  @endif				
								  <div class="form-group  " >
									<label for="Modules" class=" control-label col-md-4 text-left"> Modules </label>
									<div class="col-md-6">
									  <textarea name='modules' rows='5' id='modules' class='form-control '  
				           >{{ $row['modules'] }}</textarea> 
			  <p ><small><i> Please register your current modules here . All registering modules , will available for API access </i></small></p>
			  <p> Example : <br />
			   <code>employee</code> , <code>users</code> , <code>customers</code> </p> 				           
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
					<button type="submit" name="apply" class="btn btn-info btn-sm" ><i class="fa  fa-check-circle"></i> {{ Lang::get('core.sb_apply') }}</button>
					<button type="submit" name="submit" class="btn btn-primary btn-sm" ><i class="fa  fa-save "></i> {{ Lang::get('core.sb_save') }}</button>
					<button type="button" onclick="location.href='{{ URL::to('restapi?return='.$return) }}' " class="btn btn-success btn-sm "><i class="fa  fa-arrow-circle-left "></i>  {{ Lang::get('core.sb_cancel') }} </button>
					</div>	  
			
				  </div> 
		 
		 {!! Form::close() !!}
	</div>
</div>		 
</div>	
</div>			 
   <script type="text/javascript">
	$(document).ready(function() { 
		
		
		$("#apiuser").jCombo("{{ URL::to('restapi/comboselect?filter=tb_users:id:email') }}",
		{  selected_value : '{{ $row["apiuser"] }}' });
		 

		$('.removeCurrentFiles').on('click',function(){
			var removeUrl = $(this).attr('href');
			$.get(removeUrl,function(response){});
			$(this).parent('div').empty();	
			return false;
		});		
		
	});
	</script>		 
@stop