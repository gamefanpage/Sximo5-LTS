@extends('layouts.app')


@section('content')

  <div class="page-content row">
    <!-- Page header -->
    <div class="page-header">
      <div class="page-title">
        <h3> Translation   <small> Manage Language Translation </small></h3>
      </div>

		  <ul class="breadcrumb">
			<li><a href="{{ URL::to('dashboard') }}"> Dashboard</a></li>
			<li><a href="{{ URL::to('sximo/config') }}"> Setting </a></li>
			<li class="active"> Translation </li>
		  </ul>
			  
	  
    </div>


	<div class="page-content-wrapper m-t">  	
	@include('sximo.config.tab',array('active'=>'translation'))
	 <div class="tab-pane active use-padding" id="info">	
<div class="tab-content m-t ">
		<div class="sbox   animated fadeInUp"> 
			<div class="sbox-title"> Languange Manager </div>
			<div class="sbox-content"> 		 

	@if(Session::has('message'))
	  
		   {{ Session::get('message') }}
	   
	@endif
	<ul class="parsley-error-list">
		@foreach($errors->all() as $error)
			<li>{{ $error }}</li>
		@endforeach
	</ul>	  
	  
	 {!! Form::open(array('url'=>'sximo/config/translation/', 'class'=>'form-vertical row')) !!}
	
	<div class="col-sm-9">
		
		<a href="{{ URL::to('sximo/config/addtranslation')}} " onclick="SximoModal(this.href,'Add New Language');return false;" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Add New Translation </a>  
		<hr />
		<table class="table table-striped">
			<thead>
				<tr>
					<th> Name </th>
					<th> Folder </th>
					<th> Author </th>
					<th> Action </th>
				</tr>
			</thead>
			<tbody>		
		
			@foreach(SiteHelpers::langOption() as $lang)
				<tr>
					<td>  {{  $lang['name'] }}   </td>
					<td> {{  $lang['folder'] }} </td>
					<td> {{  $lang['author'] }} </td>
				  	<td>
					@if($lang['folder'] !='en')
					<a href="{{ URL::to('sximo/config/translation?edit='.$lang['folder'])}} " class="btn btn-sm btn-primary"> Manage </a>
					<a href="{{ URL::to('sximo/config/removetranslation/'.$lang['folder'])}} " class="btn btn-sm btn-danger"> Delete </a> 
					 
					@endif 
				
				</td>
				</tr>
			@endforeach
			
			</tbody>
		</table>
	</div> 
	</div>
	</div>



 	
 </div>
 {!! Form::close() !!}
</div>
</div>
</div>
</div>






@endsection