//open the menu
jQuery("#hamburger").click(function() {
	...
});

//close the menu
jQuery("#contentLayer").click(function() {
	...
});

var contentWidth = jQuery('#content').width();

jQuery('#content').css('width', contentWidth);

jQuery('#content').bind('touchmove', function(e){e.preventDefault()});

jQuery("#content").animate({"marginLeft": ["70%", 'easeOutExpo']}, {
	duration: 700
});


$('#hamburger_icon').click(function(){
	$(this).toggleClass('active');
});	
