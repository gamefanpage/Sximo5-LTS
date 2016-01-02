
@if($setting['form-method'] =='native')
	<div class="sbox">
		<div class="sbox-title">  
			<h4> <i class="fa fa-table"></i> <?php echo $pageTitle ;?> <small>{{ $pageNote }}</small>
				<a href="javascript:void(0)" class="collapse-close pull-right btn btn-xs btn-danger" onclick="ajaxViewClose('#{{ $pageModule }}')"><i class="fa fa fa-times"></i></a>
			</h4>
	</div>

	<div class="sbox-content"> 
@endif	
			{!! Form::open(array('url'=>'pages/save/'.SiteHelpers::encryptID($row['pageID']), 'class'=>'form-horizontal','files' => true , 'parsley-validate'=>'','novalidate'=>' ','id'=> 'pagesFormAjax')) !!}
			<div class="col-md-12">
						<fieldset><legend> Pages CMS Management</legend>
									
				  <div class="form-group hidethis " style="display:none;"> 
					<label for="PageID" class=" control-label col-md-4 text-left"> 
					{!! SiteHelpers::activeLang('PageID', (isset($fields['pageID']['language'])? $fields['pageID']['language'] : array())) !!}	
					</label>
					<div class="col-md-6">
					  {!! Form::text('pageID', $row['pageID'],array('class'=>'form-control', 'placeholder'=>'',   )) !!} 
					 </div> 
					 <div class="col-md-2">
					 	
					 </div>
				  </div> 					
				  <div class="form-group  " > 
					<label for="Title" class=" control-label col-md-4 text-left"> 
					{!! SiteHelpers::activeLang('Title', (isset($fields['title']['language'])? $fields['title']['language'] : array())) !!}	
					</label>
					<div class="col-md-6">
					  {!! Form::text('title', $row['title'],array('class'=>'form-control', 'placeholder'=>'', 'required'=>'true'  )) !!} 
					 </div> 
					 <div class="col-md-2">
					 	
					 </div>
				  </div> 					
				  <div class="form-group  " > 
					<label for="Alias" class=" control-label col-md-4 text-left"> 
					{!! SiteHelpers::activeLang('Alias', (isset($fields['alias']['language'])? $fields['alias']['language'] : array())) !!}	
					</label>
					<div class="col-md-6">
					  {!! Form::text('alias', $row['alias'],array('class'=>'form-control', 'placeholder'=>'',   )) !!} 
					 </div> 
					 <div class="col-md-2">
					 	
					 </div>
				  </div> 					
				  <div class="form-group hidethis " style="display:none;"> 
					<label for="Created" class=" control-label col-md-4 text-left"> 
					{!! SiteHelpers::activeLang('Created', (isset($fields['created']['language'])? $fields['created']['language'] : array())) !!}	
					</label>
					<div class="col-md-6">
					  {!! Form::text('created', $row['created'],array('class'=>'form-control', 'placeholder'=>'',   )) !!} 
					 </div> 
					 <div class="col-md-2">
					 	
					 </div>
				  </div> 					
				  <div class="form-group hidethis " style="display:none;"> 
					<label for="Updated" class=" control-label col-md-4 text-left"> 
					{!! SiteHelpers::activeLang('Updated', (isset($fields['updated']['language'])? $fields['updated']['language'] : array())) !!}	
					</label>
					<div class="col-md-6">
					  {!! Form::text('updated', $row['updated'],array('class'=>'form-control', 'placeholder'=>'',   )) !!} 
					 </div> 
					 <div class="col-md-2">
					 	
					 </div>
				  </div> 					
				  <div class="form-group  " > 
					<label for="Filename" class=" control-label col-md-4 text-left"> 
					{!! SiteHelpers::activeLang('Filename', (isset($fields['filename']['language'])? $fields['filename']['language'] : array())) !!}	
					</label>
					<div class="col-md-6">
					  {!! Form::text('filename', $row['filename'],array('class'=>'form-control', 'placeholder'=>'',   )) !!} 
					 </div> 
					 <div class="col-md-2">
					 	
					 </div>
				  </div> 					
				  <div class="form-group  " > 
					<label for="Status" class=" control-label col-md-4 text-left"> 
					{!! SiteHelpers::activeLang('Status', (isset($fields['status']['language'])? $fields['status']['language'] : array())) !!}	
					</label>
					<div class="col-md-6">
					  {!! Form::text('status', $row['status'],array('class'=>'form-control', 'placeholder'=>'', 'required'=>'true'  )) !!} 
					 </div> 
					 <div class="col-md-2">
					 	
					 </div>
				  </div> 					
				  <div class="form-group  " > 
					<label for="Access" class=" control-label col-md-4 text-left"> 
					{!! SiteHelpers::activeLang('Access', (isset($fields['access']['language'])? $fields['access']['language'] : array())) !!}	
					</label>
					<div class="col-md-6">
					  <textarea name='access' rows='5' id='access' class='form-control '  
				         required  >{{ $row['access'] }}</textarea> 
					 </div> 
					 <div class="col-md-2">
					 	
					 </div>
				  </div> 					
				  <div class="form-group  " > 
					<label for="Allow Guest" class=" control-label col-md-4 text-left"> 
					{!! SiteHelpers::activeLang('Allow Guest', (isset($fields['allow_guest']['language'])? $fields['allow_guest']['language'] : array())) !!}	
					</label>
					<div class="col-md-6">
					  <textarea name='allow_guest' rows='5' id='allow_guest' class='form-control '  
				           >{{ $row['allow_guest'] }}</textarea> 
					 </div> 
					 <div class="col-md-2">
					 	
					 </div>
				  </div> 					
				  <div class="form-group  " > 
					<label for="Template" class=" control-label col-md-4 text-left"> 
					{!! SiteHelpers::activeLang('Template', (isset($fields['template']['language'])? $fields['template']['language'] : array())) !!}	
					</label>
					<div class="col-md-6">
					  <textarea name='template' rows='5' id='template' class='form-control '  
				           >{{ $row['template'] }}</textarea> 
					 </div> 
					 <div class="col-md-2">
					 	
					 </div>
				  </div> 					
				  <div class="form-group  " > 
					<label for="Metakey" class=" control-label col-md-4 text-left"> 
					{!! SiteHelpers::activeLang('Metakey', (isset($fields['metakey']['language'])? $fields['metakey']['language'] : array())) !!}	
					</label>
					<div class="col-md-6">
					  <textarea name='metakey' rows='5' id='metakey' class='form-control '  
				           >{{ $row['metakey'] }}</textarea> 
					 </div> 
					 <div class="col-md-2">
					 	
					 </div>
				  </div> 					
				  <div class="form-group  " > 
					<label for="Metadesc" class=" control-label col-md-4 text-left"> 
					{!! SiteHelpers::activeLang('Metadesc', (isset($fields['metadesc']['language'])? $fields['metadesc']['language'] : array())) !!}	
					</label>
					<div class="col-md-6">
					  <textarea name='metadesc' rows='5' id='metadesc' class='form-control '  
				           >{{ $row['metadesc'] }}</textarea> 
					 </div> 
					 <div class="col-md-2">
					 	
					 </div>
				  </div> </fieldset>
			</div>
			
												
								
						
			<div style="clear:both"></div>	
							
			<div class="form-group">
				<label class="col-sm-4 text-right">&nbsp;</label>
				<div class="col-sm-8">	
					<button type="submit" class="btn btn-primary btn-sm "><i class="fa  fa-save "></i>  {{ Lang::get('core.sb_save') }} </button>
					<button type="button" onclick="ajaxViewClose('#{{ $pageModule }}')" class="btn btn-success btn-sm"><i class="fa  fa-arrow-circle-left "></i>  {{ Lang::get('core.sb_cancel') }} </button>
				</div>			
			</div> 		 
			{!! Form::close() !!}


@if($setting['form-method'] =='native')
	</div>	
</div>	
@endif	

	
</div>	
			 
<script type="text/javascript">
$(document).ready(function() { 
	 
	
	$('.editor').summernote();
	$('.previewImage').fancybox();	
	$('.tips').tooltip();	
	$(".select2").select2({ width:"98%"});	
	$('.date').datepicker({format:'yyyy-mm-dd',autoClose:true})
	$('.datetime').datetimepicker({format: 'yyyy-mm-dd hh:ii:ss'}); 
	$('input[type="checkbox"],input[type="radio"]').iCheck({
		checkboxClass: 'icheckbox_square-green',
		radioClass: 'iradio_square-green',
	});			
	$('.removeCurrentFiles').on('click',function(){
		var removeUrl = $(this).attr('href');
		$.get(removeUrl,function(response){});
		$(this).parent('div').empty();	
		return false;
	});			
	var form = $('#pagesFormAjax'); 
	form.parsley();
	form.submit(function(){
		
		if(form.parsley('isValid') == true){			
			var options = { 
				dataType:      'json', 
				beforeSubmit :  showRequest,
				success:       showResponse  
			}  
			$(this).ajaxSubmit(options); 
			return false;
						
		} else {
			return false;
		}		
	
	});

});

function showRequest()
{
	$('.ajaxLoading').show();		
}  
function showResponse(data)  {		
	
	if(data.status == 'success')
	{
		ajaxViewClose('#{{ $pageModule }}');
		ajaxFilter('#{{ $pageModule }}','{{ $pageUrl }}/data');
		notyMessage(data.message);	
		$('#sximo-modal').modal('hide');	
	} else {
		notyMessageError(data.message);	
		$('.ajaxLoading').hide();
		return false;
	}	
}			 

</script>		 