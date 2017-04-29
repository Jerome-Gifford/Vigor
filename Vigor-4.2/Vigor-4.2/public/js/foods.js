(function(document, $) {

	var foods = new Bloodhound({
	  datumTokenizer: Bloodhound.tokenizers.obj.whitespace('name'),
	  queryTokenizer: Bloodhound.tokenizers.whitespace,
	  limit: 10,
	  prefetch: {
	    url: '/foods',
	    filter: function(list) {
	      return list;
	    }
	  }
	});
	 
	foods.initialize();

	var calories = $('#txt-calories');
	var servings = $('#txt-servings');
	var fat = $('#txt-fat');
	var carbs = $('#txt-carbs');
	var protein = $('#txt-protein');
	var type = $('#txt-food-type');
	 
	$('.foods').typeahead(null, {
	  name: 'foods',
	  displayKey: 'name',
	  source: foods.ttAdapter()
	}).on('typeahead:selected', function(el, food, dataset) {
		calories.val(food.calories);
		servings.val(food.serving_size);
		fat.val(food.fat);
		carbs.val(food.carbs);
		protein.val(parseFloat(food.protein, 10));
		type.val(food.foodtype);
	});

})(document, jQuery);