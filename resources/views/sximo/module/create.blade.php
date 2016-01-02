@extends('layouts.app')

@section('content')

  <div class="page-content row">
    <!-- Page header -->
    <div class="page-header">
      <div class="page-title">
          <h3> {{ Lang::get('core.t_module') }} <small>{{ Lang::get('core.t_modulesmall') }}</small></h3>
      </div>

      <ul class="breadcrumb">
        <li><a href="{{ URL::to('dashboard') }}"> Dashboard </a></li>
		<li><a href="{{ URL::to('sximo/module') }}">{{ Lang::get('core.t_module') }}</a></li>
        <li class="active"> {{ Lang::get('core.create') }} </li>
      </ul>
	</div>  

	@if(Session::has('message'))
		   {{ Session::get('message') }}
	@endif	


	 <div class="page-content-wrapper m-t">  
		

 {!! Form::open(array('url'=>'sximo/module/create/', 'class'=>'form-horizontal', 'parsley-validate'=>'','novalidate'=>'')) !!}

		<div class="sbox   animated fadeInUp"> 
			<div class="sbox-title">  </div>
			<div class="sbox-content"> 	
	
      <div class="form-group">
		<label class="col-sm-3 text-right"></label>
		<div class="col-sm-9">	
	  
			<ul class="parsley-error-list">
			@foreach($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
			</ul> 
		
		</div>	  
      </div>	

	<div class="form-group has-feedback">
		<label class="col-sm-3 text-right"> {{ Lang::get('core.fr_modtitle') }} </label>
		<div class="col-sm-9">	
	  {!! Form::text('module_title', null, array('class'=>'form-control', 'placeholder'=>'Title Name', 'required'=>'true')) !!}
		</div>
	</div>		
	
	<div class="form-group ">
		<label class="col-sm-3 text-right"> {{ Lang::get('core.fr_modnote') }}  </label>
		<div class="col-sm-9">	
	  {!! Form::text('module_note', null, array('class'=>'form-control', 'placeholder'=>'Short description module')) !!}
		
		</div>
	</div>

	<div class="form-group ">
		<label class="col-sm-3 text-right"> Template :  </label>
		<div class="col-sm-9">	
			<label class="radio">	
				<input type="radio" name="module_template" value="addon" checked="checked" /> Full CRUD   <br />
				<small style="font-style:italic"> Add,Edit,View in new page , Native php sorting and pagination </small> 
			</label>
			<label class="radio">	
				<input type="radio" name="module_template" value="generic" />  Blank Module <br />				
				
				<small style="font-style:italic">  Create template controller , model and views files for your own custom module</small> 
				
			</label>

			<label class="radio">	
				<input type="radio" name="module_template" value="report" />  Report Module <br />				
				
				<small style="font-style:italic"> Used for table view (  MySQL View Table Schema) </small> 
				
			</label>		

			<label class="radio">	
				<input type="radio" name="module_template" value="ajax" /> <span class="text-success"><b>  Ajax Crud </b></span> <br />				
				
				<small style="font-style:italic"> Edit Modal, Modal Add , Modal View , Copy Rows , lock master key values , Ajax sorting and pagination </small> 
				
			</label>			
					
		</div>
	</div>		


	<div class="form-group ">
		<label class="col-sm-3 text-right">Class Controller </label>
		<div class="col-sm-9">	
	  {!! Form::text('module_name', null, array('class'=>'form-control', 'placeholder'=>'Class Controller / Module Name' ,  'required'=>'true')) !!}
		
		</div>
	</div>	
		
	
	<div class="form-group">
		<label class="col-sm-3 text-right"> {{ Lang::get('core.fr_modtable') }}  </label>
		<div class="col-sm-9">	
		{!! Form::select('module_db', $tables , '' , 
			array('class'=>'form-control ', 'required'=>'true' )); 
		!!}
	 	
		</div>
	</div>	
		
	<div class="form-group " style="display:none;">
		<label class="col-sm-3 text-right">Author </label>
		<div class="col-sm-9">	
	  {!! Form::text('module_author',  null, array('class'=>'form-control', 'placeholder'=>'Author')) !!}
		
		</div>
	</div>	
		


	<div class="form-group switchSql">
		<label class="col-sm-3 text-right">  </label>
		<div class="col-sm-9">	
			<label class="radio radio-inline">
				<input type="radio" name="creation" value="auto"  checked="checked"  /> 
				{{ Lang::get('core.fr_modautosql') }} 
			</label>		
			<label class="radio radio-inline">
				<input type="radio" name="creation" value="manual"  />
				{{ Lang::get('core.fr_modmanualsql') }}
			</label>		
		</div>
	</div>	
	
	<div class="form-group manualsql">
		<label class="col-sm-3 text-right">  </label>
		<div class="col-sm-9">
			{!! Form::textarea('sql_select', null, array('class'=>'form-control', 'placeholder'=>'SQL Select & Join Statement' ,'rows'=>'3' ,'id'=>'sql_select')) !!}
		  
		</div> 
	</div>	
	
	<div class="form-group manualsql">
		<label class="col-sm-3 text-right">  </label>
		<div class="col-sm-9">
		{!! Form::textarea('sql_where', null, array('class'=>'form-control', 'placeholder'=>'SQL Where Statement' ,'rows'=>'2','id'=>'sql_where')) !!}
		</div> 
	</div>		

	<div class="form-group manualsql">
		<label class="col-sm-3 text-right">  </label>
		<div class="col-sm-9">
			{!! Form::textarea('sql_group', null, array('class'=>'form-control', 'placeholder'=>'SQL Grouping Statement' ,'rows'=>'2')) !!}
		</div> 
	</div>	
	
		
      <div class="form-group">
		<label class="col-sm-3 text-right">&nbsp;</label>
		<div class="col-sm-9">	
	  	<button type="submit" class="btn btn-primary ">  {{ Lang::get('core.sb_submit') }}</button>
		</div>	  

      </div>
    </div>
  </div>    
    
 {!! Form::close() !!}
</div>


<script type="text/javascript">
	$(document).ready(function(){
		$('.manualsql').hide();
		$('.switchSql input:radio').on('ifClicked', function() {
		  val = $(this).val(); 
			if(val == 'manual')
			{
				$('.manualsql').show();
				$('#sql_select').attr("required","true");
				$('#sql_where').attr("required","true");
				
			} else {
				$('.manualsql').hide();
				$('#sql_select').removeAttr("required");
				$('#sql_where').removeAttr("required");
	
			}		  
		  
		});

	});
	
</script>
@stop
