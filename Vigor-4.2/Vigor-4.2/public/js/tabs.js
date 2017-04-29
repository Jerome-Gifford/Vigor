/*(function($) {

$('#tab-content div:eq(1)').hide();
$('#tab-content div:first').show();

$('#nav li').click(function() {
    $('#nav li a').removeClass("active");
    $(this).find('a').addClass("active");
    

    var indexer = $(this).index(); //gets the current index of (this) which is #nav li
    console.log(indexer);
    $('#tab-content div:eq(' + indexer + ')').fadeIn(); //uses whatever index the link has to open the corresponding box 
    $('#tab-content div:not(:eq(' +  indexer + '))').hide();
});
})(jQuery);*/

//tabs for add a meal and workout

(function(document, $) {

	var tabContent = $('#tab-content'),
		tabs = tabContent.find('.tab'),
		tabNavigation = $('#nav');

	tabs.not(':eq(0)').hide();

	// add events
	$(document).on('click', '#nav li', function(e) {

		// remove active state from all tabs;
		tabNavigation.find('li a').removeClass('active');

		var _self = $(e.currentTarget),
			index = _self.index();

		_self.find('a').addClass('active');

		tabs.hide();
		tabs.eq(index).fadeIn();
	});

})(document, jQuery);



