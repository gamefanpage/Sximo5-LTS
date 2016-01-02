@extends('layouts.app')

@section('content')
<?php use \App\Http\Controllers\SbprojectController; ?>
{{--*/ usort($tableGrid, "SiteHelpers::_sort") /*--}}
  <div class="page-content row" >
    <!-- Page header -->
    <div class="page-header" >
      <div class="page-title">
        <h3> {{ $pageTitle }} <small>{{ $pageNote }}</small></h3>
      </div>

      <ul class="breadcrumb">
        <li><a href="{{ URL::to('dashboard') }}"> Dashboard </a></li>
        <li class="active">{{ $pageTitle }}</li>
      </ul>	  
	  
    </div>
	
	
	<div class="page-content-wrapper m-t" >	 	

		<section>
			<div class="row m-l-none m-r-none m-t  white-bg shortcut " >
				<div class="col-sm-6 col-md-3 b-r  p-sm ">
					<span class="pull-left m-r-sm text-navy"><i class="fa fa-tags"></i></span> 
					<a href="{{ URL::to('sbproject') }}" class="clear">
						<span class="h3 block m-t-xs"><strong>  Projects  </strong>
						</span> <small class="text-muted text-uc">   Manage Existing Projects  </small>
					</a>
				</div>
				<div class="col-sm-6 col-md-3 b-r  p-sm">
					<span class="pull-left m-r-sm text-info">	<i class="fa fa-users"></i></span>
					<a href="{{ URL::to('sbclient') }}" class="clear">
						<span class="h3 block m-t-xs"><strong> Clients </strong>
						</span> <small class="text-muted text-uc">   Manage All Clients</small> 
					</a>
				</div>
				<div class="col-sm-6 col-md-3 b-r  p-sm">
					<span class="pull-left m-r-sm text-warning">	<i class="fa fa-edit"></i></span>
					<a href="javascript://ajax" onclick="alert('This feature not available for free version!')" class="clear">
					<span class="h3 block m-t-xs"><strong>  Task Manager </strong></span>
					<small class="text-muted text-uc">  Not available </small> </a>
				</div>
				<div class="col-sm-6 col-md-3 b-r  p-sm">
					<span class="pull-left m-r-sm text-danger">	<i class="fa fa-bug"></i></span>
					<a href="javascript://ajax" onclick="alert('This feature not available for free version!')" class="clear">
					<span class="h3 block m-t-xs"><strong> Issue Tracker </strong>
					</span> <small class="text-muted text-uc">   Not available </small> </a>
				</div>
			</div> 
		</section>	
	
	    <div class="toolbar-line ">
			@if($access['is_add'] ==1)
	   		<a href="{{ URL::to('sbproject/update') }}" class="tips btn btn-sm btn-white"  title="{{ Lang::get('core.btn_create') }}">
			<i class="fa fa-plus-circle "></i>&nbsp;{{ Lang::get('core.btn_create') }}</a>
			@endif  
			@if($access['is_remove'] ==1)
			<a href="javascript://ajax"  onclick="SximoDelete();" class="tips btn btn-sm btn-white" title="{{ Lang::get('core.btn_remove') }}">
			<i class="fa fa-minus-circle "></i>&nbsp;{{ Lang::get('core.btn_remove') }}</a>
			@endif 
			<a href="{{ URL::to( 'sbproject/search') }}" class="btn btn-sm btn-white" onclick="SximoModal(this.href,'Advance Search'); return false;" ><i class="fa fa-search"></i> Search</a>				
			@if($access['is_excel'] ==1)
			<a href="{{ URL::to('sbproject/download?return='.$return) }}" class="tips btn btn-sm btn-white" title="{{ Lang::get('core.btn_download') }}">
			<i class="fa fa-download"></i>&nbsp;{{ Lang::get('core.btn_download') }} </a>
			@endif			
		 
		</div> 		

	
	<hr />
	 {!! Form::open(array('url'=>'sbproject/delete/', 'class'=>'form-horizontal' ,'id' =>'SximoTable' )) !!}
	 
    <table class="table table-striped ">
        <thead>
			<tr>
				<th class="number"> No </th>
				<th> <input type="checkbox" class="checkall" /></th>
				
				@foreach ($tableGrid as $t)
					@if($t['view'] =='1')				
						<?php $limited = isset($t['limited']) ? $t['limited'] :''; ?>
						@if(SiteHelpers::filterColumn($limited ))
						
							<th>{{ $t['label'] }}</th>			
						@endif 
					@endif
				@endforeach
				<th width="70" >{{ Lang::get('core.btn_action') }}</th>
			  </tr>
        </thead>

        <tbody>        						
            @foreach ($rowData as $row)
                <tr>
					<td width="30" style=" vertical-align: middle !important;"> {{ ++$i }} </td>
					<td width="50" style=" vertical-align: middle !important;"><input type="checkbox" class="ids" name="id[]" value="{{ $row->ProjectID }}" />  </td>									
				 @foreach ($tableGrid as $field)
					 @if($field['view'] =='1')
					 	<?php $limited = isset($field['limited']) ? $field['limited'] :''; ?>
					 	@if(SiteHelpers::filterColumn($limited ))
						 <td style=" vertical-align: middle !important;">					 
						 	@if($field['attribute']['image']['active'] =='1')
								{!! SiteHelpers::showUploadedFile($row->$field['field'],$field['attribute']['image']['path']) !!}
							
							@elseif($field['field'] =='Status')
								{!!  SbprojectController::Status($row->Status )!!}
							@elseif($field['field'] =='Progress')
									Completen With : {!! $row->Progress !!}% 
								 <div class="progress">
								  <div class="progress-bar" role="progressbar" aria-valuenow="{!! $row->Progress !!}"
								  aria-valuemin="0" aria-valuemax="100" style="width:{!! $row->Progress !!}%">
								    {!! $row->Progress !!}%
								  </div>
								</div>		
							@elseif($field['field'] =='Teams')
								{!!  SbprojectController::showTeam($row->Teams )!!}

							@else	
								{{--*/ $conn = (isset($field['conn']) ? $field['conn'] : array() ) /*--}}
								{!! SiteHelpers::gridDisplay($row->$field['field'],$field['field'],$conn) !!}	
							@endif						 
						 </td>
						@endif	
					 @endif					 
				 @endforeach
				 <td style=" vertical-align: middle !important;">
					 	@if($access['is_detail'] ==1)
						<a href="{{ URL::to('sbproject/show/'.$row->ProjectID.'?return='.$return)}}" class="tips btn btn-xs btn-primary" title="{{ Lang::get('core.btn_view') }}"><i class="fa  fa-search "></i></a>
						@endif
						@if($access['is_edit'] ==1)
						<a  href="{{ URL::to('sbproject/update/'.$row->ProjectID.'?return='.$return) }}" class="tips btn btn-xs btn-success" title="{{ Lang::get('core.btn_edit') }}"><i class="fa fa-edit "></i></a>
						@endif
												
					
				</td>				 
                </tr>
				
            @endforeach
              
        </tbody>
      
    </table>
	<input type="hidden" name="md" value="" />
	
	{!! Form::close() !!}
	@include('footer')

	</div>	  
</div>	
<script>
$(document).ready(function(){

	$('.do-quick-search').click(function(){
		$('#SximoTable').attr('action','{{ URL::to("sbproject/multisearch")}}');
		$('#SximoTable').submit();
	});
	
});	
</script>

<?php
	function showTeam( $val = '')
	{

		$value='';
		if($val !='')
		{
			$sql = DB::table('tb_users')->whereIn('id',explode(',',$val))->get();
			foreach ($sql as $v) {
				$avatar = '<img alt="" src="http://www.gravatar.com/avatar/'.md5($v->email).'" class="img-circle tips" width="30" title="'. $v->first_name .' '.$v->last_name .'"/> ';
				$files =  './uploads/users/'.$v->avatar ;
				if($v->avatar !='' ) 	
				{
					if( file_exists($files))
					{
						$avatar = '<img src="'.asset('uploads/users').'/'.$v->avatar.'" border="0" width="30" class="img-circle tips" title="'. $v->first_name .' '.$v->last_name .'" /> ';
					} 
				} 

				$value .= $avatar;
			}		
		}

		return $value;
	}
?>		
@stop