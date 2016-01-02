<div class="ajaxLoading"></div>
<div id="{{ $class }}View"></div>			
<div id="{{ $class }}Grid"></div>
		
<script>
$(document).ready(function(){
		$.post( '{{ URL::to("$class/data?md=") }}' ,function( data ) {
		$( '#{{ $class }}Grid' ).html( data );	
		$('.ajaxLoading').hide();
			
	});
});	
</script>	