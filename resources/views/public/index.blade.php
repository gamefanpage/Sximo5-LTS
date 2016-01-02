
 <div class="table-responsive">
    <table class="table table-striped table-bordered ">
        <thead>
			<tr>
				<th> No </th>
				@foreach ($tableGrid as $t)
					@if($t['view'] =='1')
						<th>{{ $t['label'] }}</th>
					@endif
				@endforeach
				<th width="75">{{ Lang::get('core.btn_action') }}</th>
			  </tr>
        </thead>
		 <tbody>
		   @foreach ($rowData as $r)
                <tr>
					<td width="50">  {{ ++$i}}</td>									
				 	@foreach ($tableGrid as $field)
					 @if($field['view'] =='1')
					 <td>					 
					 
					 	@if($field['attribute']['image']['active'] =='1')
							<img src="{{ asset($field['attribute']['image']['path'].'/'.$r->$field['field'])}}" width="50" />
						@else	
							{{--*/ $conn = (isset($field['conn']) ? $field['conn'] : array() ) /*--}}
							{{ SiteHelpers::gridDisplay($r->$field['field'],$field['field'],$conn) }}	
						@endif							 
					 </td>
					 @endif					 
					 @endforeach
				 <td>
				 	{{--*/ $id = $r->$key /*--}}
					<a href="?task=view&id={{ $id }}"  class="tips btn btn-xs btn-primary"  title="{{ Lang::get('core.btn_view') }}"><i class="fa  fa-search"></i> </a>
				
					
				</td>
			</tr>
			 @endforeach
		</tbody>		 	 
		
	</table>
</div>	
	
<div class="text-center">	 {{ $pagination->render() }} </div>
		