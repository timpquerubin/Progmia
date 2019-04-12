

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
			

$('.play .multiple-items').slick({
  infinite: false,
  slidesToShow: 3,
  dots: true,
  infinite: false,
  slidesToScroll: 1,
    responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1,
  infinite: false,
        dots: true
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 1,
  infinite: false,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
  infinite: false,
        slidesToScroll: 1
      }
    }
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ]
});
$('.badges .badges-all .multiple-items').slick({
  infinite: false,
  slidesToShow: 1,
  dots: true
});

$('.badges .badges-acquired .multiple-items').slick({
  infinite: false,
  slidesToShow: 1,
  dots: true
});		
		   $(document).on('click', "div.main-menu ul li button#play, div.main-menu ul li button#badges,#acquired-option,#all-option", function() {
			    $(window).trigger("resize");
                $('.play .multiple-items').slick('setPosition');
                $('.badges .badges-all .multiple-items').slick('setPosition');
                $('.badges .badges-acquired .multiple-items').slick('setPosition');
			});	


			$("#all-option").click(function() {
				$("#badges-acquired").css("display", "none");
				$("#badges-all").css("display", "block");
			});

			$("#acquired-option").click(function() {
				$("#badges-all").css("display", "none");
				$("#badges-acquired").css("display", "block");
			});
		   $("div.main-menu ul li button").click(function() {
		      $(".changing > div:first-child").removeClass("col-xs-offset-4 col-sm-offset-4 col-md-offset-4 col-lg-offset-4 col-xs-4 col-sm-4 col-md-4 col-lg-4");
		      $(".changing > div:first-child").addClass("col-xs-4 col-sm-4 col-md-3 col-lg-3");
		      $("button").removeClass("active");
		      $(this).addClass("active");
		   });
		   $("div.main-menu ul li button#play").click(function() {
		    $('div#profile').css({
		   		'display':'none'
		    });
		    $('div#progress-tab').css({
		   		'display':'none'
		    });
		    $('div#leaderboard').css({
		   		'display':'none'
		    });
		    $('div#badges').css({
		   		'display':'none'
		    });
		    $('div#play').css({
		   		'display':'block'
		    });
		   });


		   $("div.main-menu ul li button#profile").click(function() {
		   	$("#all-option").trigger("click");
		    $('div#play').css({
		   		'display':'none'
		    });
		    $('div#profile').css({
		   		'display':'block'
		    });
		    $('div#progress-tab').css({
		   		'display':'none'
		    });
		    $('div#leaderboard').css({
		   		'display':'none'
		    });
		    $('div#badges').css({
		   		'display':'none'
		    });
		   });



		   $("div.main-menu ul li button#progress-tab").click(function() {
		    $('div#play').css({
		   		'display':'none'
		    });
		    $('div#profile').css({
		   		'display':'none'
		    });
		    $('div#progress-tab').css({
		   		'display':'block'
		    });
		    $('div#leaderboard').css({
		   		'display':'none'
		    });
		    $('div#badges').css({
		   		'display':'none'
		    });
		   });

		   $("div.main-menu ul li button#leaderboard").click(function() {
		    $('div#play').css({
		   		'display':'none'
		    });
		    $('div#profile').css({
		   		'display':'none'
		    });
		    $('div#progress-tab').css({
		   		'display':'none'
		    });
		    $('div#leaderboard').css({
		   		'display':'block'
		    });
		    $('div#badges').css({
		   		'display':'none'
		    });
		   });


		   $("div.main-menu ul li button#badges").click(function() {
		    $('div#play').css({
		   		'display':'none'
		    });
		    $('div#profile').css({
		   		'display':'none'
		    });
		    $('div#progress-tab').css({
		   		'display':'none'
		    });
		    $('div#leaderboard').css({
		   		'display':'none'
		    });
		    $('div#badges').css({
		   		'display':'block'
		    });
// 			$("div.main-menu ul li button#badges").trigger("click");
		   });
		});

	    $('#data-achievements').DataTable( {
	        "pagingType": "first_last_numbers",
	        "pageLength": 5
	    } ); 
	    $('#data-progress').DataTable( {
	        "pagingType": "first_last_numbers",
	        "pageLength": 5
	    } );
	    $('#data-leaderboard').DataTable( {
	        "pagingType": "first_last_numbers",
	        "pageLength": 5
	    } );
	    $('.dataTables_filter input').attr("placeholder", "Search...");
	    $(".dataTables_filter label").contents().filter(function(){
		    return (this.nodeType == 3);
		}).remove();
	});


