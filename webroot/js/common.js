			$(document).ready(function() {
				$(".onlyTest").hide().addClass("hidden");
				$(".topSearch").mouseenter(function() {
					if ($(".onlyTest").hasClass("hidden")) {
			
						$(".onlyTest").removeClass("hidden").slideDown("fast");
						/*
						$(this).animate({
							paddingBottom: "3.5em"
						}, "fast");
						*/
					} else {
		
					}
				});
				$(".topSearch").mouseleave(function() {
					$(".onlyTest").addClass("hidden").slideUp("fast");
					/*
					$(this).animate({
							paddingBottom: "0em"
						}, "fast");
						*/
				});
			});