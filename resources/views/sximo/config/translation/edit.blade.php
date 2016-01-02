@extends('layouts.app')

@section('content')

  <div class="page-content row">
    <!-- Page header -->
    <div class="page-header">
      <div class="page-title">
        <h3> Translation   <small> Manage Language Translation </small></h3>
      </div>

      <ul class="breadcrumb">
        <li><a href="{{ URL::to('dashboard') }}">{{ Lang::get('core.home') }}</a></li>
		<li><a href="{{ URL::to('config') }}"> Error Logs </a></li>
      </ul>
	</div> 	  


 	<div class="page-content-wrapper m-t">  
 	@include('sximo.config.tab',array('active'=>'translation'))
	@if(Session::has('message'))
	  
		   {{ Session::get('message') }}
	   
	@endif
	<ul class="parsley-error-list">
		@foreach($errors->all() as $error)
			<li>{{ $error }}</li>
		@endforeach
	</ul>		

	 
<div class="tab-content m-t ">
		<div class="sbox   animated fadeInUp"> 
			<div class="sbox-title"> Languange Manager </div>
			<div class="sbox-content"> 

	<div class="col-sm-8">
	
		<h4> Languange Manager </h4>
		<hr />
		<ul class="nav nav-tabs" >
		@foreach($files as $f)
			@if($f != "." and $f != ".." and $f != 'info.json')
			<li @if($file == $f) class="active" @endif  >
			<a href="{{ URL::to('sximo/config/translation?edit='.$lang.'&file='.$f)}}">{{ $f }} </a></li>
			@endif
		@endforeach
		</ul>
		<hr />
		 {!! Form::open(array('url'=>'sximo/config/savetranslation/', 'class'=>'form-vertical ')) !!}
		<table class="table table-striped">
			<thead>
				<tr>
					<th> Pharse </th>
					<th> Translation </th>

				</tr>
			</thead>
			<tbody>	
				
				<?php foreach($stringLang as $key => $val) : 
					if(!is_array($val)) 
					{
					?>
					<tr>	
						<td><?php echo $key ;?></td>
						<td><input type="text" name="<?php echo $key ;?>" value="<?php echo $val ;?>" class="form-control" />
						
						</td>
					</tr>
					<?php 
					} else {
						foreach($val as $k=>$v)
						{ ?>
							<tr>	
								<td><?php echo $key .' - '.$k ;?></td>
								<td><input type="text" name="<?php echo $key ;?>[<?php echo $k ;?>]" value="<?php echo $v ;?>" class="form-control" />
								
								</td>
							</tr>						
						<?php }
					}
				endforeach; ?>
			</tbody>
			
		</table>
		<input type="hidden" name="lang" value="{{ $lang }}"  />
		<input type="hidden" name="file" value="{{ $file }}"  />
		<button type="submit" class="btn btn-info"> Save Translation</button>
		{!! Form::close() !!}

	</div> 
	
	
	<div class="clr"></div>
	</div>

</div>
</div></div></div>






@endsection