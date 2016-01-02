@extends('layouts.app')

@section('content')

  <div class="page-content row ">
    <!-- Page header -->
    <div class="page-header">
      <div class="page-title">
        <h3> Info Editor <small> Edit Info for Module </small></h3>
      </div>

      <ul class="breadcrumb">
        <li><a href="{{ URL::to('dashboard') }}"> Dashboard </a></li>
		<li><a href="{{ URL::to('sximo/module') }}"> Module </a></li>
        <li class="active"> Basic Info </li>
      </ul>	  
	  
    </div>

 <div class="page-content-wrapper m-t"> 
@include('sximo.module.tab',array('active'=>'config','type'=> $type))
	
	
@if(Session::has('message'))
       {{ Session::get('message') }}
@endif
<ul>
	@foreach($errors->all() as $error)
		<li>{{ $error }}</li>
	@endforeach
</ul>	
<div class="sbox">
	<div class="sbox-title"><h5> Basic Info <small> Information of module </small> </h5></div>
	<div class="sbox-content">	
	<div class="col-md-6">
	{!! Form::open(array('url'=>'sximo/module/saveconfig/'.$module_name, 'class'=>'form-horizontal ')) !!}
	<input  type='text' name='module_id' id='module_id'  value='{{ $row->module_id }}'  style="display:none; " />
  	<fieldset>
		<legend> Module Info </legend>	
  		<div class="form-group">
    		<label for="ipt" class=" control-label col-md-4">Name / Title </label>
			<div class="col-md-8">
				<div class="input-group input-group-sm" style="margin:1px 0 !important;">
				<input  type='text' name='module_title' id='module_title' class="form-control " required value='{{ $row->module_title }}'  />
				<span class="input-group-addon xlick bg-default btn-sm " >EN</span>
			</div> 		
			  <?php $lang = SiteHelpers::langOption();
			   if(CNF_MULTILANG ==1) {
				foreach($lang as $l) { if($l['folder'] !='en') {
			   ?>
			   <div class="input-group input-group-sm" style="margin:1px 0 !important;">
				 <input name="language_title[<?php echo $l['folder'];?>]" type="text"   class="form-control" placeholder="Label for <?php echo $l['name'];?>"
				 value="<?php echo (isset($module_lang['title'][$l['folder']]) ? $module_lang['title'][$l['folder']] : '');?>" />
				<span class="input-group-addon xlick bg-default btn-sm " ><?php echo strtoupper($l['folder']);?></span>
			   </div> 
	 
 			 <?php } } }?>	  
			 </div> 
  		</div>   

		<div class="form-group">
			<label for="ipt" class=" control-label col-md-4">Module Note</label>
			<div class="col-md-8">
				<div class="input-group input-group-sm" style="margin:1px 0 !important;">
				<input  type='text' name='module_note' id='module_note'  value='{{ $row->module_note }}' class="form-control "  />
				<span class="input-group-addon xlick bg-default btn-sm " >EN</span>
			</div> 	
		  <?php $lang = SiteHelpers::langOption();
		   if(CNF_MULTILANG ==1) {
			foreach($lang as $l) { if($l['folder'] !='en') {
		   ?>
		   <div class="input-group input-group-sm" style="margin:1px 0 !important;">
			 <input name="language_note[<?php echo $l['folder'];?>]" type="text"   class="form-control" placeholder="Note for <?php echo $l['name'];?>"
			 value="<?php echo (isset($module_lang['note'][$l['folder']]) ? $module_lang['note'][$l['folder']] : '');?>" />
			<span class="input-group-addon xlick bg-default btn-sm " ><?php echo strtoupper($l['folder']);?></span>
		   </div> 
			 
		  <?php } } }?>	
			 </div> 
		 </div>   	

	  <div class="form-group">
		<label for="ipt" class=" control-label col-md-4">Class Controller </label>
		<div class="col-md-8">
		<input  type='text' name='module_name' id='module_name' readonly="1"  class="form-control " required value='{{ $row->module_name }}'  />
		 </div> 
	  </div>  
  
	   <div class="form-group">
		<label for="ipt" class=" control-label col-md-4">Table Master</label>
		<div class="col-md-8">
		<input  type='text' name='module_db' id='module_db' readonly="1"  class="form-control " required value='{{ $row->module_db}}'  />
		  
		 </div> 
	  </div>  
  
	  <div class="form-group" style="display:none;" >
		<label for="ipt" class=" control-label col-md-4">Author </label>
		<div class="col-md-8">
		<input  type='text' name='module_author' id='module_author' class="form-control " required readonly="1"  value='{{ $row->module_author }}'  />
		 </div> 
	  </div>  
	 
		<div class="form-group">
			<label for="ipt" class=" control-label col-md-4"></label>
			<div class="col-md-8">
			<button type="submit" name="submit" class="btn btn-primary"> Update Module </button>
			 </div> 
		</div>   
	</fieldset>
  	{!! Form::close() !!}
	
  
	</div>
 <div class="col-sm-6 col-md-6"> 

 @if($type !='report' && $type !='generic')
  {!! Form::open(array('url'=>'sximo/module/savesetting/'.$module_name, 'class'=>'form-horizontal ')) !!}
  <input  type='text' name='module_id' id='module_id'  value='{{ $row->module_id }}'  style="display:none; " />
  	<fieldset>
		<legend> Module Setting </legend>

		  <div class="form-group">
			<label for="ipt" class=" control-label col-md-4"> Grid Table Type </label>
			<div class="col-md-8">
				<label class="radio">
				<input type="radio" value="addon" name="module_type"
				@if($row->module_type !='ajax') checked="checked" @endif 
				 /> Native  
				</label>
				<label class="radio">
				<input type="radio" value="ajax" name="module_type" 
				@if($row->module_type =='ajax') checked="checked" @endif 				
				/> Ajax  
				</label>							
			 </div> 
		  </div> 


	
	  <div class="form-group">
		<label for="ipt" class=" control-label col-md-4"> Default Order  </label>
		<div class="col-md-8">
			<select class="select-alt" name="orderby">
			@foreach($tables as $t)
				<option value="{{ $t['field'] }}"
				@if($setting['orderby'] ==$t['field']) selected="selected" @endif 
				>{{ $t['label'] }}</option>
			@endforeach
			</select>
			<select class="select-alt" name="ordertype">
				<option value="asc" @if($setting['ordertype'] =='asc') selected="selected" @endif > Ascending </option>
				<option value="desc" @if($setting['ordertype'] =='desc') selected="selected" @endif > Descending </option>
			</select>
			
		 </div> 
	  </div> 
	  
	  <div class="form-group">
		<label for="ipt" class=" control-label col-md-4"> Display Rows </label>
		<div class="col-md-8">
			<select class="select-alt" name="perpage">
				<?php $pages = array('10','20','30','50');
				foreach($pages as $page) {
				?>
				<option value="<?php echo $page;?>"  @if($setting['perpage'] ==$page) selected="selected" @endif > <?php echo $page;?> </option>
				<?php } ?>
			</select>	
			/ Page	
		 </div> 
	  </div>   
		
	</fieldset>	

  	<fieldset>
	<legend> Form & View Setting </legend>
		<p> <i>You can switch this setting and applied to current module without have to rebuild </i></p>

		  <div class="form-group">
			<label for="ipt" class=" control-label col-md-4"> Form Method </label>
			<div class="col-md-8">
				<label class="radio-inline">
				<input type="radio" value="native" name="form-method"
				 @if($setting['form-method'] == 'native') checked="checked" @endif 
				 /> New Page  
				</label>
				<label class="radio-inline">
				<input type="radio" value="modal" name="form-method" 
				 @if($setting['form-method'] == 'modal') checked="checked" @endif 			
				/> Modal  
				</label>							
			 </div> 
		  </div> 

		  <div class="form-group">
			<label for="ipt" class=" control-label col-md-4"> View  Method </label>
			<div class="col-md-8">
				<label class="radio-inline">
				<input type="radio" value="native" name="view-method"
				 @if($setting['view-method'] == 'native') checked="checked" @endif 
				 /> New Page  
				</label>
				<label class="radio-inline">
				<input type="radio" value="modal" name="view-method" 
				 @if($setting['view-method'] == 'modal') checked="checked" @endif 			
				/> Modal  
				</label>	
				<label class="radio-inline">
				<input type="radio" value="expand" name="view-method" 
				 @if($setting['view-method'] == 'expand') checked="checked" @endif 			
				/> Expand Grid   
				</label>

			 </div> 
		  </div> 		  

		  <div class="form-group">
			<label for="ipt" class=" control-label col-md-4"> Inline add / edit row </label>
			<div class="col-md-8">
				<label class="checkbox">
				<input type="checkbox" value="true" name="inline"
				@if($setting['inline'] == 'true') checked="checked" @endif 	
				 /> Yes  Allowed 
				</label>
										
			 </div> 
		  </div> 		  

		  <div class="form-group">
			<label for="ipt" class=" control-label col-md-4"></label>
			<div class="col-md-8">
			<button type="submit" name="submit" class="btn btn-primary"> Update Seting </button>
			 </div> 
		  </div> 		  
		   <p class="alert alert-warning"> <strong> Important ! </strong> this setting only work with module type <strong>Ajax Grid</strong></p>
	</fieldset>
	{!! Form::close() !!}
	@endif
	
  </div>
  <div class="clr" style="clear:both;"></div>


	<div class="clr clear"></div>
	</div>
	</div>
</div>			

@stop