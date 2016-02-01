{!! Form::open(array('url'=>'sximoforum/savetopic', 'class'=>'form-vertical','files' => true , 'parsley-validate'=>'','novalidate'=>' ')) !!}

<div class="form-group  ">
	<label for="Topic" class=" control-label col-md-4 text-left"> Topic Name </label>
	{!! Form::text('Name', null ,array('class'=>'form-control', 'placeholder'=>' Topic Name',   )) !!}

</div>

<div class="form-group  ">
	<label for="Note" class=" control-label col-md-4 text-left"> Short Description </label>
	{!! Form::text('Note', null ,array('class'=>'form-control', 'placeholder'=>' ',   )) !!}

</div>

<div class="form-group  ">
	<label for="Note" class=" control-label col-md-4 text-left"> Ordering </label> <br/>
	{!! Form::text('Ordering', null ,array('class'=>'form-control', 'placeholder'=>'  '  )) !!}

</div>

<br/>
<button class="btn btn-primary"> Submit</button>

<input type="hidden" name="ForumID" value="{{ $ForumID }}">
{!! Form::close() !!}