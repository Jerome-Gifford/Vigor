(function(document, $) {

	var activities = new Bloodhound({
	  datumTokenizer: Bloodhound.tokenizers.obj.whitespace('activities-name'),
	  queryTokenizer: Bloodhound.tokenizers.whitespace,
	  limit: 10,
	  prefetch: {
	    url: '/activities',
	    filter: function(list) {
	      return list;
	    }
	  }
	});
	 
	activities.initialize();

	$('.activities').typeahead(null, {
	  name: 'activities',
	  displayKey: 'activities-name',
	  source: activities.ttAdapter(),
	});

})(document, jQuery);