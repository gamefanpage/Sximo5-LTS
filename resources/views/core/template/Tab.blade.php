  <ul class="nav nav-tabs" style="margin-bottom:10px;">
    <li @if($active == 'general') class="active" @endif ><a href="{{ URL::to('core/template')}}"> General </a></li>
	<li @if($active == 'grid') class="active" @endif ><a href="{{ URL::to('core/template?show=grid')}}"> Grid </a></li>
    <li @if($active == 'typography') class="active" @endif ><a href="{{ URL::to('core/template?show=typography')}}"> Typography </a></li>
    <li @if($active == 'buttons') class="active" @endif ><a href="{{ URL::to('core/template?show=button')}}">Buttons</a></li>
    <li @if($active == 'panel') class="active" @endif ><a href="{{ URL::to('core/template?show=panel')}}">Tabs & Panel </a></li>
    <li @if($active == 'forms') class="active" @endif ><a href="{{ URL::to('core/template?show=forms')}}">Forms </a></li>
    <li @if($active == 'tables') class="active" @endif ><a href="{{ URL::to('core/template?show=tables')}}">Tables </a></li>
    <li @if($active == 'icons') class="active" @endif ><a href="{{ URL::to('core/template?show=icons')}}">Icons </a></li>
	<li @if($active == 'icon-moon') class="active" @endif ><a href="{{ URL::to('core/template?show=icon-moon')}}">Icons Moon </a></li>
  </ul> 