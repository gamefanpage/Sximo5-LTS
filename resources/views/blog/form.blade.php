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
		<li><a href="{{ URL::to('blogadmin?return='.$return) }}">{{ $pageTitle }}</a></li>
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

		 {!! Form::open(array('url'=>'blog/save?return='.$return, 'class'=>'form-vertical','files' => true , 'parsley-validate'=>'','novalidate'=>' ')) !!}
<div class="col-md-8">
						<fieldset><legend> Content</legend>
									
								  <div class="form-group hidethis " style="display:none;">
									<label for="ipt" class=" control-label "> BlogID    </label>									
									  {!! Form::text('blogID', $row['blogID'],array('class'=>'form-control', 'placeholder'=>'',   )) !!} 						
								  </div> 					
								  <div class="form-group  " >
									<label for="ipt" class=" control-label "> Title  <span class="asterix"> * </span>  </label>									
									  {!! Form::text('title', $row['title'],array('class'=>'form-control', 'placeholder'=>'', 'required'=>'true'  )) !!} 						
								  </div> 					
								  <div class="form-group  hidethis"  style="display:none;">
									<label for="ipt" class=" control-label "> Slug  <span class="asterix"> * </span>  </label>									
									  {!! Form::text('slug', $row['slug'],array('class'=>'form-control', 'placeholder'=>'',   )) !!} 						
								  </div> 					
								  <div class="form-group  " >
									<label for="ipt" class=" control-label "> Content    </label>									
									  <textarea name='content' rows='35' id='editor' class='form-control editor  '  
						 >{{ $row['content'] }}</textarea> 						
								  </div> </fieldset>
			</div>
			
			<div class="col-md-4">
						<fieldset><legend> Additional Info</legend>
									
								  <div class="form-group  " >
									<label for="ipt" class=" control-label "> CatID  <span class="asterix"> * </span>  </label>									
									  <select name='CatID' rows='5' id='CatID' class='select2 ' required  ></select> 						
								  </div> 					
								  <div class="form-group  " >
									<label for="ipt" class=" control-label "> Tags    </label>									
									  {!! Form::text('tags', $row['tags'],array('class'=>'form-control', 'placeholder'=>'',   )) !!} 						
								  </div> 					
								  <div class="form-group  " >
									<label for="ipt" class=" control-label "> Status    </label>									
									  
					<label class='radio radio-inline'>
					<input type='radio' name='status' value ='publish'  @if($row['status'] == 'publish') checked="checked" @endif > Published </label>
					<label class='radio radio-inline'>
					<input type='radio' name='status' value ='unpublish'  @if($row['status'] == 'unpublish') checked="checked" @endif > Unpublished </label>
					<label class='radio radio-inline'>
					<input type='radio' name='status' value ='draft'  @if($row['status'] == 'draft') checked="checked" @endif > Draft </label> 						
								  </div> 					
								  <div class="form-group  " >
									<label for="ipt" class=" control-label "> Created    </label>									
									  
				<div class="input-group m-b" style="width:150px !important;">
					{!! Form::text('created', $row['created'],array('class'=>'form-control datetime', 'style'=>'width:150px !important;')) !!}
					<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
				</div>
				 						
								  </div> 					
								  <div class="form-group  " >
									<label for="ipt" class=" control-label "> Image    </label>									
									  <input  type='file' name='image' id='image' @if($row['image'] =='') class='required' @endif style='width:150px !important;'  />
					 	<div >
						{!! SiteHelpers::showUploadedFile($row['image'],'/uploads/images/') !!}
						
						</div>					
					 						
								  </div> </fieldset>
			</div>
			
			

		
			<div style="clear:both"></div>	
				
					
				  <div class="form-group">
					<label class="col-sm-4 text-right">&nbsp;</label>
					<div class="col-sm-8">	
					<button type="submit" name="apply" class="btn btn-info btn-sm" ><i class="fa  fa-check-circle"></i> {{ Lang::get('core.sb_apply') }}</button>
					<button type="submit" name="submit" class="btn btn-primary btn-sm" ><i class="fa  fa-save "></i> {{ Lang::get('core.sb_save') }}</button>
					<button type="button" onclick="location.href='{{ URL::to('blogadmin?return='.$return) }}' " class="btn btn-success btn-sm "><i class="fa  fa-arrow-circle-left "></i>  {{ Lang::get('core.sb_cancel') }} </button>
					</div>	  
			
				  </div> 
		 
		 {!! Form::close() !!}
	</div>
</div>		 
</div>	
</div>			 
   <script type="text/javascript">
	$(document).ready(function() { 
		
		
		$("#CatID").jCombo("{{ URL::to('blog/comboselect?filter=tb_blogcategories:CatID:name') }}",
		{  selected_value : '{{ $row["CatID"] }}' });
		 

		$('.removeCurrentFiles').on('click',function(){
			var removeUrl = $(this).attr('href');
			$.get(removeUrl,function(response){});
			$(this).parent('div').empty();	
			return false;
		});		
		
	});
	</script>		 
@stop