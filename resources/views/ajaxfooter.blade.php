<?php 
$pages = array(10,20,30,50); 
$orders = array('asc','desc'); 
?>
		   
	<div class="table-footer">
	<div class="row">
	 <div class="col-sm-5">
	  <div class="table-actions" style=" padding: 10px 0" id="<?php echo $pageModule;?>Filter">
  			<input type="hidden" name="page" value="{{ $param['page']}}" />
			<input type="hidden" name="search" value="<?php if(!is_null(Input::get('search'))) echo Input::get('search') ;?>" />
			
		<select name="rows" class="select-alt" style="width:70px; float:left;"  >
		  @foreach($pages as $p) 
		  <option value="{{ $p }}" 
			@if(isset($pager['rows']) && $pager['rows'] == $p) 
				selected="selected"
			@endif	
		  >{{ $p }}</option>
		  @endforeach
		</select>
		<select name="sort" class="select-alt" style="width:100px;float:left;" >
		  <option value=""><?php echo Lang::get('core.grid_sort');?></option>	 
		  @foreach($tableGrid as $field)
		   @if($field['view'] =='1' && $field['sortable'] =='1') 
			  <option value="{{ $field['field'] }}" 
				@if(isset($pager['sort']) && $pager['sort'] == $field['field']) 
					selected="selected"
				@endif
			  >{{ $field['label'] }}</option>
			@endif	  
		  @endforeach
		 
		</select>	
		<select name="order" class="select-alt" style="width:70px;float:left;">
		  <option value="">{{ Lang::get('core.grid_order') }}</option>
		   @foreach($orders as $o)
		  <option value="{{ $o }}"
			@if(isset($pager['order']) && $pager['order'] == $o)
				selected="selected"
			@endif	
		  >{{ ucwords($o) }}</option>
		 @endforeach
		</select>	
		<button type="button" class="btn  btn-primary btn-sm" onclick="ajaxFilter('#<?php echo $pageModule;?>','{{ $pageUrl }}/data')" style="float:left;"><i class="fa  fa-search"></i> GO</button>	
	 
	  </div>					
	  </div>
	   <div class="col-sm-3">
		<p class="text-center" style=" padding: 25px 0">
		
		</p>
	   </div>
		<div class="col-sm-4" id="<?php echo $pageModule;?>Paginate">			 
	    {!! $pagination->appends($pager)->render() !!}
	  </div>
	  </div>
	</div>	
	
	