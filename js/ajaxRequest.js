var changed = false;

$("#raw").keyup( function() {changed=true;} );

successFct = function(data, textStatus) {
	$("#encoded").html(data);
};

ajaxCall = function() {
	if(changed)
		jQuery.ajax(
			{
			url : ajaxUrl,
			dataType : "html",
			type : "POST",
			data : 'raw='+$("#raw").val(),
			success : successFct,
			error : function() {console.log('ajaxError')}
			}
		) 
	changed = false;
	};

window.setInterval(ajaxCall , refreshInterval);
