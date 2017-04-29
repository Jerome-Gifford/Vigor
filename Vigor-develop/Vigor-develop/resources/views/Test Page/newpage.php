<!doctype html>
<html lang="en">
<head>
	@section('meta')
	@include('partials._meta')
	@show
	<link rel="stylesheet" href="css/new.css"> </head>
	<body>
		<div id="tabs"></div>
		<div>
			<ul class="tabs">
				<li><a href="#meal">Add a Meal</a></li>
				<li><a href="#workout">Add a Workout</a></li>
			</ul>

			<div class="tab container">
				<div id="meal" class="tab_content">	
					<div class="col-md-8-md-push-2">
						<div id="event-tracker inner">
							<div class="row row-no-gutter">
								<div class="col-md-12 no-padding-right">
									<div class="form-food inner">
										<input type="text" class="form-control foods" placeholder="Meal Item" name="food_name"/>
									</div>
								</div>
							</div>
							<div class="row row-no-gutter">
								<div class="col-md-4">
									<div class="form-servings inner">
										<input type="text" class="form-control foods" id="txt-servings" placeholder="Number of Servings" name="food_servings"/>
									</div>	
								</div>
							</div>
							<div class="col-md-4 row-no-gutter">
								<div class="form-calories inner">
									<input type="text" class="form-control foods" id="txt-calories" placeholder="Calories per Serving" name="food-calories"/>
								</div>			
							</div>
						</div>


				</div>
				<div id="workout" class="tab_content">
					<!-- 	content  -->
				</div>
			</div>
		</div>