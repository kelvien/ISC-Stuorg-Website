
		$(".flex-control-nav li").click(function(){
			var videos = document.getElementsByClassName('testimony-ytplayer');
			 for (var i = 0; i < videos.length; i++) {
			 	if(videos[i].data == YT.PlayerState.PLAYING){
			    	videos[i].stopVideo();
				}
			}
		});

		/*YTPlayer creates script*/
		var tag = document.createElement('script');
		tag.src = "https://www.youtube.com/iframe_api";
		var firstScriptTag = document.getElementsByTagName('script')[0];
		firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

		//$("#about_us").hide();

$(".nav-tabs li").on("click", function(){
	$(".nav-tabs li").removeClass("active");
	$(this).addClass("active");
});

function newsShowAll(){
	$("#posts_part .bs-callout").show();
}

function newsShowEvents(){
	$("#posts_part .bs-callout").hide();
	$("#posts_part .bs-callout-danger").show();
}

function newsShowFundraising(){
	$("#posts_part .bs-callout").hide();
	$("#posts_part .bs-callout-warning").show();
}

function newsShowNews(){
	$("#posts_part .bs-callout").hide();
	$("#posts_part .bs-callout-info").show();
}

		/*Initializing YTPlayer for testimony*/
var ytplayers = [];
var playerInfoList = [{id:'rose-ytplayer',videoId:'bXs22wXXdvQ'},{id:'steve-ytplayer',videoId:'kI6VC8mfVDM'},{id:'marsilia-ytplayer',videoId:'nrYlE9MXJ7o'},{id:'ryan-ytplayer',videoId:'IjBIeY--tBU'}];

/*{id:'adli-ytplayer',videoId:'_JjyEo1EYOo'}, {id:'ras-ytplayer',videoId:'zuJOpkRicF4'}, {id:'rashid-ytplayer',videoId:'XNJ__WO5aYk'}, {id:'zenia-ytplayer',videoId:'nwv1xaqJ_CU'}*/

function onYouTubeIframeAPIReady() {
	if(typeof playerInfoList === 'undefined')
	   return; 

	for(var i = 0; i < playerInfoList.length;i++) {
	  var curplayer = createPlayer(playerInfoList[i]);
	  ytplayers[i] = curplayer;
	}   

	/*Testimony*/
	$('#testimony-slider').flexslider({
		animation: "fade",
		directionNav: false,
		controlNav: true,
		slideshowSpeed: 4000,
		touch: false,
		after: function(slider){
			for(var i = 0; i < ytplayers.length;i++) {
				ytplayers[i].pauseVideo();
			}
			if (!slider.playing) {
	            slider.play();
	        }
		}
	});

	$('#explore-button, #about_us_button').on("click", function(){
		$("#about_us").show();
		$("html, body").animate({ scrollTop: $("#what_is_isc").offset().top }, 2000);
	});
}

function createPlayer(playerInfo) {
  return new YT.Player(playerInfo.id, {
    videoId: playerInfo.videoId,
    events: {
     'onStateChange': onPlayerStateChange
 	}
  });
}

function onPlayerStateChange(event){
	if (event.data == YT.PlayerState.PLAYING) {
        $("#testimony-slider").flexslider("pause");
    }
    else if (event.data == YT.PlayerState.ENDED) {
        $("#testimony-slider").flexslider("play");
    }
}