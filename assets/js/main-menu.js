

	document.getElementById("logout").onclick = function () { 
		// alert(base_url);
		window.location = base_url + "users/logout";
	}
	$(document).ready(function(){
		$("button.playpausebtn").click(function() {
			if(jQuery('#playpausebtn').hasClass('paused')){
			    $("button").removeClass("paused");
			}
			else
			{
			    $(this).addClass("paused");
			}
		   });
		$(function() {
		   $("div.main-menu ul li button").click(function() {
		      $(".changing > div:first-child").removeClass("col-xs-offset-4 col-sm-offset-4 col-md-offset-4 col-lg-offset-4 col-xs-4 col-sm-4 col-md-4 col-lg-4");
		      $(".changing > div:first-child").addClass("col-xs-4 col-sm-4 col-md-3 col-lg-3");
		      $("button").removeClass("active");
		      $(this).addClass("active");
		   });
		   $("div.main-menu ul li button#play").click(function() {
		    $('div#play').css({
		   		'display':'block',
		   		'transition':'5s'
		    });
		    $('div#profile').css({
		   		'display':'none',
		   		'transition':'5s'
		    });
		    $('div#leaderboard').css({
		   		'display':'none',
		   		'transition':'5s'
		    });
		    $('div#badges').css({
		   		'display':'none',
		   		'transition':'5s'
		    });
		   });


		   $("div.main-menu ul li button#profile").click(function() {
		    $('div#play').css({
		   		'display':'none',
		   		'transition':'5s'
		    });
		    $('div#profile').css({
		   		'display':'block',
		   		'transition':'5s'
		    });
		    $('div#leaderboard').css({
		   		'display':'none',
		   		'transition':'5s'
		    });
		    $('div#badges').css({
		   		'display':'none',
		   		'transition':'5s'
		    });
		   });


		   $("div.main-menu ul li button#leaderboard").click(function() {
		    $('div#play').css({
		   		'display':'none',
		   		'transition':'5s'
		    });
		    $('div#profile').css({
		   		'display':'none',
		   		'transition':'5s'
		    });
		    $('div#leaderboard').css({
		   		'display':'block',
		   		'transition':'5s'
		    });
		    $('div#badges').css({
		   		'display':'none',
		   		'transition':'5s'
		    });
		   });


		   $("div.main-menu ul li button#badges").click(function() {
		    $('div#play').css({
		   		'display':'none',
		   		'transition':'5s'
		    });
		    $('div#profile').css({
		   		'display':'none',
		   		'transition':'5s'
		    });
		    $('div#leaderboard').css({
		   		'display':'none',
		   		'transition':'5s'
		    });
		    $('div#badges').css({
		   		'display':'block',
		   		'transition':'5s'
		    });
		   });
		});

	    $('#data-achievements').DataTable( {
	        "pagingType": "first_last_numbers",
	        "pageLength": 5
	    } ); 
	    $('#data-leaderboard').DataTable( {
	        "pagingType": "first_last_numbers",
	        "pageLength": 5
	    } );
	});


