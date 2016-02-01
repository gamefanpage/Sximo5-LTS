{!! Form::open(array('url'=>'sximoforum/savepost', 'class'=>'form-vertical','files' => true , 'parsley-validate'=>'','novalidate'=>' ' ,'id'=>'formpost'
)) !!}

<div class="form-group  ">
	<label for="Topic" class=" control-label text-left"> Title </label>
	{!! Form::text('Title', null ,array('class'=>'form-control', 'placeholder'=>' ','required'=>'true'   )) !!}

</div>

<div class="form-group  ">
	<div for="Topic" class=" control-label text-left"> Post Content</div>
	<textarea class="form-control markItUp" rows="10" name="Content" requried="true"></textarea>

</div>

<div class="form-group  ">
	<button class="btn btn-primary"> Submit</button>
	<input type="hidden" name="CategoryID" value="{{ $CategoryID }}">
</div>


<input type="hidden" name="CategoryID" value="{{ $CategoryID }}">
{!! Form::close() !!}

<link href="{{ asset('sximo/js/plugins/markitup/sets/bbcode/style.css') }}" rel="stylesheet">
<script type="text/javascript" src="{{ asset('sximo/js/plugins/markitup/sets/bbcode/set.js') }}"></script>
<script language="javascript">
	jQuery(document).ready(function ($) {
		$('.markItUp').markItUp(mySettings);
		$('#formpost').parsley();
	});
</script>