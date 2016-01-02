$('.expandable').click(function(){

		var id = $(this).attr('rel');
		selector =  id +" .data";
		if($(selector).is(':empty'))
		{

			$(selector).html('<p class="text-center"> Loading Content ....</p>');
			$(id).show();
			$(this).removeClass('expandable'); $(this).addClass('collapseable'); 
			var url = $(this).attr('data-url');
			//$('.expanded').hide();
			$.get( url , function(data){
				$(selector).html(data);			
				
			})
			$(this).html('<i class="fa fa-minus"></i>');
			$(this).addClass('open');
		} else {
			if($(this).hasClass('open'))
			{
				$(this).html('<i class="fa fa-plus"></i>');
				$(this).removeClass('open');
				$(id).hide();
			} else {
				$(this).html('<i class="fa fa-minus"></i>');
				$(this).addClass('open');

				$(id).show();
			}
			
		}	
	});
