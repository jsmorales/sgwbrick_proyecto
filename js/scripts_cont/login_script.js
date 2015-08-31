$(function(){    

    $("#btn_login").click(function(event) {
    	/* Act on the event */
    	console.log('hace login');
    	$.ajax({
    		url: '../controller/login_autentica.php',    		
    		data: ,
    	})
    	.done(function() {
    		console.log("success");
    	})
    	.fail(function() {
    		console.log("error");
    	})
    	.always(function() {
    		console.log("complete");
    	});
    	
    });
});