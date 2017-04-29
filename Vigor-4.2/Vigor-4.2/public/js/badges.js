(function(document, $) {

	var tabContent = $('#badge-tab-content'),
		tabs = tabContent.find('.badges-tab'),
		tabNavigation = $('#badge-nav');

	tabs.not(':eq(0)').hide();

	// add events
	$(document).on('click', '#badge-nav li', function(e) {
		e.preventDefault();

		// remove active state from all tabs;
		tabNavigation.find('li a').removeClass('active');

		var _self = $(e.currentTarget),
			index = _self.index('#badge-nav li');

		_self.find('a').addClass('active');

		tabs.hide();
		tabs.eq(index).fadeIn();
	});

})(document, jQuery);