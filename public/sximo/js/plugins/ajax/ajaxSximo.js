/* CSS Document */

function reloadData( id,url   )
{
	$('.ajaxLoading').show();
	$.post( url ,function( data ) {
		$( id +'Grid' ).html( data );
		$('.ajaxLoading').hide();
	});

}


function ajaxDoSearch( id ,url )
{
	var attr = '';
	$( id +'Search :input').each(function() {
		if(this.value !=='') { attr += this.name+':'+this.value+'|'; }
	});
	reloadData( id ,url+'&search='+attr);
}


function ajaxQuickAdd(id, url )
{

	var attr = '';
	var datas = $( id +'Search :input').serialize();
	$.post( url+'/quicksave' ,datas, function( data ) {
		if(data.status =='success')
		{
			ajaxFilter( id , url+'/data' );
			$( ".resultData" ).html( data.message );
		} else {
			$( ".resultData" ).html( data.message );
		}			
	});

	
}

function ajaxInlineRemove(id,url)
{

		if(confirm('are u sure remove selected row?'))
		{
			$.get(url, function( data ) {
				$(id).remove();
			});
			
		}
		return false;
}
function ajaxInlineSave(id,url,reloadurl)
{

	var datas = $( id +'Form :input').serialize();
	$.post( url ,datas, function( data ) {
		$('.ajaxLoading').show();
		$.post( reloadurl ,function( data ) {
			$( id+'Grid' ).html( data );
			$('.ajaxLoading').hide();
		});							
	});
}	

function ajaxInlineEdit(id,url,reloadurl)
{
	$(id +' span').each(function() {
		val = $(this).html();
		val = val.split(':');
		$('input[name='+val[0]+']').val(val[1]);
	});
}


function ajaxFilter( id ,url )
{
	var attr = '';
	$( id +'Filter :input').each(function() {
		if(this.value !='') { attr += this.name+'='+this.value+'&'; }
	});	

	reloadData(id, url+"?"+attr);
}



function ajaxCopy(  id , url )
{
	
	if(confirm('Areu sure Copy selected row(s)'))
	{
		var datas = $( id +'Table :input').serialize();
			$.post( url+'/copy' ,datas,function( data ) {
				if(data.status =='success')
				{
					notyMessage(data.message );
					ajaxFilter( id ,url+'/data' );
				} else {
					notyMessage(data.message );
				}				
			});			
	} else {
		return false;
	}
	

}

function ajaxRemove( id, url )
{
	var datas = $( id +'Table :input').serialize();
	if(confirm('Are u sure deleting selected row(s)?')) {
		$.post( url+'/delete' ,datas,function( data ) {
			if(data.status =='success')
			{
				notyMessage(data.message);	
				ajaxFilter( id ,url+'/data' );
			} else {
				notyMessageError(data.message);	
			}				
		});	
		
	}	
}

function ajaxViewDetail( id , url )
{
	$('.ajaxLoading').show();
	$.get( url ,function( data ) {
		$( id +'View').html( data );
		$( id +'Grid').hide( );
		var w = $(window); 
		var duration = 300;
		$('html, body').animate({scrollTop: 0}, duration);
		$('.ajaxLoading').hide();
	});		
		
}

function ajaxViewClose( id )
{
	$( id +'View' ).html('');	
	$( id +'Grid' ).show();	
	$('#sximo-modal').modal('hide');
}

var newwindow;
function ajaxPopupStatic(url ,w , h)
{
	var w = (w == '' ? w : 800 );	
	var h = (h == '' ? wh: 600 );	
	newwindow=window.open(url,'name','height='+w+',width='+h+',resizable=yes,toolbar=no,scrollbars=yes,location=no');
	if (window.focus) {newwindow.focus()}
}

function notyMessage(message)
{

	toastr.success("success", message);
	toastr.options = {
		  "closeButton": true,
		  "debug": false,
		  "positionClass": "toast-bottom-right",
		  "onclick": null,
		  "showDuration": "300",
		  "hideDuration": "1000",
		  "timeOut": "5000",
		  "extendedTimeOut": "1000",
		  "showEasing": "swing",
		  "hideEasing": "linear",
		  "showMethod": "fadeIn",
		  "hideMethod": "fadeOut"

	}	
	
}
function notyMessageError(message)
{
	
	toastr.error("error", message);
	toastr.options = {
		  "closeButton": true,
		  "debug": false,
		  "positionClass": "toast-bottom-right",
		  "onclick": null,
		  "showDuration": "300",
		  "hideDuration": "1000",
		  "timeOut": "5000",
		  "extendedTimeOut": "1000",
		  "showEasing": "swing",
		  "hideEasing": "linear",
		  "showMethod": "fadeIn",
		  "hideMethod": "fadeOut"

	}	
	
}

function notyConfirm(id, url)
{
	
	var n = noty({				
		text: 'Are u sure deleting selected row(s)?',
		type: 'Confirm',
		timeout : 50,
		layout: 'topCenter',
		
		buttons: [
			{addClass: 'btn btn-primary btn-sm', text: 'Ok', onClick: function($noty) {	
					var datas = $( id +'Table :input').serialize();
					$.post( url+'/destroy' ,datas,function( data ) {
						if(data.status =='success')
						{
							notyMessage(data.message );
							ajaxFilter( id ,url+'/data' );
						} else {
							notyMessage(data.message );
						}				
					});	
					$noty.close();
				}
			},
			{addClass: 'btn btn-danger btn-sm', text: 'Cancel', onClick: function($noty) {
					$noty.close();
					//noty({text: 'You clicked "Cancel" button', type: 'error'});
				}
			}
		]
	});		
	
}

function addMoreFiles(id){

   $("."+id+"Upl").append('<input type="file" name="'+id+'[]" />')
}

function SximoModalLarge( url , title)
{
	$('#sximo-modal-lg #sximo-modal-content').html(' ....Loading content , please wait ...');
	$('#sximo-modal-lg  .modal-title').html(title);
	$('#sximo-modal-lg  #sximo-modal-content').load(url,function(){
	});
	$('#sximo-modal-lg').modal('show');	
}