(function(document, $) {

	var usernames = new Bloodhound({
	  datumTokenizer: Bloodhound.tokenizers.obj.whitespace('first_name'),
	  queryTokenizer: Bloodhound.tokenizers.whitespace,
	  limit: 10,
	  prefetch: {
	    url: '/usernames',
	    filter: function(users) {
	      return users;
	    }
	  }
	});
	 
	usernames.initialize();
	 
	$('.usernames').typeahead(null, {
	  name: 'usernames',
	  displayKey: 'first_name',
	  source: usernames.ttAdapter()
	});

})(document, jQuery);