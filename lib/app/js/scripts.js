jQuery(document).ready(function() {

	jQuery('.mainMenuButton').click(function() {
		var divName = $(this).text()
		$("html, body").animate({ scrollTop: $('#'+divName).offset().top-22 }, 1000);
	});

	var counter = $(".profileIcon :visible").parent().length;

	$(".counter").html("Results: "+counter);

	function onFilter(){
		var serverSelect = $('.serverSelect').val();
		var divisionSelect = $('.divisionSelect').val();
		var roleSelect = $('.roleSelect').val();

		if(divisionSelect == 'all'){
			if(roleSelect == 'all'){
				if(serverSelect == 'all'){
					$('.roleView').show();
				}else{
					$('.regionView').hide();
					$('.'+serverSelect).show();
				}
			}else{
				if(serverSelect == 'all'){
					$('.regionView').show();
					$('.roleView').hide();
					$('.'+roleSelect).show();
				}else{
					$('.roleView' +'.regionView').hide();
					$('.'+roleSelect + '.'+serverSelect).show();
				}
				
			}
		}else{
			if(roleSelect == 'all'){
				if(serverSelect == 'all'){
					$('.roleView').hide();
					$('.'+divisionSelect).show();
				}else{
					$('.regionView').hide();
					$('.'+serverSelect + '.'+divisionSelect).show();
				}
			}else{
				if(serverSelect == 'all'){
					$('.regionView').show();
					$('.roleView').hide();
					$('.'+roleSelect + '.'+divisionSelect).show();
				}else{
					$('.roleView' +'.regionView').hide();
					$('.'+roleSelect + '.'+serverSelect + '.'+divisionSelect).show();
				}
			}
		}
		var counter = $(".profileIcon :visible").parent().length;

		$(".counter").html("Results: "+counter);
	}

	$('.serverSelect').change(function() {
		onFilter();
	});

	$('.roleSelect').change(function() {
		onFilter();
	});

	$('.divisionSelect').change(function() {
		onFilter();
	});

	var offset = 220;
	var duration = 500;
	jQuery(window).scroll(function() {
		if (jQuery(this).scrollTop() > offset) {
			jQuery('.back-to-top').fadeIn(duration);
		} else {
			jQuery('.back-to-top').fadeOut(duration);
		}
	});
	
	jQuery('.back-to-top').click(function(event) {
		event.preventDefault();
		jQuery('html, body').animate({scrollTop: 0}, duration);
		return false;
	})

	jQuery('.logo-to-top').click(function(event) {
		event.preventDefault();
		jQuery('html, body').animate({scrollTop: 0}, duration);
		return false;
	})

	$(window).scroll(function() {
		var scroll = $(window).scrollTop();
		if (scroll >= 228) {
			$(".headerMenuWrapper").addClass("scrolled");
			$(".headerMenuWrapper").removeClass("scrolling");
		} else {
			$(".headerMenuWrapper").removeClass("scrolled");
			$(".headerMenuWrapper").addClass("scrolling");
		}
	})

	jQuery('.resultOne').click(function(e) {
		e.preventDefault();
		var champArray = new Array();
		var summonerName = jQuery(this).find(".summonerName").val();
		var summonerDivision = jQuery(this).find(".summonerDivision").val();
		var lolkingProfile = jQuery(this).find(".lolkingProfile").val();
		var summonerRole1 = jQuery(this).find(".summonerRole1").val();
		var summonerRole2 = jQuery(this).find(".summonerRole2").val();
		var divisionIcon = jQuery(this).find(".divisionIcon").val();
		var summonerID = jQuery(this).find(".summonerID").val();

		$.ajax({
			type: 'POST',
			url: '../../../includes/getChamps.php',
			data: {summonerID: summonerID},
			success: function(data){
            	$('.resultFade').fadeOut(300, function() {
		        	$('.resultFade').html('<h3 class="resultsH3"><a href="'+lolkingProfile+'" target="_blank">'+summonerName+'</a></h3><img src="'+divisionIcon+'" class="resultsIcon" /><span class="resultsSpan">'+summonerDivision+'</span><span class="mainRole">Main role: '+summonerRole1+'</span><span class="secondRole">Secondary role: '+summonerRole2+'</span> <div class="mostPlayed">'+data+'</div>').fadeIn(300);
            	});
            }           
        });

		return false;
	})
});
function loginWindow(){

	if(document.getElementById('light').style.display == 'block'){
		document.getElementById('light').style.display = 'none';
		$( ".linkLogin" ).html('Log in');
	}else{
		document.getElementById('light').style.display = 'block';
		$( ".linkLogin" ).html('Close');
	}
}

	