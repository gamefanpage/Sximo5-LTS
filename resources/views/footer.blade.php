	<div class="table-footer">
	<div class="row">
	 <div class="col-sm-5">
	  <div class="table-actions" style=" padding: 10px 0">
	 
	   {!! Form::open(array('url'=>$pageModule.'/filter/')) !!}
		   {{--*/ $pages = array(5,10,20,30,50) /*--}}
		   {{--*/ $orders = array('asc','desc') /*--}}
		<select name="rows" data-placeholder="{{ Lang::get('core.grid_show') }}" class="select-alt"  >
		  <option value=""> {{ Lang::get('core.grid_page') }} </option>
		  @foreach($pages as $p)
		  <option value="{{ $p }}" 
			@if(isset($pager['rows']) && $pager['rows'] == $p) 
				selected="selected"
			@endif	
		  >{{ $p }}</option>
		  @endforeach
		</select>
		<select name="sort" data-placeholder="{{ Lang::get('core.grid_sort') }}" class="select-alt"  >
		  <option value=""> {{ Lang::get('core.grid_sort') }} </option>	 
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
		<select name="order" data-placeholder="{{ Lang::get('core.grid_order') }}" class="select-alt">
		  <option value=""> {{ Lang::get('core.grid_order') }}</option>
		   @foreach($orders as $o)
		  <option value="{{ $o }}"
			@if(isset($pager['order']) && $pager['order'] == $o)
				selected="selected"
			@endif	
		  >{{ ucwords($o) }}</option>
		 @endforeach
		</select>	
		<button type="submit" class="btn btn-primary btn-sm">GO</button>	
		<input type="hidden" name="md" value="{{ (isset($masterdetail['filtermd']) ? $masterdetail['filtermd'] : '') }}" />
	  {!! Form::close() !!}
	  </div>					
	  </div>
	   <div class="col-sm-3">
		<p class="text-center" style=" padding: 25px 0">
		Total : <b>{{ $pagination->total() }}</b>
		</p>		
	   </div>
		<div class="col-sm-4">			 
	  {!! $pagination->appends($pager)->render() !!}
	  </div>
	  </div>
	</div>	
	
	