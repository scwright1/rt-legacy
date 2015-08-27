$(document).ready(function() {

    $('#init-popup').dialog({
        resizable: false,
        height: 400,
        width: 500,
        autoOpen: false,
        modal: true,
        zIndex: 102,
        Cancel: function() {
			$( this ).dialog( "close" );
		}
    });
    
    $('#signup').dialog({
    	resizable: false,
    	height: 500,
    	width: 500,
    	autoOpen: false,
    	modal: true,
        zIndex: 102,
    	Cancel: function() {
    		$(this).dialog("close");
    	}
    });
    
    //does the pre-install check	
    $.post("php/check_first_run.php", function(data){
        if(data == 'true') {
            $('#init-popup').dialog("open");
        }
    });

    $("#signupForm").validate();


});
