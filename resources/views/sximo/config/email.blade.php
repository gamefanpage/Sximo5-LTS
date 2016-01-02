
 @extends('layouts.app')

@section('content')
  <div class="page-content row">
    <!-- Page header -->
    <div class="page-header">
      <div class="page-title">
        <h3><i class="fa fa-envelope"></i> {{ Lang::get('core.t_blastemail') }}  <small>{{ Lang::get('core.t_blastemailsmall') }}</small></h3>
      </div>
   
      <ul class="breadcrumb">
        <li><a href="{{ URL::to('dashboard') }}">{{ Lang::get('core.home') }}</a></li>
		<li><a href="{{ URL::to('config') }}">{{ Lang::get('core.t_blastemail') }}</a></li>
		
      </ul>
	  
	  
    </div>

 <div class="page-content-wrapper">  
	@if(Session::has('message'))
	  
		   {{ Session::get('message') }}
	   
	@endif
	<ul class="parsley-error-list">
		@foreach($errors->all() as $error)
			<li>{{ $error }}</li>
		@endforeach
	</ul>		
<div class="block-content">
	@include('sximo.config.tab')	
<div class="tab-content m-t">
	  <div class="tab-pane active use-padding" id="info">	
	 {!! Form::open(array('url'=>'sximo/config/email/', 'class'=>'form-vertical row')) !!}
	
	<div class="col-sm-6 animated fadeInRight">
		<div class="sbox  "> 
			<div class="sbox-title"> {{ Lang::get('core.registernew') }}  </div>
			<div class="sbox-content"> 	
				  <div class="form-group">
					<label for="ipt" class=" control-label"> {{ Lang::get('core.tab_email') }} </label>		
					<textarea rows="20" name="regEmail" class="form-control input-sm  markItUp">{{ $regEmail }}</textarea>		
				  </div>  
				

				<div class="form-group">   
					<button class="btn btn-primary" type="submit"> {{ Lang::get('core.sb_savechanges') }}</button>	 
				</div>
			
			</div>	
		</div>
		


</div> 


	<div class="col-sm-6 animated fadeInRight">
		<div class="sbox  "> 
			<div class="sbox-title">  {{ Lang::get('core.forgotpassword') }}</div>
			<div class="sbox-content"> 	
				  <div class="form-group">
					<label for="ipt" class=" control-label ">{{ Lang::get('core.tab_email') }} </label>					
					<textarea rows="20" name="resetEmail" class="form-control input-sm markItUp">{{ $resetEmail }}</textarea>					 
				  </div> 

			  <div class="form-group">
					<button class="btn btn-primary" type="submit">{{ Lang::get('core.sb_savechanges') }}</button>
				 </div> 
			</div>	 
	  </div>	  
	
 	
 </div>
 {!! Form::close() !!}
</div>
</div>
</div>
</div>
@stop





