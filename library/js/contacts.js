$(document).ready(function(){
	
	$(window).load(function() {
	
		var ga_owl = $("#ga_carousel");	 
		  ga_owl.owlCarousel({
		      navigation : true,
		      autoPlay: true,
		      stopOnHover: true
		  });

		  var executive_owl = $("#executive_carousel");	 
		  executive_owl.owlCarousel({
		      autoPlay: true,
		      stopOnHover: true,
		      items: 4
		  });

		  var humanitarian_owl = $("#humanitarian_carousel");	 
		  humanitarian_owl.owlCarousel({
		      autoPlay: true,
		      stopOnHover: true,
		      items: 4
		  });

		  var finance_owl = $("#finance_carousel");	 
		  finance_owl.owlCarousel({
		      autoPlay: true,
		      stopOnHover: true,
		      items: 3
		  });

		  var event_owl = $("#event_carousel");	 
		  event_owl.owlCarousel({
		      autoPlay: true,
		      stopOnHover: true,
		      items: 4
		  });

		  var volunteer_owl = $("#volunteer_carousel");	 
		  volunteer_owl.owlCarousel({
		      autoPlay: true,
		      stopOnHover: true,
		      items: 3
		  });

		  var publicity_owl = $("#publicity_carousel");	 
		  publicity_owl.owlCarousel({
		      autoPlay: true,
		      stopOnHover: true,
		      items: 4
		  });

		  var aiso_owl = $("#aiso_carousel");	 
		  aiso_owl.owlCarousel({
		      autoPlay: true,
		      stopOnHover: true,
		      items: 4
		  });
	});	
});