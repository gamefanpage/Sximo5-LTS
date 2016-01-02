 {!! Form::open(array('url'=>'sximo/module/dobuild/'.$module_name, 'class'=>'form-horizontal')) !!}

  <div class="form-group">
    <label for="ipt" class=" control-label col-md-4">Controller </label>
	<div class="col-md-8">
	  <label class="checkbox">
	  <input name="controller" type="checkbox" id="controller" value="1">
	  <code> {{ ucwords($module) }}Controller.php </code> <br />will be replaced with you code 
	  </label>
	 </div> 
  </div>  

  <div class="form-group">
    <label for="ipt" class=" control-label col-md-4">Model </label>
	<div class="col-md-8">
	  <label class="checkbox">
	  	<input name="model" type="checkbox" id="model" value="1">
		 <code>{{ ucwords($module) }}.php</code> Model <br />will be replaced with you code 
	  </label>
	 </div> 
  </div>  
  
  <div class="form-group">
    <label for="ipt" class=" control-label col-md-4">Grid Table </label>
	<div class="col-md-8">
	  <label class="checkbox">
	  <input name="grid" type="checkbox" id="grid" value="1">
	  <code>index.blade.php</code>  at <code>views/{{ $module }}/ </code> folder <br /> will be replaced with you code 
	  </label>
	 </div> 
  </div>  

  <div class="form-group">
    <label for="ipt" class=" control-label col-md-4">Form </label>
	<div class="col-md-8">
	  <label class="checkbox">
	  <input name="form" type="checkbox" id="form" value="1" checked>
	  <code>form.blade.php</code>  at <code>views/{{ $module }}/ </code> folder <br /> will be replaced with you code 
	 
	  </label>
	 </div> 
  </div>        
  
  <div class="form-group">
    <label for="ipt" class=" control-label col-md-4">View Detail  </label>
	<div class="col-md-8">
	  <label class="checkbox">
	  <input name="view" type="checkbox" id="view" value="1" checked>
     <code>view.blade.php</code>  at <code>views/{{ $module }}/ </code> folder <br /> will be replaced with you code 
	  </label>
	   <input name="rebuild" type="hidden" id="rebuild" value="ok">
	   <input name="module_id" type="hidden" id="module_id" value="{{ $module_id}}">
	 </div> 
  </div>   
  
   <div class="form-group">
    <label for="ipt" class=" control-label col-md-4"></label>
	<div class="col-md-8">
	  <button type="submit" name="submit" class="btn btn-sm btn-danger"> Re-Build Now</button>
	 </div> 
  </div>       

 {!! Form::close() !!}
 <script type="text/javascript">
	$(function(){
		$('input[type="checkbox"],input[type="radio"]').iCheck({
			checkboxClass: 'icheckbox_square-green',
			radioClass: 'iradio_square-green',
		});	
		
	})
 </script>

