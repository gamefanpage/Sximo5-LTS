{{--*/ usort($tableGrid, "SiteHelpers::_sort") /*--}}
<a  class="btn btn-primary btn-sm"  href="javascript:history.go(-1)"> Back To Lists </a><br /><br />
<table class="table table-striped table-bordered" >
<tbody>	
@foreach ($tableGrid as $field)
	@if($field['detail'] ==1)
	<tr>
		<td width='30%' class='label-view text-right'>{{ $field['label']}}</td>
		<td>
			@if($field['attribute']['image']['active'] =='1')
				<img src="{{ asset($field['attribute']['image']['path'].'/'.$row->$field['field'])}}" width="50" />
			@else	
				{{--*/ $conn = (isset($field['conn']) ? $field['conn'] : array() ) /*--}}
				{{ SiteHelpers::gridDisplay($row->$field['field'],$field['field'],$conn) }}	
			@endif			
		 </td>
		
	</tr>
	@endif
@endforeach	
</tbody>
</table>	