 {!! Form::open(array('url'=>'blog/categoriessave?return='.$return, 'class'=>'form-vertical','files' => true , 'parsley-validate'=>'','novalidate'=>' ')) !!}
{!! Form::hidden('CatID',$row['CatID']) !!}
<div class="form-group hidethis " >
	<label for="ipt" class=" control-label "> Category Name    </label>									
  {!! Form::text('name',$row['name'],array('class'=>'form-control', 'placeholder'=>'',   )) !!} 						
</div> 

<div class="form-group hidethis " >
	<label for="ipt" class=" control-label ">     </label>									
  	<button class="btn btn-primary"> Save Category</button>						
</div> 

 {!! Form::close() !!}