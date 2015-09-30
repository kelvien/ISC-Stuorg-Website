
$(document).ready(function(){
	
	$(window).load(function() {
		/*SUBMIT SPONSOR FORM*/
		$("form#contact-sponsor_form").on("submit", function(e){
		  	e.preventDefault();
		  	var button = $(this).find("button");
		  	button.button("loading");
		  	var data = {
		  				type: $("input[name='sponsor-type']").val(),
				   		name: $("input[name='sponsor-name']").val(),
				   		email: $("input[name='sponsor-email']").val(),
				   		text: $("textarea[name='sponsor-content']").val(),
				   	};
		  	$.ajax({
		        type     : "POST",
		        url      : "include/contact.php",
		        data	 : data,
		        success  : function(data) {
		            if(data == "success"){
		            	$("#response-sponsor").removeClass("error_text");
		            	$("#response-sponsor").addClass("success_text");
		            	$("#response-sponsor").html("<span class='fa fa-check'></span> Sent! We will get back to you as soon as possible.");
		            	$("form#contact-sponsor_form").hide();
		            }
		            else{
		            	button.button("reset");
		            	$("#response-sponsor").removeClass("success_text");
		            	$("#response-sponsor").addClass("error_text");
		            	$("#response-sponsor").html("<span class='fa fa-exclamation-circle'></span> Please fill in all information and try again");
		            }
		        }
		    });
		  });

		/*SUBMIT CONTACT FORM*/
		$("form#contact-contact_form").on("submit", function(e){
		  	e.preventDefault();
		  	var button = $(this).find("button");
		  	button.button("loading");
		  	var data = {
		  				type: $("input[name='contact-type']").val(),
				   		name: $("input[name='contact-name']").val(),
				   		email: $("input[name='contact-email']").val(),
				   		text: $("textarea[name='contact-content']").val(),
				   	};
		  	$.ajax({
		        type     : "POST",
		        url      : "include/contact.php",
		        data	 : data,
		        success  : function(data) {
		            if(data == "success"){
		            	$("#response-contact_simple").removeClass("error_text");
		            	$("#response-contact_simple").addClass("success_text");
		            	$("#response-contact_simple").html("<span class='fa fa-check'></span> Sent! We will get back to you as soon as possible.");
		            	$("form#contact-contact_form").hide();
		            }
		            else{
		            	button.button("reset");
		            	$("#response-contact_simple").removeClass("success_text");
		            	$("#response-contact_simple").addClass("error_text");
		            	$("#response-contact_simple").html("<span class='fa fa-exclamation-circle'></span> Please fill in all information and try again");
		            }
		        }
		    });
		  });
	});
	
});