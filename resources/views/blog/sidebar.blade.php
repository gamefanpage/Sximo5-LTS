	<div class="block-widget">	
		<h3 >Categories 
      @if($access['is_add'] ==1)
        <a href="{{ URL::to('blog/categories') }}" class="tips btn btn-xs btn-white text-success"  title="{{ Lang::get('core.btn_create') }}">
      <i class="fa fa-edit "></i>&nbsp; Edit</a>
      @endif  
		</h3>	
	
			<ul class="nav nav-stacked nav-pills"> 
			@foreach($blogcategories as $cat)
				<li> <a class="dk" href="{{ URL::to('blog?category='.$cat->alias)}}"> {{ $cat->name}} &nbsp; <span class="label label-success pull-right">{{ $cat->total}}</span> </a> </li>  
			@endforeach	
			</ul>
	</div>


	
