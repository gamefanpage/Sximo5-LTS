@extends('layouts.app')

@section('content')
  <div class="page-content row">
    <!-- Page header -->
    <div class="page-header">
      <div class="page-title">
        <h3> Table Editor : {{ $row->module_name }} <small> Edit Table Setting </small></h3>
      </div>
      <ul class="breadcrumb">
        <li><a href="{{ URL::to('dashboard') }}"> Dashboard </a></li>
		<li><a href="{{ URL::to('sximo/module') }}"> Module </a></li>
        <li class="active"> Table Editor </li>
      </ul>		  
	  
    </div>

	 <div class="page-content-wrapper m-t"> 
	@include('sximo.module.tab',array('active'=>'table','type'=>$type))



@if(Session::has('message'))
       {{ Session::get('message') }}
@endif

 {!! Form::open(array('url'=>'sximo/module/savetable/'.$module_name, 'class'=>'form-horizontal')) !!}
<div class="sbox">
	<div class="sbox-title"><h5> Table Grid  </h5></div>
	<div class="sbox-content">	

	 <div class="infobox infobox-danger fade in">
	  <button type="button" class="close" data-dismiss="alert"> x </button>  
	  <p> <strong>New Feature !</strong> Type User ID's using (,) into spesific column to limit the column only viewd by them </p>	
	</div>

	 <div class="table-responsive">
			<table class="table table-striped table-bordered" id="table">
			<thead class="no-border">
			  <tr>
				<th scope="col">No</th>
				<th scope="col">Table</th>
				<th scope="col">Field</th>
				<th scope="col" width="70"><i class="fa fa-key"></i> Limit To</th>
				<th scope="col"><i class="icon-link"></i></th>
				<th scope="col" data-hide="phone">Title / Caption </th>
				<th scope="col" data-hide="phone">Show</th>
				<th scope="col" data-hide="phone">View </th>
				<th scope="col" data-hide="phone">Sortable</th>
				<th scope="col" data-hide="phone">Download</th>
				<th scope="col" data-hide="phone" style="width:70px;">Width</th>
				<th scope="col" data-hide="phone" style="width:100px;">Align</th>
				<th scope="col" data-hide="phone">Format Column </th>
			  </tr>
			 </thead> 
			<tbody class="no-border-x no-border-y">	
			<?php usort($tables, "SiteHelpers::_sort"); ?>
			  <?php $num=0; foreach($tables as $rows){
					$id = ++$num;
			  ?>
			  <tr >
				<td class="index"><?php echo $id;?></td>
				<td><?php echo $rows['alias'];?></td>
				<td ><strong><?php echo $rows['field'];?></strong>
				<input type="hidden" name="field[<?php echo $id;?>]" id="field" value="<?php echo $rows['alias'];?>" />			</td>
				<td>
					<?php
						 $limited_to = (isset($rows['limited']) ? $rows['limited'] : '');
					?>
					<input type="text" class="form-control" name="limited[<?php echo $id;?>]" class="limited" value="<?php echo $limited_to;?>" />

				</td>
				<td >
				<span  title="Lookup Display" 
					onclick="SximoModal('{{ url('sximo/module/conn/'.$row->module_id.'?field='.$rows['field'].'&alias='.$rows['alias']) }}' ,' Connect Field : {{ $rows['field']}} ' )"
					>
						<i class="fa fa-external-link"></i>
					</span>
				</td>
				<td >           
					<div class="input-group input-group-sm">
					<span class="input-group-addon xlick bg-default btn-xs " >EN</span>				
					<input name="label[<?php echo $id;?>]" type="text" class="form-control input-sm " 
					id="label" value="<?php echo $rows['label'];?>" />
					</div>


				  <?php $lang = SiteHelpers::langOption();
				  if(CNF_MULTILANG ==1) {
					foreach($lang as $l) { if($l['folder'] !='en') {
				   ?>
				   <div class="input-group input-group-sm" style="margin:1px 0 !important;">
				   <span class="input-group-addon xlick bg-default btn-sm " ><?php echo strtoupper($l['folder']);?></span>
					 <input name="language[<?php echo $id;?>][<?php echo $l['folder'];?>]" type="text" class="form-control input-sm " 
					 value="<?php echo (isset($rows['language'][$l['folder']]) ? $rows['language'][$l['folder']] : '');?>"
					 placeholder="Label for <?php echo ucwords($l['name']);?>"
					  />
					 
				  </div>
				  <?php } } }?>	
				</td>				
				<td>
				<label >
				<input name="view[<?php echo $id;?>]" type="checkbox" id="view" value="1" 
				<?php if($rows['view'] == 1) echo 'checked="checked"';?>/>
				</label>
				</td>
				<td>
				<label >
				<input name="detail[<?php echo $id;?>]" type="checkbox" id="detail" value="1" 
				<?php if($rows['detail'] == 1) echo 'checked="checked"';?>/>
				</label>
				</td>
				<td>
				<label >
				<input name="sortable[<?php echo $id;?>]" type="checkbox" id="sortable" value="1" 
				<?php if($rows['sortable'] == 1) echo 'checked="checked"';?>/>
				</label>
				</td>
				<td>
				<label >
				<input name="download[<?php echo $id;?>]" type="checkbox" id="download" value="1" 
				<?php if($rows['download'] == 1) echo 'checked="checked"';?>/>
				</label>
				</td>
				<td>
					<input type="text" class="form-control" name="width[<?php echo $id;?>]" value="<?php echo $rows['width'];?>" />
				</td>
				<td>
					<?php $aligns = array('left','center','right'); ?>
					<select class="form-control" name="align[<?php echo $id;?>]">
					<?php foreach ($aligns as $al) { ?>
						<option value="<?php echo $al;?>" <?php if(isset($rows['align']) && $rows['align'] == $al) echo 'selected';?> ><?php echo ucwords($al);?></option>
					<?php } ?>
					</select>
				</td>
				<td>

				<a style="padding-bottom:5px;" class="  btn-primary btn-xs btn tips exp-formater" title="Format Column Field" href="javascript:void(0)" rel="format-<?php echo $id;?>" ><i class="fa fa-cog"></i> Format </a>
				<div class="formater" id="format-<?php echo $id;?>" style="padding:10px;">
					<h5> Set As Image / File </h5>
					<div class="input-group m-b b-t">
						<span class="input-group-addon"> <input type="checkbox" name="attr_image_active[<?php echo $id;?>]" value="1" <?php if($rows['attribute']['image']['active']==1) echo 'checked' ;?> />  </span> 
						<input type="text" name="attr_image[<?php echo $id;?>]" class="form-control "  value="<?php echo $rows['attribute']['image']['path'];?>" placeholder="Path to file / image "/>
					</div>
					
					<h5> Set As Link </h5>
					<div class="input-group m-b b-t">
						<span class="input-group-addon"> 
							<input type="checkbox" name="attr_link_active[<?php echo $id;?>]" value="1"
							<?php if($rows['attribute']['hyperlink']['active'] == 1) echo 'checked="checked"';?>
							> 
						</span> <input type="text" class="form-control" name="attr_link[<?php echo $id;?>]" 
						placeholder="yourmodule/method/param" value="<?php if(isset($rows['attribute']['hyperlink']['link'])) echo $rows['attribute']['hyperlink']['link'];?>">	
						
					</div>	
					<div class="m-b">
						<input type="radio" name="attr_target[<?php echo $id;?>]" value="native"
						<?php if($rows['attribute']['hyperlink']['target'] == 'native') echo 'checked="checked"';?> /> Native Link 		
						<input type="radio" name="attr_target[<?php echo $id;?>]" value="modal"
						<?php if($rows['attribute']['hyperlink']['target'] == 'modal') echo 'checked="checked"';?> /> Modal Link
					</div>	 				
				<h5> Format Column </h5>
				<div class="input-group m-b">
					<span class="input-group-addon"> <input type="checkbox" name="attr_formater_active[<?php echo $id;?>]" value="1" 
					<?php if(isset($rows['attribute']['formater']['active']) && $rows['attribute']['formater']['active'] == 1) echo 'checked="checked"';?>
					/>  </span> 
					<input type="text" name="attr_formater_value[<?php echo $id;?>]" class="form-control "  placeholder="class|method|params" value="<?php if(isset($rows['attribute']['formater']['value'])) echo $rows['attribute']['formater']['value'];?>"/>
				</div>
				</div>

				
				<input type="hidden" name="frozen[<?php echo $id;?>]" value="<?php echo $rows['frozen'];?>" />
				<input type="hidden" name="search[<?php echo $id;?>]" value="<?php echo $rows['search'];?>" />
				<input type="hidden" name="hidden[<?php echo $id;?>]" value="<?php if(isset($rows['hidden'])) echo $rows['hidden'];?>" />
				
				
				<input type="hidden" name="alias[<?php echo $id;?>]" value="<?php echo $rows['alias'];?>" />
				<input type="hidden" name="field[<?php echo $id;?>]" value="<?php echo $rows['field'];?>" />
				<input type="hidden" name="sortlist[<?php echo $id;?>]" class="reorder" value="<?php echo $rows['sortlist'];?>" />
				<input type="hidden" name="attr_link_html[<?php echo $id;?>]" class="form-control input-sm"  value="" />	
				<input type="hidden" name="attr_image_width[<?php echo $id;?>]" />  
				<input type="hidden" name="attr_image_height[<?php echo $id;?>]" />
				<input type="hidden" name="attr_image_html[<?php echo $id;?>]"    />	
				<input type="hidden" name="conn_valid[<?php echo $id;?>]"   
				value="<?php if(isset($rows['conn']['valid'])) echo $rows['conn']['valid'];?>"  />
				<input type="hidden" name="conn_db[<?php echo $id;?>]"   
				value="<?php if(isset($rows['conn']['db'])) echo $rows['conn']['db'];?>"  />	
				<input type="hidden" name="conn_key[<?php echo $id;?>]"  
				value="<?php if(isset($rows['conn']['key'])) echo  $rows['conn']['key'];?>"   />
				<input type="hidden" name="conn_display[<?php echo $id;?>]" 
				value="<?php if(isset($rows['conn']['display'])) echo   $rows['conn']['display'];?>"    />			 
				
				</td>
				
			  </tr>
			  <?php } ?>
			  </tbody>
			</table>
			</div>
	 <div class="infobox infobox-info fade in">
	  <button type="button" class="close" data-dismiss="alert"> x </button>  
	  <p> <strong>Tips !</strong> Drag and drop rows to re ordering lists </p>	
	</div>	
					
			<button type="submit" class="btn btn-primary"> Save Changes </button>
			<input type="hidden" name="module_id" value="{{ $row->module_id }}" />
	{!! Form::close() !!}
		
	</div>	
</div></div>
<script>
$(document).ready(function() {


	var fixHelperModified = function(e, tr) {
		var $originals = tr.children();
		var $helper = tr.clone();
		$helper.children().each(function(index) {
			$(this).width($originals.eq(index).width())
		});
		return $helper;
		},
		updateIndex = function(e, ui) {
			$('td.index', ui.item.parent()).each(function (i) {
				$(this).html(i + 1);
			});
			$('.reorder', ui.item.parent()).each(function (i) {
				$(this).val(i + 1);
			});			
		};
		
	$("#table tbody").sortable({
		helper: fixHelperModified,
		stop: updateIndex
	});		

	$('.exp-formater').click(function(){
		$('.formater').hide();
		val = $(this).attr('rel');

		$('#'+val).slideToggle();
	});		
});
</script>
<style>
	.xlick { cursor:pointer;}
	.popover { width:600px;}
	.formater { display: none;}
</style>

@stop